<?php
include ("loginphp.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title> Login Page</title>
    <link rel="stylesheet" type="text/css" href="login.css" />
  </head>
  <body>
    <div class="container">
      <h2>User Login</h2>
      <form action="#" method="post"  id="login-form"  method="post" action="loginphp.php">
        <label for="username">Email or Phone Number:</label>
        <input type="text" id="username" name="username" required />
        <span id="validation"></span>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <input type="submit" value="Login" />
        <span id="user-exists-message" style="padding-top:10px;color: red; font-weight: bold;text-align:center;"><?php echo isset($loginError) ? $loginError : ''; ?></span>

        </form>
        <div class="registration-link">
          Don't have an account? <a href="register.php">Register</a>
        </div>
        <div class="registration-link">
        Register as Company? <a href="companyregister.php">Register</a>
      </div>
      <div class="registration-link">
        Login as Company? <a href="companylogin.php">Login</a>
      </div>
    </div>

    <script src="logins.js"></script>
  </body>
</html>
