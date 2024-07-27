<?php
include ("hotelphp.php");
// Check if the user is not signed in
if (!isset($_SESSION["username"]) ) {
  // Redirect the user to the login page or any other desired page
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel and Suite Search Bar</title>
    <link rel="stylesheet" href="hotel.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  </head>
  <body>
    <h1>Hotel and Suite Search Bar</h1>
    <div class="search-bar">
    <form    method="post"  id="search-bar"action="hotelphp.php" >
      <input type="text" name="name-filter" id="name-filter" placeholder="Name..." />
      <input type="text" name="city-filter"id="city-filter" placeholder="City..." />
      <input
        id="arrival-filter"
        type="text"
        onfocus="(this.type='date')"
        onblur="(this.type='text')"
        placeholder="Arrival time"
        name="arrival-filter"
      />
      <input
        id="departure-filter"
        type="text"
        onfocus="(this.type='date')"
        onblur="(this.type='text')"
        placeholder="Departure time"
        name="departure-filter"
      />

      <input type="text" name="guests-filter"id="guests-filter" placeholder="Guests..." />
      <button id="search-button" type="submit">Search</button>
</form>
    </div>

    <div id="results">
      <!-- Search results will be displayed here -->
    </div>

    <script src="hotel.js"></script>
  </body>
</html>
