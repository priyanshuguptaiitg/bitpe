<?php
include 'config.php';
error_reporting(0);
session_start();
if (isset($_SESSION['username'])) header("Location: ../index.php");
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  if ($password == $cpassword) {
    $sql = "SELECT * FROM users WHERE email='$email' OR username = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo "<script>alert('User registered successfully !!')</script>";
        $username = "";
        $email = "";
        $_POST['password'] = "";
        $_POST['cpassword'] = "";
        header("Location: ../index.php");
      } else {
        echo "<script>alert('Something Went Wrong.')</script>";
      }
    } else {
      echo "<script>alert('Email or Username Already Exists.')</script>";
    }
  } else {
    echo "<script>alert('Passwords didn't match.')</script>";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="msapplication-TileColor" content="#da532c" />
  <meta name="theme-color" content="#ffffff" />
  <link rel="apple-touch-icon" sizes="180x180" href="../fav/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="../fav/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="../fav/favicon-16x16.png" />
  <link rel="manifest" href="../fav/site.webmanifest" />
  <link rel="mask-icon" href="../fav/safari-pinned-tab.svg" color="#5bbad5" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/signin-up.css">
  <title>Register</title>
</head>

<body>
  <div class="container">
    <form action="" method="POST" class="login-email">
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
      <div class="input-group">
        <input type="text" placeholder="Username" name="username" pattern="[a-z0-9]{4,21}" title="4 to 11 characters containing a-z and 0-9" value="<?php echo $username; ?>" required>
      </div>
      <div class="input-group">
        <input type="email" placeholder="Email" name="email" maxlength="51" value="<?php echo $email; ?>" required>
      </div>
      <div class="input-group">
        <input type="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[!@#$%^&*+`~=?\|<>/])(?=.*[a-z])(?=.*[A-Z]).{6,10}" title="6 to 10 characters containing a-z, A-Z, 0-9 and a special symbol" value="<?php echo $_POST['password']; ?>" required>
      </div>
      <div class="input-group">
        <input type="password" placeholder="Confirm Password" name="cpassword" pattern="(?=.*\d)(?=.*[!@#$%^&*+`~=?\|<>/])(?=.*[a-z])(?=.*[A-Z]).{6,10}" title="6 to 10 characters containing a-z, A-Z, 0-9 and a special symbol" value="<?php echo $_POST['cpassword']; ?>" required>
      </div>
      <div class="input-group">
        <button name="submit" class="btn">Register</button>
      </div>
      <p class="login-register-text">Have an account? <a href="../index.php">Login Here</a>.</p>
    </form>
  </div>
</body>

</html>