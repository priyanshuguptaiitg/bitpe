<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
  exit();
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="msapplication-TileColor" content="#da532c" />
  <meta name="theme-color" content="#ffffff" />
  <link rel="apple-touch-icon" sizes="180x180" href="../fav/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="../fav/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="../fav/favicon-16x16.png" />
  <link rel="manifest" href="../fav/site.webmanifest" />
  <link rel="mask-icon" href="../fav/safari-pinned-tab.svg" color="#5bbad5" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/about.css">
  <title>About Us</title>
</head>

<body style="background-color: cyan;">
  <nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand" href="../index.php" style="color:#C0392B;"> <b>BitPe</b> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>
    <a class="navbar-brand" href="../index.php" style="color:#C0392B;"> Your gateway to bitcoin & beyond! </a>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="../index.php" style="color : #C0392B;"><b>Home</b></a></li>
        <li class="nav-item"><a class="nav-link active" href="about.php" style="color : #C0392B;"><b>About</b></a></li>
        <li class="nav-item"><a class="nav-link" href="crypto.php" style="color : #C0392B;"><b>Crypto</b></a></li>
        <li class="nav-item"><a class="nav-link" href="createuser.php" style="color : #C0392B;"><b>Recharge</b></a></li>
        <li class="nav-item"><a class="nav-link" href="transfermoney.php" style="color : #C0392B;"><b>Transfer</b></a></li>
        <li class="nav-item"><a class="nav-link" href="shopping.php" style="color : #C0392B;"><b>Shopping</b></a></li>
        <li class="nav-item"><a class="nav-link" href="transactionhistory.php" style="color : #C0392B;"><b>History</b></a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php" style="color : #C0392B;"><b>Logout</b></a></li>
      </ul>
    </div>
  </nav><br>
  <div class="container">
    <img src="../img/banner.jpg" alt="banner" class="img-fluid" style="width: 100%;">
    <b>Bitcoin is the world’s first decentralized cryptocurrency – a type of digital asset that uses public-key cryptography to record, sign and send transactions over the Bitcoin blockchain. Launched on Jan. 3, 2009, by an anonymous computer programmer (or group of programmers) under the pseudonym “Satoshi Nakamoto”, the Bitcoin network (with an uppercase “B”) is a peer-to-peer electronic payment system that uses a native cryptocurrency called bitcoin (lower case “b”) to transfer value over the internet or act as a store of value like gold and silver. Bitcoin and other cryptocurrencies are like the email of the financial world. The currency does not exist in physical form, value is transacted directly between the sender and the receiver, and there is no need for banking intermediaries to facilitate the transaction. Everything is done publicly through a transparent, immutable, distributed ledger technology called blockchain.</b><br>
  </div>
  <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="social-wrapper">
      <ul>
        <li>
          <a href="https://twitter.com/bdbrightdiamond" target="_blank">
            <img src="../img/twitter.png" alt="Twitter Logo" class="icon"></a>
        </li>
        <li>
          <a href="https://mailto:priyanshuguptaiitg@gmail.com" target="_blank">
            <img src="../img/gmail.png" alt="Gmail Logo" class="icon"></a>
        </li>
        <li>
          <a href="https://www.linkedin.com/in/guptapriyanshu/" target="_blank">
            <img src="../img/linkedin.png" alt="Linkedin Logo" class="icon"></a>
        </li>
        <li>
          <a href="https://www.facebook.com/bdbrightdiamond/" target="_blank">
            <img src="../img/facebook.png" alt="Facebook Logo" class="icon"></a>
        </li>
      </ul>
    </div>
    <nav class="footer-nav" role="navigation">
      <b>&copy; PRIYANSHU GUPTA
        <script>
          document.write(new Date().getFullYear())
        </script>
        . All Rights Reserved.
      </b>
    </nav>
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>