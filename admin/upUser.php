
<?php
include 'dbconnect.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="css/style_admin.css" rel="stylesheet">
  	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap.css" rel="stylesheet">
<title>Untitled Document</title>
</head>
<body>
	<center>
<form class = "forma">
	<fieldset class = "answer">
<?php
if (isset($_POST['last_name'])){
	$last_name = $_POST['last_name'];
	$name = $_POST['name'];
	$date_of_employment = $_POST['date_of_employment'];
	$priority = $_POST['priority'];
	$level_access = $_POST['level_access'];
	$department = $_POST['department'];
	$post = $_POST['post'];
	$project = $_POST['project'];
	$e_mail = $_POST['e_mail'];


	$date_of_beg_red = $_POST['date_of_beg_red'];
	$date_of_beg_plan = $_POST['date_of_beg_plan'];
	$date_of_end_red = $_POST['date_of_end_red'];
	$date_of_beg_vac = $_POST['date_of_beg_vac'];
	$date_of_end_vac = $_POST['date_of_end_vac'];

	$quer = "UPDATE staff SET last_name = '$last_name', 
	name = '$name', date_of_employment = '$date_of_employment', priority = '$priority', 
	level_access = '$level_access', department = '$department', post = '$post', project = '$project',
	e_mail = '$e_mail', date_of_beg_red = '$date_of_beg_red', date_of_beg_plan = '$date_of_beg_plan',
	 date_of_end_red = '$date_of_end_red', date_of_beg_vac = '$date_of_beg_vac',
	  date_of_end_vac = '$date_of_end_vac' WHERE last_name = '$last_name'";
	$result = $conn->query($quer);
	echo '<p class = "text">Запись успешно обновлена!</p>';
}
else 
	echo '<p class = "text">Данные введены не верно!</p>';
?>
<button class="btn btn-large btn-info"  formaction="http://wwind/userUpForm.html">Обновить период</button>
<button class= "btn btn-large btn-primary"  formaction="http://wwind/admin_bd.php">Вернуться</button>
</fieldset>
</form>
</center>
</body>
</html>