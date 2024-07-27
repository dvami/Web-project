<?php
include ("companyloginphp.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="companylogin.css" />
  </head>
  <body>
    <div class="container">
      <h2>Company Login</h2>
      <form   id="login-form"  method="post" action="companyloginphp.php">
        <label for="username">Email or Phone Number:</label>
        <input type="text" id="username" name="usercompany" required />
        <span id="validation"></span>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <input type="submit" value="Login" />
        <span id="user-exists-message" style="padding-top:10px;color: red; font-weight: bold;text-align:center;"><?php echo isset($loginError) ? $loginError : ''; ?></span>

        </form>
        <div class="registration-link">
          Don't have an account? <a href="companyregister.php">Register</a>
        </div>
        <div class="registration-link">
        Register as user? <a href="register.php">Register</a>
      </div>
      <div class="registration-link">
       Login as user? <a href="login.php">Login</a>
      </div>
    </div>

    <script src="companylogin.js"></script>
  </body>
</html>
