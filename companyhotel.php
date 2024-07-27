<?php
include ("companyhotelphp.php");
// Check if the user is not signed in
if ( !isset($_SESSION["usercompany"])) {
  // Redirect the user to the login page or any other desired page
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Hotel Add Form</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
  />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="companyhotel.css" />

</head>
<body>
  <h2>Hotel Add Form</h2>
  <form action="companyhotelphp.php" method="post">
    <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div>
      <label for="roomType">Room Type:</label>
      <input type="text" id="roomType" name="roomType" required>
    </div>
    <div>
      <label for="arrivalTime">Arrival Time:</label>
      <input type="date" id="arrivalTime" name="arrivalTime" required>
    </div>
    <div>
      <label for="departureTime">Departure Time:</label>
      <input type="date" id="departureTime" name="departureTime" required>
    </div>
    <div>
      <label for="guestNumber">Number of Guests:</label>
      <input type="number" id="guestNumber" name="guestNumber" required>
    </div>
    <div>
      <label for="city">City:</label>
      <input type="text" id="city" name="city" required>
    </div>
    <br>
    <div>
      <input type="submit" value="Submit">
    </div>
  </form>
</body>
</html>