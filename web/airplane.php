<?php
include ("airplanephp.php");
//not be able to access without logging in
// Check if the user is not signed in
if (!isset($_SESSION["username"])) {
  // Redirect the user to the login page or any other desired page
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Airplane Booking</title>
    <link rel="stylesheet" href="airplane.css" />
  </head>
  <body>
    <h1>Airplane Booking</h1>

    <h2>Flight Filter</h2>
    <form id="filterForm" action="airplanephp.php" method="post">
      <label for="origin">Origin:</label>
      <input type="text" id="origin" name="origin" required/>

      <label for="destination">Destination:</label>
      <input type="text" id="destination" name="destination"   />

      <label for="departure">arrival Date:</label>
      <input type="date" id="departure" name="departure" />

      <label for="return">departure Date:</label>
      <input type="date" id="return" name="return" />

      <label for="passengers">Passengers:</label>
      <input type="number" id="passengers" name="passengers"   />

      <button type="submit" id="search-button">Filter Flights</button>
    </form>

    <h2 id="flightSearchResults">Flight Search Results</h2>
    <div id="searchResults"></div>

    <script src="airplane.js"></script>
  </body>
</html>
