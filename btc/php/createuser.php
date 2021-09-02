<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="msapplication-TileColor" content="#da532c" />
  <meta name="theme-color" content="#ffffff" />
  <link rel="apple-touch-icon" sizes="180x180" href="../fav/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="../fav/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="../fav/favicon-16x16.png" />
  <link rel="manifest" href="../fav/site.webmanifest" />
  <link rel="mask-icon" href="../fav/safari-pinned-tab.svg" color="#5bbad5" />
  <title>Recharge Wallet</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../css/createuser.css">
</head>

<body style="background-color : #82E0AA;">


  <?php
  include 'config.php';
  if (isset($_POST['submit'])) {
    if ($_SESSION['username'] != 'admin') {
      $from = 'admin';
      $to = $_SESSION['username'];
      $amount = $_POST['balance'];
      $sql = "SELECT * FROM users where username = '$from'";
      $query = mysqli_query($conn, $sql);
      $sql1 = mysqli_fetch_array($query);
      $sql = "SELECT * from users where username = '$to'";
      $query = mysqli_query($conn, $sql);
      $sql2 = mysqli_fetch_array($query);
      if (($amount) <= 0) {
        echo '<script type="text/javascript">alert("Error! The amount must be positive")</script>';
      } else if ($amount > $sql1['balance']) {
        echo '<script type="text/javascript">alert("Bad luck! Insufficient balance")</script>';
      } else {
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users set balance=$newbalance where username = '$to'";
        mysqli_query($conn, $sql);
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance where username = '$to'";
        mysqli_query($conn, $sql);
        $sender = $sql1['username'];
        $receiver = $sql2['username'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUE('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
          echo "<script> alert('Transaction Successful');
                window.location='transactionhistory.php';
                </script>";
        }
        $newbalance = 0;
        $amount = 0;
      }
    } else {
      echo "<script> alert('Admin can't recharge his account balance')</script>";
    }
  }
  ?>

  <nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand" href="../index.php" style="color : #C0392B;"><b>BitPe</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="../index.php" style="color:#C0392B;"> Your gateway to bitcoin & beyond! </a>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="../index.php" style="color : #C0392B;"><b>Home</b></a></li>
        <li class="nav-item"><a class="nav-link active" href="createuser.php" style="color : #C0392B;"><b>Recharge</b></a></li>
        <li class="nav-item"><a class="nav-link" href="transfermoney.php" style="color : #C0392B;"><b>Transfer</b></a></li>
        <li class="nav-item"><a class="nav-link" href="transactionhistory.php" style="color : #C0392B;"><b>History</b></a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php" style="color : #C0392B;"><b>Logout</b></a></li>
      </ul>
    </div>
  </nav>
  <h2 class="text-center pt-4" style="color : black;">Recharge Wallet</h2><br>
  <div class="background">
    <div class="container">
      <div class="screen">
        <div class="screen-header">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
        <div class="screen-body">
          <div class="screen-body-item left">
            <img class="img-fluid" src="../img/user3.jpg" style="border: none; border-radius: 50%;">
          </div>
          <div class="screen-body-item">
            <form class="app-form" method="post">
              <div class="app-form-group">
                <input class="app-form-control" placeholder="Enter Money in INR" type="number" name="balance" required>
              </div>
              <div class="app-form-group button">
                <input class="app-form-button" type="submit" value="RECHARGE" name="submit"></input>
                <input class="app-form-button" type="reset" value="RESET" name="reset"></input>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="text-center mt-5 py-2"><b>&copy Priyanshu Gupta, 2021</b></footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>