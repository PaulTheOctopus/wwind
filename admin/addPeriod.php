
<?php
include 'dbconnect.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php 
$period = $_POST['period'];
$beg = $_POST['beg'];
$end = $_POST['end'];


$quer = "INSERT INTO vacation (period, date_of_beg_period, date_of_end_period) VALUES('$period', '$beg', '$end');";
$result = $conn->query($quer);
echo "<p>Новая запись вставлена в базу!</p>";
?>
<a href="http://wwind/addForm.html">Добавить период</a>
<a href="http://wwind/admin_period.php">Вернуться</a>
</body>
</html>