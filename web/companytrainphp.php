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
    
    $trainName = $_POST["trainName"];
    $arrivalDate = $_POST["arrivalDate"];
    $departureDate = $_POST["departureDate"];
    $origin = $_POST["origin"];
    $destination = $_POST["destination"];
    $passengerLeft = $_POST["passengerLeft"];
    $capacity = $_POST["capacity"];
    $coupeNumber = $_POST["coupenumber"];
    $coupeCapacity = $_POST["coupecapacity"];
  
               
            $id=0;

            // Get the highest ID from the database
$result = $conn->query("SELECT MAX(id) AS max_id FROM train");
$row = $result->fetch_assoc();
$highestId = $row['max_id'];

// Increment the highest ID by 1
$id = $highestId + 1;

            
        // Insert user data into the database
        $stmt = $conn->prepare("INSERT INTO train (id,name,arrivaltime,departuretime,origin,destination,passengerleft,capacity,coupenumber,coupecapacity) VALUES (?, ?, ?,?,?,?,?,?,?,?)");
        $stmt->bind_param("isssssssss",$id, $trainName, $arrivalDate, $departureDate, $origin, $destination, $passengerLeft, $capacity, $coupeNumber, $coupeCapacity);
        $stmt->execute();
        echo "<script>alert('submitted successfully'); window.location.href = 'companytrain.php';</script>";

        // Redirect to success page or login page
        header("companytrain.php");
        exit();
    }

?>
