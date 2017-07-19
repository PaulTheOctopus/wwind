<?php

include 'dbconnect.php';

if(isset($_GET['s']) && $_GET['s'] != ''){
	$s = $_GET['s'];
	$quer = "SELECT * FROM `staff` WHERE last_name LIKE '%$s%'";
	$result = $conn->query($quer);
	while($row = $result->fetch_assoc()){
		$title = $row['last_name'];
		echo "<div style='' id='searchtitle'>" . "<a style='font-family: Times New Roman; text-decoration: none; color: black;'>" . $title . "</a>" . "</div>";
	}
	
}

?>