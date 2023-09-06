<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];

    // Display the submitted data
    echo "Name: " . $name . "<br>";
}
?>