<?php
include ("companyairplanephp.php");
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
  <title>Airplane Add Form</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
  />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="companyairplane.css" />

</head>
<body>
  <h2>Airplane Add Form</h2>
  <form action="companyairplanephp.php" method="post">
    <div>
      <label for="airplaneName">Airplane Name:</label>
      <input type="text" id="airplaneName" name="airplaneName" required>
    </div>
    <div>
      <label for="arrivalDate">Arrival Date:</label>
      <input type="date" id="arrivalDate" name="arrivalDate" required>
    </div>
    <div>
      <label for="departureDate">Departure Date:</label>
      <input type="date" id="departureDate" name="departureDate" required>
    </div>
    <div>
      <label for="origin">Origin:</label>
      <input type="text" id="origin" name="origin" required>
    </div>
    <div>
      <label for="destination">Destination:</label>
      <input type="text" id="destination" name="destination" required>
    </div>
    <div>
      <label for="passengerLeft">Passenger Left:</label>
      <input type="number" id="passengerLeft" name="passengerLeft" required>
    </div>
    <div>
      <label for="baggageWeight">Baggage Weight Allowed:</label>
      <input type="number" id="baggageWeight" name="baggageWeight" required>
    </div>
    <div>
      <label for="terminal">Terminal:</label>
      <input type="number" id="terminal" name="terminal" required>
    </div>
    <br>
    <div class="submit-container">
      <input type="submit" value="Submit">
    </div>
  </form>
</body>
</html>
