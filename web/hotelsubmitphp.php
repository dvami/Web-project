<?php
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
    $id = $_POST["hotid"];
    $firstname = $_POST["first-name"];
    $lastname = $_POST["last-name"];
    $nationalcode = $_POST["national-code"];
    $phonenumber = $_POST["phone-number"];

    $gender = $_POST["gender"];
     // Check if user with the given phone number already exists
     $stmt = $conn->prepare("SELECT * FROM hotel WHERE id = ?");
     $stmt->bind_param("s", $id);
     $stmt->execute();
     $result = $stmt->get_result();

// Delete the row from the database
if ($result->num_rows > 0) {
    $deleteStmt = $conn->prepare("DELETE FROM hotel WHERE id = ?");
    $deleteStmt->bind_param("s", $id);
    $deleteStmt->execute();

    // Check if the row was successfully deleted
    if ($deleteStmt->affected_rows > 0) {
        echo "Row deleted successfully.";
    } else {
        echo "Failed to delete row.";
    }

    $deleteStmt->close();
}
//insert reservation to hotelresevrvation 
$ids=0;
// Get the highest ID from the database
$result = $conn->query("SELECT MAX(id) AS max_id FROM hotel_reservation");
$row = $result->fetch_assoc();
$highestId = $row['max_id'];

// Increment the highest ID by 1
$ids = $highestId + 1;

 // Insert user data into the database
 $stmt = $conn->prepare("INSERT INTO hotel_reservation (firstname, lastname, nationalcode,phonenumber,gender,id,hotelid) VALUES (?, ?, ?,?,?,?,?)");
 $stmt->bind_param("sssssii", $firstname, $lastname, $nationalcode, $phonenumber, $gender, $ids,$id);
 $stmt->execute();

$stmt->close();
}

$conn->close();

header("Location: hotel.php");

?>