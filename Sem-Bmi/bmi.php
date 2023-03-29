<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
</head>
<body>
    <form method="post">
    <label for="weight">Gewicht (in kilogram):</label>
        <input type="text" name="weight" id="weight" required>
        <br>
        <label for="height">Lengte (in meters):</label>
        <input type="text" name="height" id="height" required>
        <br>
        <input type="submit" name="submit" value="Bereken">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $height = $_POST['height'];
        $weight = $_POST['weight'];

        // Bereken BMI
        $bmi = $weight / ($height * $height);

        // Toon resultaat
        echo "Je BMI is: " . round($bmi, 1) . "<br>";
        if ($bmi < 18.5) {
            echo "Ondergewicht";
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            echo "Goed gewicht";
        } elseif ($bmi >= 25 && $bmi < 27) {
            echo "Lciht gewicht";
        } elseif ($bmi >= 27 && $bmi < 30) {
            echo "Mating overgewicht";
        } elseif ($bmi >= 30 && $bmi < 40) {
            echo "Ernstig overgewewicht";
        } elseif ($bmi >= 40) {
            echo "Gevaarlijk overgewicht";
        } else {
            echo "Obesitas";
        }
    }
    ?>
</body>
</html>