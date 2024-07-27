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
    
    $name = $_POST["name"];
    $roomType = $_POST["roomType"];
    $arrivalTime = $_POST["arrivalTime"];
    $departureTime = $_POST["departureTime"];
    $guestNumber = $_POST["guestNumber"];
    $city = $_POST["city"];

  
               
            $id=0;

            // Get the highest ID from the database
$result = $conn->query("SELECT MAX(id) AS max_id FROM hotel");
$row = $result->fetch_assoc();
$highestId = $row['max_id'];

// Increment the highest ID by 1
$id = $highestId + 1;

            
        // Insert user data into the database
        $stmt = $conn->prepare("INSERT INTO hotel (id,name,roomtype,arrivaltime,departuretime,guestnumber,city) VALUES (?, ?,?,?,?,?,?)");
        $stmt->bind_param("issssss", $id, $name,$roomType,$arrivalTime,$departureTime,$guestNumber,$city);
        $stmt->execute();
        echo "<script>alert('submitted successfully'); window.location.href = 'companyhotel.php';</script>";

        // Redirect to success page or login page
        header("companyhotel.php");
        exit();
    }

?>
