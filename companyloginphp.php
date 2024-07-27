<?php
session_start();
// Database configuration
$dbHost = "localhost";
$dbName = "web";
$dbUser = "root";
$dbPass = "";

// Connect to the database$usercompany
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, 3306);
if ($conn->connect_error) {
    die("Connection failed! " . $conn->connect_error);
}
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $usercompany = $_POST["usercompany"];
    $password = $_POST["password"];
    
    if (isset($_SESSION['banned']) && $_SESSION['banned'] <= time()){
        // Reset login attempts and remove the ban
        unset($_SESSION['login_attempts']);
        unset($_SESSION['banned']);
           }
     // Check if the IP address is banned
     if (isset($_SESSION['banned']) && $_SESSION['banned'] > time()) {
        $banDuration = $_SESSION['banned'] - time();
        echo "You are temporarily banned. Please try again after $banDuration seconds.";
       
        exit();
    }
    
    // Check if the IP address has reached the maximum number of failed attempts
    if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 3) {
        $_SESSION['banned'] = time() + 60; // Ban the IP address for 1 minute
        echo "You have exceeded the maximum number of login attempts. You are temporarily banned.";
        exit();
    }
   // Perform throttling delay after multiple failed attempts
   if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] > 0) {
    // Sleep for 2 seconds to introduce a delay
   // sleep(2);
}


    if (!preg_match('/^\d{11}$/', $usercompany)) {
        // Check if user exists in the database (by email)
        $stmt = $conn->prepare("SELECT * FROM company_registration WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $usercompany, $password);
        $stmt->execute();
        $result = $stmt->get_result();

      
    } else {
        // Check if user exists in the database (by phone number)
        $stmts = $conn->prepare("SELECT * FROM company_registration WHERE phoneNumber = ? AND password = ?");
        $stmts->bind_param("ss", $usercompany, $password);
        $stmts->execute();
        $results = $stmts->get_result();
    }
    if (isset($result) && $result->num_rows === 1) {
        // User exists (by email), redirect to dashboard or success page
        $_SESSION["usercompany"] = $usercompany;
        unset($_SESSION['username']);
        unset($_SESSION['login_attempts']);

       

        if ($row = $result->fetch_assoc()) {
            // Access the columns of the row
            $phoneNumber = $row['phoneNumber'];
            $email = $row['email'];
            $comanyname=$row['companyname'];
            $city = $row['city'];
            $state = $row['state'];
             $id = $row['id'];

             $_SESSION["phoneNumber"] = $phoneNumber;
            $_SESSION["email"] = $email;
            $_SESSION["companyname"] = $comanyname;
            $_SESSION["city"] = $city;
            $_SESSION["state"] = $state;
            $_SESSION["id"] = $id;



            header("Location: landing.php");

        } else {
            echo "User not found.";
        }

        exit();
    } elseif (isset($results) && $results->num_rows === 1) {
        // User exists (by phone number), redirect to dashboard or success page
        $_SESSION["usercompany"] =$usercompany;
unset($_SESSION['username']);
unset($_SESSION['login_attempts']);

        if ($row = $results->fetch_assoc()) {
            // Access the columns of the row
            $phoneNumber = $row['phoneNumber'];
            $email = $row['email'];
            $comanyname=$row['companyname'];
            $city = $row['city'];
            $state = $row['state'];
             $id = $row['id'];

             $_SESSION["phoneNumber"] = $phoneNumber;
            $_SESSION["email"] = $email;
            $_SESSION["companyname"] = $comanyname;
            $_SESSION["city"] = $city;
            $_SESSION["state"] = $state;
            $_SESSION["id"] = $id;
        header("Location: landing.php");

        } else {

            echo "User not found.";
        }
        exit();
    } else {
         // User does not exist or invalid credentials
         if (isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts']++;
        } else {
            $_SESSION['login_attempts'] = 1;
        }
        // User does not exist or invalid credentials
        $loginError = "Invalid username or password";
        echo "<script>alert('$loginError'); window.location.href = 'companylogin.php';</script>";

     }
}
?>
