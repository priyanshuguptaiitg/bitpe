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
  <title> Shopping </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../css/button.css">
</head>

<body style="background-color : #BDC3C7;">
  <?php
  include 'config.php';
  $sql = "SELECT * FROM products";
  $result = mysqli_query($conn, $sql);
  ?>
  <nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand" href="../index.php" style="color : #C0392B;"><b>BitPe</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="../index.php" style="color:#C0392B;"> Your gateway to bitcoin & beyond! </a>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="../index.php" style="color : #C0392B;"><b>Home</b></a></li>
        <li class="nav-item"><a class="nav-link" href="about.php" style="color : #C0392B;"><b>About</b></a></li>
        <li class="nav-item"><a class="nav-link" href="crypto.php" style="color : #C0392B;"><b>Crypto</b></a></li>
        <li class="nav-item"><a class="nav-link" href="createuser.php" style="color : #C0392B;"><b>Recharge</b></a></li>
        <li class="nav-item"><a class="nav-link" href="transfermoney.php" style="color : #C0392B;"><b>Transfer</b></a></li>
        <li class="nav-item"><a class="nav-link active" href="shopping.php" style="color : #C0392B;"><b>Shopping</b></a></li>
        <li class="nav-item"><a class="nav-link" href="transactionhistory.php" style="color : #C0392B;"><b>History</b></a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php" style="color : #C0392B;"><b>Logout</b></a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <h2 class="text-center pt-4" style="color : black;">Explore the given range of exclusive products</h2>
    <br>
    <div class="row">
      <div class="col">
        <div class="table-responsive-sm">
          <table class="table table-hover table-sm table-striped table-condensed table-bordered" style="border-color:black;">
            <thead style="color : black;">
              <tr>
                <th scope="col" class="text-center py-2">Id</th>
                <th scope="col" class="text-center py-2">Item</th>
                <th scope="col" class="text-center py-2">Picture</th>
                <th scope="col" class="text-center py-2">Price Per Quantity (In INR)</th>
                <th scope="col" class="text-center py-2">Quantity</th>
                <th scope="col" class="text-center py-2">Purchse</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $link = array("../img/mobile.png", "../img/watch.png", "../img/painting.png", "../img/bike.png");
              $c = 0;
              while ($rows = mysqli_fetch_assoc($result)) {
              ?>
                <tr style="color : black;">
                  <form action="shoppingdetail.php" method="get">
                    <td class="py-2"><input type="number" name="id" value=<?php echo $rows['id'] ?> readonly style="width: 20%;"></td>
                    <td class="py-2"><?php echo $rows['prodname'] ?></td>
                    <td class="py-2"><img src=<?php echo $link[$c++] ?> style="width:6em"></td>
                    <td class="py-2"><?php echo $rows['price'] ?></td>
                    <td class="py-2"><input type="number" name="quantity" value="1" min="1" style="width: 20%;"></td>
                    <td class="py-2"><button type="submit" class="btn" style="background-color: #A569BD;">Buy</button></td>
                  </form>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>