/* database.ts
 *
 * This file implements an interface for interacting with data in IndexedDB.
 * Notice that nearly all methods return a Promise and should be awaited. 
 * 
 * 
 * To use it, first get initialise the class with a database name:
 * 
 *      const db = new Database("databasename");
 *      await db.init();
 * 
 * 
 * --- Default usage 
 * If no tablename is given, the "default" table is used. Adding an item returns
 * its key, which can later be used to retrieve the item.
 * 
 *      let item = { name: "Jon", age: 25 };
 *      let key = await db.add(item);
 *      let retrieveItem = await db.get(key);
 *      item.name == retrieveItem.name; // Is the same item
 * 
 * Both updating and deleting also use the key.
 * 
 *      let item.age = 40;
 *      await db.update(key, item);
 *      let retrieveItem = await db.get(key);
 *      retrieveItem.age == 40; // true
 *      
 *      await db.delete(key); 
 *      await db.get(key); // ERROR!
 * 
 * --- Usage with index
 * When inserting objects, the database can also use an attribute as the default
 * key. To use this, first create an index table and specify the name of the 
 * property used as key. Afterwards, most operations are the same, 
 * but the table name also has to be used.
 *     
 *      await db.createIndexTable("newTable", "name");
 *      let item = { name: "Jon", age: 25 };
 *      await db.add(item, "newTable");
 *      let retrieveItem = await db.get("Jon", "newTable");
 *      item.name == retrieveItem.name; // Is the same item
 * 
 * When updating a different method must be used! 
 * Deleting remains the same.
 *  
 *      let item.age = 40;
 *      await db.updateIndex(item, "newTable");
 *      let retrieveItem = await db.get(key, "newTable");
 *      retrieveItem.age == 40; // true
 *      
 *      await db.delete(item); 
 *      await db.get(item.name); // ERROR!
 * 
 * --- Misc
 * 
 * Just like index tables, normal tables can also be created and destroyed.
 * 
 *      await db.createTable("normalTable");
 *      await db.deleteTable("indexTable");
 * 
 * We can retrieve all objects in table, remove all items from a table, or 
 * or remove all items from the database.
 *
 *      await db.getAll("normalTable");
 *      await db.clearTable("normalTable");
 *      await db.clear();
 * 
 * Finally, the database can also be destroyed completely,
 * removing all data and tables.
 * 
 *      await db.destroy();
 * 
 */


class Database {
    private defaultTable: string = "default";
    private databaseName: string;
    private db: IDBDatabase | null = null;
    public tableNames: string[] = [];

    constructor(dbname: string) {
        this.databaseName = dbname;
    }

    init(): Promise<boolean> {
        return new Promise((resolve, reject) => {
            const request: IDBOpenDBRequest = indexedDB.open(this.databaseName);
            // Return existing database.
            request.onsuccess = (event: any) => {
                const target: IDBOpenDBRequest = (event.target as IDBOpenDBRequest);
                this.db = target.result;
                this.tableNames = Array.from(this.db.objectStoreNames);
                resolve(true);
            };
            // Create new database
            request.onupgradeneeded = (event: IDBVersionChangeEvent) => {
                const target: IDBOpenDBRequest = (event.target as IDBOpenDBRequest);
                this.db = target.result;
                this.db.createObjectStore(this.defaultTable, { autoIncrement: true });
                this.tableNames.push("default");
            };
            request.onerror = () => reject(Error("Could not create or get database"));
            request.onblocked = () => {
                reject(Error("Please close all other tabs with this site open!"));
            };
        });
    }

    destroy() {
        return new Promise((resolve, reject) => {
            const request: IDBOpenDBRequest = indexedDB.deleteDatabase(this.databaseName);
            request.onerror = () => {
                reject(Error(`Could not delete tabalase ${this.databaseName}`));
            };
            request.onblocked = () => this.db!.close();
            request.onupgradeneeded = () => this.db!.close();
            request.onsuccess = () => {
                this.databaseName = "";
                this.db!.close();
                this.db = null;
                resolve(true);
            };
        });
    }

    add(item: any, tablename: string = this.defaultTable): Promise<any> {

        return new Promise((resolve, reject) => {
            const transaction: IDBTransaction = this.db!.transaction([tablename], "readwrite");
            transaction.onerror = () => {
                reject(Error(`Could not add item to table '${tablename}': ${item}`));
            };
            let result: any;
            transaction.oncomplete = (event: any) => resolve(result);
            const table: IDBObjectStore = transaction.objectStore(tablename);
            const request: IDBRequest = table.add(item);
            request.onsuccess = (event: any) => {
                result = event.target.result;
                transaction.commit();
            };
        });
    }

    get(key: any, tablename: string = this.defaultTable): Promise<any> {
        return new Promise((resolve, reject) => {
            const transaction: IDBTransaction = this.db!.transaction([tablename]);
            const table: IDBObjectStore = transaction.objectStore(tablename);
            const request: IDBRequest = table.get(key);
            transaction.onerror = () => {
                reject(Error(`Could not get item from database; key: '${key}', table: '${tablename}'`));
            };
            transaction.oncomplete = () => {
                if (request.result) {
                    resolve(request.result);
                } else {
                    reject(Error(`Could not get item from database. key: '${key}', table: '${tablename}'`));
                }
            };
            request.onsuccess = () => transaction.commit();

        });
    }

