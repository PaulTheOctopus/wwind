
<?php
include 'dbconnect.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap.css" rel="stylesheet">
<title>Untitled Document</title>
</head>
<body>
	<center>
<form>
	<fieldset>
<?php
if (isset($_POST['id'])){
	$id = $_POST['id']; 
	$period = $_POST['period'];
	$beg = $_POST['beg'];
	$end = $_POST['end'];

	$quer = "UPDATE vacation SET period = '$period', date_of_beg_period = '$beg', date_of_end_period = '$end' WHERE id = '$id'";
	$result = $conn->query($quer);
	echo '<p class = "text">Запись успешно обновлена!</p>';
}
else 
	echo '<p class = "text">Данные введены не верно!</p>';
?>
<a href="http://wwind/periodUpForm.html">Обновить период</a>
<a href="http://wwind/admin_period.php">Вернуться</a>
</fieldset>
</form>
</center>
</body>
</html>