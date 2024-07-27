<?php
session_start();
// Database configuration
$dbHost = "localhost";
$dbName = "web";
$dbUser = "root";
$dbPass = "";
$id="";
// Connect to the database
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, 3306);
if ($conn->connect_error) {
    die("Connection failed! " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
 
// Get the ID sent from JavaScript
$id = $_POST['id'];

}
// Prepare and execute the SQL query
$stmt = $conn->prepare("SELECT id, phoneNumber, email, companyname,  city, state  FROM company_registration WHERE id = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if any row matches the ID
if ($result->num_rows > 0) {
    // Fetch the row as an associative array
    $row = $result->fetch_assoc();

    // Convert the row to JSON
    $rowJson = json_encode($row);

    // Send the JSON response back to JavaScript
    echo $rowJson;
} else {
    // No matching row found
    echo "No row found for ID: " . $id;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
