<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BMI Result</title>
</head>

<body>
    <br>
    <a href="main.html">Back</a>

    <?php

    // FUNCTIONS
    function calculateBMI($weight, $height)
    {
        return ($weight / $height / $height) * 10000;
    };

    function getBMITextBasedOnGender($name, $gender, $bmi)
    {
        // Lagre verdiene vi skal sammenligne, det er BMI verdier som tilsvarer nivået ditt
        $firstVal = 18.5;
        $secondVal = 24.9;
        $thirdVal = 25;
        $fourthVal = 29.9;
        $name = strtolower($name);

        // Sjekk ut om det er riktig skjønn
        if ($gender == "male") {
            if ($bmi < $firstVal) {
                $returnTitle = "{$name}, you should eat some food, you stick...";
            } elseif ($bmi >= $firstVal && $bmi < $secondVal) {
                $returnTitle = "You  are normal, {$name}. That's good! Now at least you won't be bothered by the wind or too slow yourself";
            } elseif ($bmi >= $thirdVal && $bmi < $fourthVal) {
                $returnTitle = "You eat too much, {$name}. You should get on the treadmill. You fat asshole!";
            } else {
                $returnTitle = "If you don't stop eating {$name}, then you will most likely have an early death. This is critical, you will die as a loser..";
            }
        } else {
            if ($bmi < $firstVal) {
                $returnTitle = "You should progressively try to increase the amount of food you eat, try your best! Good luck, {$name}!";
            } elseif ($bmi >= $firstVal && $bmi < $secondVal) {
                $returnTitle = "Congratulations {$name}, you are perfect! Keep doing what you're doing queen!";
            } elseif ($bmi >= $thirdVal && $bmi < $fourthVal) {
                $returnTitle = "Not bad {$name}, you could try to lower your total daily calorie intake. But it's not neccessary, stay strong!";
            } else {
                $returnTitle = "You weight a little more than normal {$name}, but eat less and workout more if you want to. It's up to you, you decide how you want your body to look like. Your body is great, but heart matters the most!";
            }
        }

        return $returnTitle;
    };

    // INITIALIZATION
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST["name"];
        $weight = floatval($_POST["weight"]);
        $height = floatval($_POST["height"]);
        $gender = $_POST["gender"];

        // Check if any field is empty 
        if (empty($name)) {
            echo "<p>You forgot to fill out the name</p>";
            return;
        }

        if (empty($weight)) {
            echo "<p>You forgot to fill out the weight</p>";
            return;
        }

        if (empty($height)) {
            echo "<p>You forgot to fill out the height</p>";
            return;
        }

        if (empty($gender)) {
            echo "<p>You forgot to fill out the gender</p>";
            return;
        }

        // Check if inputs are valid numbers
        if (!is_numeric($weight) || !is_numeric($height)) {
            echo "<p>Please enter valid numeric values for weight and height.</p>";
            return;
        }

        // Calculate and set
        $bmiValue = calculateBMI($weight, $height);
        $bmiText = getBMITextBasedOnGender($name, $gender, $bmiValue);

        // Display the submitted data
        echo "<p>$bmiText</p>";
    }

    ?>
</body>

</html>
