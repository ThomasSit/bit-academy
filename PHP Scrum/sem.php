<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <Form action="berekening.php" method="POST">
        <label>voornaam</label>
        <input type="text" name="voornaam">
        
        <label>achternaam</label>
        <input type="text" name="achternaam">

        <label>leeftijd</label>
        <input type="number" name="leeftijd">

        <label for="willekeurig_nummer">Willekeurig nummer:</label>
        <input type="number" name="willekeurig_nummer" id="willekeurig_nummer"><br>

        <button type="submit" name="button">button</button>
    </Form>
</body>
</html>

