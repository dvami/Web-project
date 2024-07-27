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

    $origin = $_POST["origin"];
    $destination = $_POST["destination"];
    $arrival = $_POST["departure"];
    $departure = $_POST["return"];
    $passengers = $_POST["passengers"];

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM train WHERE (origin = ? OR ? IS NULL OR ? = '') AND (destination = ? OR ? IS NULL OR ? = '') AND (arrivaltime = ? OR ? IS NULL OR ? = '') AND (departuretime = ? OR ? IS NULL OR ? = '') AND (passengerleft >= ? OR ? IS NULL OR ? = '')");
    $stmt->bind_param("sssssssssssssss", $origin, $origin,  $origin,  $destination,$destination,  $destination, $arrival,$arrival,$arrival , $departure,  $departure,  $departure,  $passengers,  $passengers,  $passengers);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch all rows from the result
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    // Return the found rows as JSON response
    header('Content-Type: application/json');
    echo json_encode($rows);
    
      exit();
}
?>
