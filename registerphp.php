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
    
    $phoneNumber = $_POST["phone-number"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];

    // Validate form data
    if (!preg_match("/^\d{11}$/", $phoneNumber)) {
        $numberMatch = "Invalid Number";
    } elseif ($password !== $confirmPassword) {
        $passwordMatch = "Passwords do not match";
    } else {
          // Check if user with the given phone number already exists
          $stmt = $conn->prepare("SELECT * FROM user_registration WHERE phoneNumber = ?");
          $stmt->bind_param("s", $phoneNumber);
          $stmt->execute();
          $result = $stmt->get_result();
  
             // Check if user with the given phone number already exists
             $stmt = $conn->prepare("SELECT * FROM user_registration WHERE email = ?");
             $stmt->bind_param("s", $email);
             $stmt->execute();
             $results = $stmt->get_result();
     
        if ($result->num_rows > 0) {
            $userExistsMessage = "User with the given phone number already exists";
        }
        else if($results->num_rows > 0){
            $userExistsMessage = "User with the given email already exists";

        }
        else {
               
            $id=0;

            // Get the highest ID from the database
$result = $conn->query("SELECT MAX(id) AS max_id FROM user_registration");
$row = $result->fetch_assoc();
$highestId = $row['max_id'];

// Increment the highest ID by 1
$id = $highestId + 1;

            
        // Insert user data into the database
        $stmt = $conn->prepare("INSERT INTO user_registration (phoneNumber, email, password,id) VALUES (?, ?, ?,?)");
        $stmt->bind_param("ssss", $phoneNumber, $email, $password,   $id);
        $stmt->execute();

        // Redirect to success page or login page
        header("Location: login.php");
        exit();
    }
}}
?>
