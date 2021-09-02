<?php
include 'php/config.php';
session_start();
error_reporting(0);
if (isset($_SESSION['username'])) {
  header("Location: php/welcome.php");
}
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: php/welcome.php");
  } else echo "<script>alert('Invalid credentials.')</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="msapplication-TileColor" content="#da532c" />
  <meta name="theme-color" content="#ffffff" />
  <link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png" />
  <link rel="manifest" href="fav/site.webmanifest" />
  <link rel="mask-icon" href="fav/safari-pinned-tab.svg" color="#5bbad5" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/signin-up.css">
  <title>Login Form</title>
</head>

<body>
  <div class="container">
    <form action="" method="POST" class="login-email">
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
      <div class="input-group">
        <input type="email" placeholder="Email" name="email" maxlength="51" required>
      </div>
      <div class="input-group">
        <input type="password" placeholder="Password" name="password" maxlength="11" required>
      </div>
      <div class="input-group">
        <button name="submit" class="btn">Login</button>
      </div>
      <p class="login-register-text">Don't have an account?
        <a href="php/register.php">Register Here.</a>.
      </p>
    </form>
  </div>
</body>

</html>