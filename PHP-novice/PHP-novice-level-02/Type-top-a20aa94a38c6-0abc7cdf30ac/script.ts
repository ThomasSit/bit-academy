/*
 * This program implements a simple booking system. It makes use of IndexedDB
 * to store its data. For information on how to use it, see database.ts.
 *
 */

/* Globals */
// eslint-disable-next-line
const db: any | null = new Database("Bit Restaurant");
const tableName = "reservations";

let currentID: number = 0;
main();

/* Entry point. This function is called when the page has loaded */
async function main() {
    const form: any | null = document.getElementById("reservationForm");
    if (form !== null) {
        form.addEventListener("submit", onReservationSubmit);
    } else {
        console.log('no form found');
    }

    // Initialise the database and make sure the id of reservations is
    // used as a key.
    await db.init();
    await db.createIndexTable(tableName, "id");

    // Get all previously made reservations and add to the page.
    let allReservations: any | null = await db.getAll(tableName);
    for (let reservation of allReservations) {
        showReservation(reservation);
        // Make sure the id for future reservations is valid.
        if (reservation.id > currentID) {
            currentID = reservation.id + 1;
        }
    }
}

/* Called when the user wants to submit a reservation. */
function onReservationSubmit(event) {
    event.preventDefault();
    let reservation: any | null = parseForm();
    if (validateReservation(reservation)) {
        saveReservation(reservation);
    }
}

/* Parse form and return a reservation object. */
function parseForm() {
    const form: any | null = document.getElementById("reservationForm");
    const formdata: any | null = new FormData(form!);

    // Split the time into hour and and minute.
    const time: any | null = formdata!.get("time").split(":");

    // Use a single Date type to represent both time and date.
    let date: any | null = new Date(formdata!.get("date"));
    date.setHours(time[0], time[1]);

    // TODO: make a reservation type
    type reservation = {
        id: number,
        name: string,
        date: Date,
        partySize: number,
    };


    const reservation = {
        id: currentID++,
        name: formdata.get("name") as string,
        date: date,
        partySize: Number(formdata!.get("partySize")),
    };

    return reservation;
}

/* Return true if the reservation is valid, false otherwise. */
function validateReservation(reservation) {
    // TODO make a flash type.

    // Check if a name is entered.
    if (!reservation.name) {
        showFlash({ type: "error", message: "Please enter a name." });
        return false;
    }

    // Date must be 24 hours after today
    let tomorrow: any | null = new Date(Date.now() + 24 * 60 * 60 * 1000);
    if (reservation.date <= tomorrow) {
        showFlash({ type: "error", message: "Please book at least 24 hours in advance" });
        return false;
    }

    if (reservation.partySize <= 0) {
        showFlash({ type: "error", message: "Minimum party size is 1 person." });
        return false;
    }

    if (reservation.partySize > 10) {
        showFlash({ type: "error", message: "Maximum party size is 10 people." });
        return false;
    }

    return true;
}

/* Turn a reservation object into a HTML DOM element. Returns an HTMLElement. */
function getReservationHTML(reservation) {
    let article: any = document.createElement("article");
    article.id = toID(reservation.id);
    article.classList.add("reservation");

    let header: any = document.createElement("h3");
    header.innerText = reservation.name;
    article.appendChild(header);

    let time: any = document.createElement("p");
    time.innerText = reservation.date.toDateString();
    article.appendChild(time);

    let guests: any = document.createElement("p");
    guests.innerText = `${reservation.partySize} guests`;
    article.appendChild(guests);

    let button: any = document.createElement("button");
    button.innerText = "Delete";
    button.classList.add("delete");
    button.onclick = () => removeReservation(article);
    article.appendChild(button);

    return article;
}

/* Save a reservation to the database. */
async function saveReservation(reservation) {
    await db.add(reservation, tableName);
    showReservation(reservation);
    showFlash({ type: "success", message: "Added your reservation" });
}

/* Add HTML representation of a reservation to the page. */
function showReservation(reservation) {
    let html = getReservationHTML(reservation);
    if (document !== null) {
        reservation.getElementById("reservations").appendChild(html);
    } else {
        console.log('no document found');
    }
}

/* Remove a reservation from the page and from the database. */
async function removeReservation(element) {
    let id: any = fromID(element.id);
    await db.delete(id, tableName);
    element.remove();
    showFlash({ type: "info", message: "Deleted reservation." });
}

/* Show a flash message on top of the page. This function accepts a flash object. */
function showFlash(flash) {
    let container: any = document.getElementById("flashContainer");
    let paragraph: any = document.getElementById("flashMessage");
    let flashElement: any = document.getElementById("flash");
    if (flash.type == "error") {
        let red = "#f7e4e1";
        flashElement.style.backgroundColor = red;
        flashElement.style.borderColor = "red";
        paragraph.style.backgroundColor = red;
    } else if (flash.type == "success") {
        let green: any = "#e1faea";
        flashElement.style.backgroundColor = green;
        flashElement.style.borderColor = "green";
        paragraph.style.backgroundColor = green;
    } else if (flash.type == "info") {
        let blue: any = "#d7ecfa";
        flashElement.style.backgroundColor = blue;
        flashElement.style.borderColor = "blue";
        paragraph.style.backgroundColor = blue;
    }
    paragraph.innerText = flash.message;
    container.hidden = false;

    // Hide flash after four seconds.
    setTimeout(() => { container.hidden = true; }, 4000);
}

/* Small helper functions to convert id's to keys and vice versa. */
function toID(key) {
    return `reservation-${key}`;
}

function fromID(id) {
    return id.includes("reservation-") ? parseInt(id.split("-")[1], 10) : "";
}
