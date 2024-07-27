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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = $_POST["first-name"];
    $lastname = $_POST["last-name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phone-number"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $state = $_POST["state"];
    $id= $_POST["pid"]; 
    $zipcode = $_POST["zip-code"];
    $dob = $_POST["date-of-birth"];

      // Check if user with the given phone number already exists
      $stmt = $conn->prepare("SELECT * FROM user_registration WHERE phoneNumber = ? AND id <> ?");
      $stmt->bind_param("si", $phoneNumber, $id);
      $stmt->execute();
      $result = $stmt->get_result();

         // Check if user with the given phone number already exists
         $stmt = $conn->prepare("SELECT * FROM user_registration WHERE email = ? AND id <> ?");
         $stmt->bind_param("si", $email, $id);
         $stmt->execute();
         $results = $stmt->get_result();
 
    if ($result->num_rows > 0) {
        $userExistsMessage = "User with the given phone number already exists";
        echo "<script>alert('$userExistsMessage'); window.location.href = 'user.php';</script>";
        exit();

    }
    else if($results->num_rows > 0){
        $userExistsMessage = "User with the given email already exists";
        echo "<script>alert('$userExistsMessage'); window.location.href = 'user.php';</script>";
        exit();
    }
    else{

        // Check if any of the variables are empty
    if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($phoneNumber) || !empty($city) || !empty($address) || !empty($state) || !empty($zipcode) || !empty($dob)) {
        // Build the SQL update query
        $sql = "UPDATE user_registration SET";

        // Add the columns to update if the corresponding variables are not empty
        if (!empty($firstname)) {
            $sql .= " firstname = '$firstname',";
        }
        if (!empty($lastname)) {
            $sql .= " lastname = '$lastname',";
        }
        if (!empty($email)) {
            $sql .= " email = '$email',";
        }
        if (!empty($phoneNumber)) {
            $sql .= " phoneNumber = '$phoneNumber',";
        }
        if (!empty($city)) {
            $sql .= " city = '$city',";
        }
        if (!empty($address)) {
            $sql .= " address = '$address',";
        }
        if (!empty($state)) {
            $sql .= " state = '$state',";
        }
        if (!empty($zipcode)) {
            $sql .= " zipcode = '$zipcode',";
        }
        if (!empty($dob)) {
            $sql .= " dob = '$dob',";
        }

        // Remove the trailing comma from the SQL query
        $sql = rtrim($sql, ",");

        // Add the WHERE condition to update the specific row with the given ID
        $sql .= " WHERE id = $id";

        // Execute the SQL update query
        if ($conn->query($sql) === TRUE) {
            
            echo "Record updated successfully";
           
         } else {
            echo "Error updating record: " . $conn->error;
        }
        
    }

    $userExistsMessage = "User information updated successfully";
    echo "<script>alert('$userExistsMessage'); window.location.href = 'landing.php';</script>";        exit();


    }}
?>
