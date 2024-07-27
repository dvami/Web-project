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
    
// Get form data
$airplaneName = $_POST["airplaneName"];
$arrivalDate = $_POST["arrivalDate"];
$departureDate = $_POST["departureDate"];
$origin = $_POST["origin"];
$destination = $_POST["destination"];
$passengerLeft = $_POST["passengerLeft"];
$baggageWeight = $_POST["baggageWeight"];
$terminal = $_POST["terminal"];

  
               
            $id=0;

            // Get the highest ID from the database
$result = $conn->query("SELECT MAX(id) AS max_id FROM airplane");
$row = $result->fetch_assoc();
$highestId = $row['max_id'];

// Increment the highest ID by 1
$id = $highestId + 1;

            
        // Insert user data into the database
        $stmt = $conn->prepare("INSERT INTO airplane (id,name,arrivaltime,departuretime,origin,destination,passengerleft,baggage,terminal) VALUES (?, ?, ?,?,?,?,?,?,?)");
        $stmt->bind_param("issssssss", $id,$airplaneName,$arrivalDate,$departureDate,$origin,$destination,$passengerLeft,$baggageWeight,$terminal);
        $stmt->execute();
        echo "<script>alert('submitted successfully'); window.location.href = 'companyairplane.php';</script>";

        // Redirect to success page or login page
        header("companyairplane.php");
        exit();
    }

?>
