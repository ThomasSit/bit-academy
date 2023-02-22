<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrum</title>
</head>
<body>
    

<form method="post">
    <select name="task" id="task"> 
        <option value="Todo">Todo</option>
        <option value="Doing">Doing</option>
        <option value="Done">Done</option>
    </select>
    <button type="submit" name="move">Taak verplaatsen</button>
</form>

</body>
</html>

<?php

include "./include/connect.php";

if (isset($_POST['move']) && isset($_POST['task'])) {
    $task_id = $_POST['task'];

    // Gegevens van de geselecteerde taak ophalen uit de database
    $query = "SELECT * FROM todo WHERE id = $task_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Taak verplaatsen naar de juiste tabel
    if ($row['status'] == 'todo') {
        $new_status = 'doing';
    } elseif ($row['status'] == 'doing') {
        $new_status = 'done';
    }

    $update_query = "UPDATE todo SET status = '$new_status' WHERE id = $task_id";
    mysqli_query($conn, $update_query);
}



