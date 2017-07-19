<?php 

$servername = "localhost";
$username = "windpractice";
$password = "Ltlvjhjp1996";
$dbname = "stifa";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$conn->query("SET NAMES 'UTF8'");

?>