    update(key: any, value: any, tablename: string = this.defaultTable): Promise<boolean> {
        return new Promise((resolve, reject) => {
            const transaction: IDBTransaction = this.db!.transaction([tablename], "readwrite");
            transaction.onerror = () => {
                reject(Error(`Could not update item in database; key: '${key}', table: '${tablename}'`));
            };
            transaction.oncomplete = () => resolve(true);

            const table: IDBObjectStore = transaction.objectStore(tablename);
            const request: IDBRequest = table.get(key);

            request.onsuccess = (event: any) => {
                const requestUpdate: IDBRequest = table.put(value, key);
                requestUpdate.onsuccess = () => transaction.commit();
            };
        });
    }

    updateIndex(value: any, tablename: string): Promise<boolean> {
        return new Promise((resolve, reject) => {
            const transaction: IDBTransaction = this.db!.transaction([tablename], "readwrite");
            transaction.onerror = () => {
                reject(Error(`Could not update item in database; object: ${value}, table: '${tablename}'`));
            };
            transaction.oncomplete = () => resolve(true);

            const table: IDBObjectStore = transaction.objectStore(tablename);
            const request: IDBRequest = table.put(value);

            request.onsuccess = () => transaction.commit();
        });
    }

    delete(key: any, tablename: string = this.defaultTable): Promise<boolean> {
        return new Promise((resolve, reject) => {
            const transaction: IDBTransaction = this.db!.transaction([tablename], "readwrite");
            const table: IDBObjectStore = transaction.objectStore(tablename);
            transaction.onerror = () => {
                reject(Error(`Could not remove item from database; key: '${key}', table: '${tablename}'`));
            };
            transaction.oncomplete = () => resolve(true);

            const request: IDBRequest = table.delete(key);
            request.onsuccess = () => transaction.commit();
        });
    }

    getAll(tablename: string = this.defaultTable): Promise<any[]> {
        return new Promise((resolve, reject) => {
            const transaction: IDBTransaction = this.db!.transaction([tablename], "readonly");
            const table: IDBObjectStore = transaction.objectStore(tablename);
            let result: any[] = [];

            transaction.onerror = () => {
                reject(Error(`Could not get all items from table: '${tablename}'`));
            };
            transaction.oncomplete = () => resolve(result);

            let request: IDBRequest = table.openCursor();
            request.onsuccess = (event: any) => {
                let cursor: IDBCursorWithValue = event.target.result;
                if (cursor) {
                    result.push(cursor.value)
                    cursor.continue();
                } else {
                    transaction.commit();
                }
            };
        });
    }

    async clear() {
        let success = true;
        for (let table of this.tableNames) {
            if (!await this.clearTable(table)) {
                success = false;
            }
        }
        return success;
    }

    async createTable(tablename: string): Promise<boolean> {
        if (this.tableNames.includes(tablename)) {
            return true;
        }
        return new Promise((resolve, reject) => {
            this.db!.close();
            const request: IDBOpenDBRequest = indexedDB.open(this.db!.name, this.db!.version + 1);
            request.onupgradeneeded = (event: any) => {
                const target: IDBOpenDBRequest = (event.target as IDBOpenDBRequest);
                this.db = target.result;
                this.db.createObjectStore(tablename, { autoIncrement: true });
                this.tableNames.push(tablename);
                request.transaction!.onerror = () => reject(Error("Could not create or get database"));
                request.transaction!.oncomplete = () => resolve(true);
            }
        });
    }

    async createIndexTable(tablename: string, index: string): Promise<boolean> {
        if (this.tableNames.includes(tablename)) {
            return true;
        }
        return new Promise((resolve, reject) => {
            this.db!.close();
            const request: IDBOpenDBRequest = indexedDB.open(this.db!.name, this.db!.version + 1);
            request.onerror = () => reject(Error("Could not create or get database"));
            request.onupgradeneeded = (event: any) => {
                const target: IDBOpenDBRequest = (event.target as IDBOpenDBRequest);
                this.db = target.result;
                this.db.createObjectStore(tablename, { keyPath: index });
                this.tableNames.push(tablename);
                request.transaction!.oncomplete = () => resolve(true);
            }
        });
    }

    async clearTable(tablename: string): Promise<boolean> {
        if (!this.tableNames.includes(tablename)) {
            return true;
        }
        return new Promise((resolve, reject) => {
            const transaction: IDBTransaction = this.db!.transaction([tablename], "readwrite");
            const table: IDBObjectStore = transaction.objectStore(tablename);
            transaction.onerror = () => {
                reject(Error(`Could not clear table '${tablename}'`));
            };
            transaction.oncomplete = () => resolve(true);
            const request: IDBRequest = table.clear();
            request.onsuccess = () => transaction.commit();
        });
    }

    async deleteTable(tablename: string): Promise<boolean> {
        if (!this.tableNames.includes(tablename)) {
            return true;
        }
        return new Promise((resolve, reject) => {
            this.db!.close();
            const request: IDBOpenDBRequest = indexedDB.open(this.db!.name, this.db!.version + 1);
            request.onupgradeneeded = (event: any) => {
                const target: IDBOpenDBRequest = (event.target as IDBOpenDBRequest);
                this.db = target.result;
                this.db.deleteObjectStore(tablename);

                const index: number = this.tableNames.indexOf(tablename);
                this.tableNames.splice(index, 1);
                request.transaction!.onerror = () => reject(Error("Could not delete database"));
                request.transaction!.oncomplete = () => resolve(true);
            }
        });
    }
}
