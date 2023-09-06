<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculate"])) {
    // Get user input
    $name = $_POST["name"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $gender = $_POST["gender"];

    // Check if inputs are valid numbers
    if (!is_numeric($weight) || !is_numeric($height)) {
        echo "<p>Please enter valid numeric values for weight and height.</p>";
    } else {
        // Calculate BMI
        $heightInMeters = $height / 100;
        $bmi = $weight / ($heightInMeters * $heightInMeters);

        // Determine BMI category
        if ($bmi < 18.5) {
            $category = "Underweight";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            $category = "Normal Weight";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            $category = "Overweight";
        } else {
            $category = "Obese";
        }

        // Display the result
        echo "<p>Name: " . $name . "</p>";
        echo "<p>Gender: " . $gender . "</p>";
        echo "<p>Your BMI is: " . number_format($bmi, 2) . "</p>";
        echo "<p>This is considered: " . $category . "</p>";
    }
}