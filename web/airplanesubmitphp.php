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
     $id = $_POST["airplaneid"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $nationalcode = $_POST["nationalcode"];
    $birthdate = $_POST["birthdate"];

    $gender = $_POST["gender"];
    $passengernumbers = $_POST["passengernumbers"];

     $stmt = $conn->prepare("SELECT * FROM airplane WHERE id = ?");
     $stmt->bind_param("s", $id);
     $stmt->execute();
     $result = $stmt->get_result();

// Delete the row from the database if passengerleft is 0
if ($result->num_rows > 0) {
    $deleteStmt = $conn->prepare("DELETE FROM airplane WHERE id = ? AND passengerleft = ?");
    $deleteStmt->bind_param("ss", $id,$passengernumbers);
    $deleteStmt->execute();

    // Check if the row was successfully deleted
    if ($deleteStmt->affected_rows > 0) {
        echo "Row deleted successfully.";
    } else {
        echo "Failed to delete row.";
    }

    $deleteStmt->close();
}
// update the row from the database if passengerleft is above 0

$stmt = $conn->prepare("SELECT * FROM airplane WHERE id = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $currentPassengerLeft = $row["passengerleft"];
    $updatedPassengerLeft = intval($currentPassengerLeft)-intval($passengernumbers) ;
    $updatedPassengerLeft =strval($updatedPassengerLeft);
    $updateStmt = $conn->prepare("UPDATE airplane SET passengerleft = ? WHERE id = ?");
    $updateStmt->bind_param("ss", $updatedPassengerLeft, $id);
    $updateStmt->execute();

    // Check if the row was successfully updated
    if ($updateStmt->affected_rows > 0) {
        echo "Row updated successfully.";
    } else {
        echo "Failed to update row.";
    }

    $updateStmt->close();
}
//insert reservation to planeresevrvation 
$ids=0;
// Get the highest ID from the database
$result = $conn->query("SELECT MAX(id) AS max_id FROM airplane_reservation");
$row = $result->fetch_assoc();
$highestId = $row['max_id'];

// Increment the highest ID by 1
$ids = $highestId + 1;

 // Insert user data into the database
 $stmt = $conn->prepare("INSERT INTO airplane_reservation (firstname, lastname, nationalcode,birthdate,gender,id,airplaneid) VALUES (?, ?, ?,?,?,?,?)");
 $stmt->bind_param("sssssii", $firstname, $lastname, $nationalcode, $birthdate, $gender, $ids,$id);
 $stmt->execute();

$stmt->close();
}

$conn->close();

header("Location: airplane.php");

?>