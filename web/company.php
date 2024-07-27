<?php
include ("companyphp.php");
// Check if the user is not signed in
if ( !isset($_SESSION["usercompany"])) {
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

    <title>Company Information</title>
    <link rel="stylesheet" type="text/css" href="company.css" />
  </head>
  <body>
    <div class="container">
      <h2>Company Information</h2>
      <form id="user-info-form" method="post" action="companyphp.php">
      <input type="hidden" id="username" value="<?php echo $_SESSION['usercompany']; ?>">
      <input type="hidden" id="firstname" value="<?php echo $_SESSION['companyname']; ?>">

      <input type="hidden" id="phoneNumber" value="<?php echo $_SESSION['phoneNumber']; ?>">

      <input type="hidden" id="emails" value="<?php echo $_SESSION['email']; ?>">

     


      <input type="hidden" id="cities" value="<?php echo $_SESSION['city']; ?>">
      <input type="hidden" id="states" value="<?php echo $_SESSION['state']; ?>">
     

        <div class="form-group">
          <label for="first-name">Company Name:</label>
          <input
            type="text"
            id="first-name"
            name="first-name"
            placeholder="xyz"
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
          <label for="email">Email Address:</label>
          <input
            type="email"
            id="email"
            name="email"
    placeholder="<?php echo preg_match('/^\d{11}$/', $_SESSION['usercompany']) ? 'helloexample.com' :$_SESSION['usercompany'] ?>"
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
            placeholder="<?php echo preg_match('/^\d{11}$/', $_SESSION['usercompany']) ? $_SESSION['usercompany'] : '09112777777'; ?>"
            autocomplete="off"
            required

          />
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
 
    <script src="company.js"></script>
  </body>
</html>
