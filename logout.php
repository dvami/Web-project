<?php
//for search bar
session_start();
// Database configuration
$dbHost = "localhost";
$dbName = "web";
$dbUser = "root";
$dbPass = "";

// Connect to the database
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, 3306);
if ($conn->connect_error) {
    die("Connection failed! " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the login page or any other desired page after logging out
header("Location: login.php");
exit();
}
?>
