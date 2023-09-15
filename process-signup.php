<?php
session_start();
$mysqli = require __DIR__ . "/database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConfirmation = $_POST["password_confirmation"];

    // Check if passwords match
    if ($password !== $passwordConfirmation) {
        echo "Passwords do not match";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    
    // Insert user data into the database
    $sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    // Check if the prepare statement was successful
    if (!$stmt) {
        echo "Prepare statement error: " . $mysqli->error;
        exit;
    }

    // Bind parameters
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Redirect to a success page or perform other actions
        header("Location: signup-success.html");
        exit;
    } else {
        // Handle errors
        echo "Error creating user: " . $stmt->error;
    }

    $stmt->close();
}
?>
