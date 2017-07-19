
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
$Key_staff = $_POST['Key_staff']; 
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

$quer = "INSERT INTO staff (Key_staff, last_name, name, date_of_employment, priority, level_access, department, post, project, e_mail, 
	date_of_beg_red, date_of_end_red, date_of_beg_plan, date_of_beg_vac, date_of_end_vac) VALUES('$Key_staff','$last_name', '$name', '$date_of_employment', '$priority', '$level_access', '$department', '$post', '$project', '$e_mail',
	 '$date_of_beg_red', '$date_of_beg_plan', '$date_of_end_red',  '$date_of_beg_vac', '$date_of_end_vac');";
$result = $conn->query($quer);
echo "<p>Новая запись вставлена в базу!</p>";
?>
<a href="http://wwind/userForm.html">Добавить пользователя</a>
<a href="http://wwind/admin_bd.php">Вернуться</a>
</body>
</html>