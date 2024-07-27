<?php
include ("companyregisterphp.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="companyregister.css" />
  </head>
  <body>
    <div class="container">
      <h2>Company Registration</h2>
      <form action="#" method="post" id="registration-form" action="companyregisterphp.php" method="post">
        <label for="phone-number">phone number:</label>
        <input type="num" id="phone-number" name="phone-number" required />
        <span id="number-match"></span>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <span id="password-strength"></span>

        <label for="confirm-password">Confirm Password:</label>
        <input
          type="password"
          id="confirm-password"
          name="confirm-password"
          required
        />

        <span id="password-match"></span>

        <input type="submit" value="Register" />
        <span id="user-exists-message" style="padding-top:10px;color: red; font-weight: bold;text-align:center;"><?php echo isset($userExistsMessage) ? $userExistsMessage : ''; ?></span>

      </form>
      <div class="login-link">
        Already have an account? <a href="companylogin.php">Login</a>
      </div>
      <div class="login-link">
       Login as user? <a href="login.php">Login</a>
      </div>
      <div class="login-link">
        Register as user? <a href="register.php">Register</a>
      </div>
      
    </div>

    <script src="companyregister.js"></script>
  </body>
</html>
