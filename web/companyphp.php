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
    $email = $_POST["email"];
    $phoneNumber = $_POST["phone-number"];
    $city = $_POST["city"];
     $state = $_POST["state"];
    $id= $_POST["pid"]; 
 
      // Check if user with the given phone number already exists
      $stmt = $conn->prepare("SELECT * FROM company_registration WHERE phoneNumber = ? AND id <> ?");
      $stmt->bind_param("si", $phoneNumber, $id);
      $stmt->execute();
      $result = $stmt->get_result();

         // Check if user with the given phone number already exists
         $stmt = $conn->prepare("SELECT * FROM company_registration WHERE email = ? AND id <> ?");
         $stmt->bind_param("si", $email, $id);
         $stmt->execute();
         $results = $stmt->get_result();
 
    if ($result->num_rows > 0) {
        $userExistsMessage = "Company with the given phone number already exists";
        echo "<script>alert('$userExistsMessage'); window.location.href = 'company.php';</script>";
        exit();

    }
    else if($results->num_rows > 0){
        $userExistsMessage = "Company with the given email already exists";
        echo "<script>alert('$userExistsMessage'); window.location.href = 'company.php';</script>";
        exit();
    }
    else{

        // Check if any of the variables are empty
    if (!empty($firstname) ||  !empty($email) || !empty($phoneNumber) || !empty($city) || !empty($state) ) {
        // Build the SQL update query
        $sql = "UPDATE company_registration SET";

        // Add the columns to update if the corresponding variables are not empty
        if (!empty($firstname)) {
            $sql .= " companyname = '$firstname',";
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
       
        if (!empty($state)) {
            $sql .= " state = '$state',";
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

    $userExistsMessage = "Company information updated successfully";
    echo "<script>alert('$userExistsMessage'); window.location.href = 'landing.php';</script>";        exit();


    }}
?>
