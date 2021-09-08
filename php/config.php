<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'BIT_PE';
// $host = 'localhost';
// $user = 'id17519778_guptapriyanshu';
// $pass = 'A2d*km*0-^Pz';
// $database = 'id17519778_bit_pe';

// $host = 'hser1i69.epizy.com';
// $user = 'epiz_29621764';
// $pass = 'eCcgmwimqii6J';
// $database = 'epiz_29621764_BitPe';


$conn = mysqli_connect($host, $user, $pass, $database) or die("Could not connect to database" . mysqli_connect_error());
