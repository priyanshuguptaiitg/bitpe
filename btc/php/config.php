<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "database";
	$conn = mysqli_connect($servername, $username, $password, $dbname) or die("DB NOT CONNECTED, Error : --> ".mysqli_connect_error());
?>