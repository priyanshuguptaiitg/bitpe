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
  <title>Transaction</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/table.css">
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="../css/button.css">
</head>

<body style="background-color : #E59866 ;">
  <?php
  include 'config.php';
  if (isset($_POST['submit'])) {
    $from = $_SESSION['username'];
    $to = $_POST['username'];
    $amount = $_POST['amount'];
    $sql = "SELECT * from users where username='$from'";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);
    $sql = "SELECT * from users where username='$to'";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);
    if (mysqli_num_rows($query) == 0) {
      echo "<script>alert('Please enter correct username!')</script>";
    } else if (($amount) <= 0) {
      echo '<script type="text/javascript">alert("Error! The amount must be positive")</script>';
    } else if ($amount > $sql1['balance']) {
      echo '<script type="text/javascript">alert("Bad luck! Insufficient balance")</script>';
    } else if ($sql1['username'] == $sql2['username']) {
      echo '<script type="text/javascript">alert("Can\'t send to yourself !")</script>';
    } else {
      $newbalance = $sql1['balance'] - $amount;
      $sql = "UPDATE users set balance=$newbalance where id=$from";
      mysqli_query($conn, $sql);
      $newbalance = $sql2['balance'] + $amount;
      $sql = "UPDATE users set balance=$newbalance where id=$to";
      mysqli_query($conn, $sql);
      $sender = $sql1['username'];
      $receiver = $sql2['username'];
      $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
      $query = mysqli_query($conn, $sql);
      if ($query) {
        echo "<script> alert('Transaction Successful');
              window.location='transactionhistory.php';
              </script>";
      }
      $newbalance = 0;
      $amount = 0;
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
        <li class="nav-item"><a class="nav-link" href="createuser.php" style="color : #C0392B;"><b>Recharge</b></a></li>
        <li class="nav-item"><a class="nav-link" href="transfermoney.php" style="color : #C0392B;"><b>Transfer</b></a></li>
        <li class="nav-item"><a class="nav-link" href="transactionhistory.php" style="color : #C0392B;"><b>History</b></a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php" style="color : #C0392B;"><b>Logout</b></a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h2 class="text-center pt-4" style="color : black;">Transaction</h2>
    <?php
    include 'config.php';
    $senderid = $_GET['id'];
    $sql = "SELECT * FROM  users where id=$senderid";
    $result = mysqli_query($conn, $sql);
    if (!$result)
      echo "Error : " . $sql . "<br>" . mysqli_error($conn);
    $rows = mysqli_fetch_assoc($result);
    ?>
    <div>
      <table class="table table-striped table-condensed table-bordered">
        <tr style="color : black;">
          <th class="text-center">Id</th>
          <th class="text-center">username</th>
          <th class="text-center">Email</th>
          <th class="text-center">Balance</th>
        </tr>
        <tr style="color : black;">
          <td class="py-2"><?php echo $rows['id'] ?></td>
          <td class="py-2"><?php echo $rows['username'] ?></td>
          <td class="py-2"><?php echo $rows['email'] ?></td>
          <td class="py-2"><?php echo $rows['balance'] ?></td>
        </tr>
      </table>
    </div>
    <br><br>
    <form method="post" name="tcredit" class="tabletext">
      <label style="color : black;"><b>Transfer To:</b></label>
      <input type="text" class="form-control" placeholder="Enter username of receiver" name="username" maxlength="51" required><br>
      <label style="color : black;"><b>Amount:</b></label>
      <input type="number" class="form-control" placeholder="Enter amount in INR" name="amount" required><br>
      <div class="text-center"><button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button></div>
    </form>
  </div>
  <footer class="text-center mt-5 py-2"><b>&copy Priyanshu Gupta, 2021</b></footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>