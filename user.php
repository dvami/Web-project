<?php
include ("userphp.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>User Information</title>
    <link rel="stylesheet" type="text/css" href="user.css" />
  </head>
  <body>
    <div class="container">
      <h2>User Information</h2>
      <form id="user-info-form" method="post" action="userphp.php">
      <input type="hidden" id="username" value="<?php echo $_SESSION['username']; ?>">
      <input type="hidden" id="firstname" value="<?php echo $_SESSION['firstname']; ?>">

<input type="hidden" id="lastname" value="<?php echo $_SESSION['lastname']; ?>">
      <input type="hidden" id="phoneNumber" value="<?php echo $_SESSION['phoneNumber']; ?>">

      <input type="hidden" id="emails" value="<?php echo $_SESSION['email']; ?>">

     

      <input type="hidden" id="addresses" value="<?php echo $_SESSION['address']; ?>">

      <input type="hidden" id="cities" value="<?php echo $_SESSION['city']; ?>">
      <input type="hidden" id="states" value="<?php echo $_SESSION['state']; ?>">
      <input type="hidden" id="zipcode" value="<?php echo $_SESSION['zipcode']; ?>">
      <input type="hidden" id="dob" value="<?php echo $_SESSION['dob']; ?>">
 

        <div class="form-group">
          <label for="first-name">First Name:</label>
          <input
            type="text"
            id="first-name"
            name="first-name"
            placeholder="John"
            autocomplete="off"

          />
          <!-- onfucos:when click on filed ,placeholder disappears -->
        </div>
        <div class="form-group">
           <input
            type="hidden"
            id="pid"
            
            name="pid"
            value="<?php echo intval($_SESSION['id']); ?>"
           />
        </div>
        <div class="form-group">
          <label for="last-name">Last Name:</label>
          <input
            type="text"
            id="last-name"
            name="last-name"
            placeholder="Doe"
            autocomplete="off"

           />
        </div>
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input
            type="email"
            id="email"
            name="email"
    placeholder="<?php echo preg_match('/^\d{11}$/', $_SESSION['username']) ? 'helloexample.com' :$_SESSION['username'] ?>"
            required
            autocomplete="off"

          />
        </div>
        <div class="form-group">

          <label for="phone-number">Mobile Number:</label>
          <input
            type="tel"
            id="phone-number"
            name="phone-number"
            placeholder="<?php echo preg_match('/^\d{11}$/', $_SESSION['username']) ? $_SESSION['username'] : '09112777777'; ?>"
            autocomplete="off"
            required

          />
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <textarea
            id="address"
            name="address"
             placeholder="123 Main St, Anytown USA"
             autocomplete="off"

          >
</textarea
          >
        </div>
        <div class="form-group">
          <label for="city">City:</label>
          <input
            type="text"
            id="city"
            name="city"
            placeholder="Anytown"
            autocomplete="off"

          />
        </div>
        <div class="form-group">
          <label for="state">State:</label>
          <input
            type="text"
            id="state"
            name="state"
            placeholder="CA"
            autocomplete="off"

          />
        </div>
        <div class="form-group">
          <label for="zip-code">Zip Code:</label>
          <input
            type="text"
            id="zip-code"
            name="zip-code"
            placeholder="12345"
            autocomplete="off"

          />
        </div>
        <div class="form-group">
          <label for="date-of-birth">Date of Birth:</label>
          <input
            type="date"
            id="date-of-birth"
            name="date-of-birth"
            onfocus="this.value=''"
            
            value="1900-01-01"
            autocomplete="off"

          />
        </div>

        <button type="submit">Save Changes</button>

      </form>
    </div>
    <style>
      ::placeholder {
    color: gray!important;
  }
  input[type="text"],
  input[type="email"],
  input[type="tel"],
   
  textarea {
    color: red!important;
  }
  
</style>
 
    <script src="user.js"></script>
  </body>
</html>
