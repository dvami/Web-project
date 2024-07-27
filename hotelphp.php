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
    $name = $_POST["name-filter"];
    $city = $_POST["city-filter"];
    $arrivetime = $_POST["arrival-filter"];
    $departuretime = $_POST["departure-filter"];
    $guest = $_POST["guests-filter"];

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM hotel WHERE (name = ? OR ? IS NULL OR ? = '') AND (city = ? OR ? IS NULL OR ? = '') AND (arrivaltime = ? OR ? IS NULL OR ? = '') AND (departuretime = ? OR ? IS NULL OR ? = '') AND (guestnumber = ? OR ? IS NULL OR ? = '')");
    $stmt->bind_param("sssssssssssssss", $name, $name, $name, $city, $city, $city, $arrivaltime, $arrivaltime, $arrivaltime, $departuretime, $departuretime, $departuretime, $guest, $guest, $guest);
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
