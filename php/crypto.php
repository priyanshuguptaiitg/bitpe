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
  <title>Transaction History</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/navbar.css">
</head>

<body style="background-color : #F1948A;">
  <nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand" href="../index.php" style="color : #C0392B;"><b>BitPe</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="../index.php" style="color:#C0392B;"> Your gateway to bitcoin & beyond! </a>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="../index.php" style="color : #C0392B;"><b>Home</b></a></li>
        <li class="nav-item"><a class="nav-link" href="about.php" style="color : #C0392B;"><b>About</b></a></li>
        <li class="nav-item"><a class="nav-link active" href="crypto.php" style="color : #C0392B;"><b>Crypto</b></a></li>
        <li class="nav-item"><a class="nav-link" href="createuser.php" style="color : #C0392B;"><b>Recharge</b></a></li>
        <li class="nav-item"><a class="nav-link" href="transfermoney.php" style="color : #C0392B;"><b>Transfer</b></a></li>
        <li class="nav-item"><a class="nav-link" href="shopping.php" style="color : #C0392B;"><b>Shopping</b></a></li>
        <li class="nav-item"><a class="nav-link" href="transactionhistory.php" style="color : #C0392B;"><b>History</b></a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php" style="color : #C0392B;"><b>Logout</b></a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <h2 class="text-center pt-4" style="color : black;">What can you get in 1 bitcoin currently?</h2><br>
    <div class="table-responsive-sm">
      <table class="table table-hover table-striped table-condensed table-bordered">
        <thead style="color : black;">
          <tr>
            <th class="text-center">S.No.</th>
            <th class="text-center">Code</th>
            <th class="text-center">Name</th>
            <th class="text-center">Quantity</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $c = 1;
          $url = "https://bitpay.com/api/rates";
          $json = json_decode(file_get_contents($url));
          foreach ($json as $object) {
          ?>
            <tr style="color : black;">
              <td class="py-2"><?php echo $c++; ?></td>
              <td class="py-2"><?php echo $object->code; ?></td>
              <td class="py-2"><?php echo $object->name; ?></td>
              <td class="py-2"><?php echo $object->rate; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>