<?php

// FUNCTIONS
function calculateBMI($weight, $height) {
    return ($weight / $height / $height) * 10000;
};

function getBMITextBasedOnGender($gender, $bmi) {
    // Lagre verdiene vi skal sammenligne
    $firstVal = 18.5;
    $secondVal = 24.9;
    $thirdVal = 25;
    $fourthVal = 29.9;

    // Sjekk ut om det er riktig skjønn
    if ($gender == "male"){
        if ($bmi < $firstVal) {
            $returnTitle = "You should eat some food, you stick...";
        } elseif ($bmi >= $firstVal && $bmi < $secondVal) {
            $returnTitle = "You are normal, that's good. Now at least you won't be bothered by the wind or too slow yourself";
        } elseif ($bmi >= $thirdVal && $bmi < $fourthVal) {
            $returnTitle = "You eat a little to much, you should get on the treadmill. You fat asshole!";
        } else {
            $returnTitle = "If you don't stop eating, then you will most likely have an early death. This is critical, you will die as a loser..";
        }
    }
    else{
        if ($bmi < $firstVal) {
            $returnTitle = "You should progressively try to increase the amount of food you eat, try your best! Good luck!";
        } elseif ($bmi >= $firstVal && $bmi < $secondVal) {
            $returnTitle = "Congratulations, you are perfect! Keep doing what you're doing queen!";
        } elseif ($bmi >= $thirdVal && $bmi < $fourthVal) {
            $returnTitle = "Not bad, you could try to lower your total daily calorie intake. But it's not neccessary, stay strong!";
        } else {
            $returnTitle = "You weight a little more than normal, but eat less and workout more if you want to. It's up to you, you decide how you want your body to look like. Your body is great, but heart matters the most!";
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
    $bmiText = getBMITextBasedOnGender($gender, $bmiValue);

    // Display the submitted data
    echo $bmiText;
}

?>
