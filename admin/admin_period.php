
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>Admin</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
	<link href="../css/bootstrap.css" rel="stylesheet">
	
	</head>
	<body>
	<header>
    <ul class="nav nav-tabs nav-justified">
  <li><a href="http://wwind/admin.php">Данные из Bitrix</a></li>
  <li><a href="http://wwind/admin_bd.php">База данных</a></li>
  <li class="active" ><a href="http://wwind/admin_period.php">Период</a></li>
  </ul>
</ul>
<ul class="nav nav-pills nav-justified">
  <li><a href="http://wwind/periodAddForm.html">Добавить период</a></li>
  <li><a href="http://wwind/periodUpForm.html">Изменить период</a></li>
  <li><form  action='' method='POST'><input type='submit' name='naz' value='Удалить период (-ды)'></li>

</ul>
		</header>

<table class="table table-bordered table-striped table-condensed">
<tr>
<th>н/п</th>
<th>Период</th>
<th>Дата начала периода</th>
<th>Дата окончания периода</th>
<th></th>
</tr>

<?PHP
include 'dbconnect.php';

$sql = "SELECT id, period, date_of_beg_period, date_of_end_period FROM vacation";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
for ($i=0;$i<count('id');$i++){
  $id = $row["id"];
  $period = $row["period"];
    $date_of_beg_period = $row["date_of_beg_period"];
    $date_of_end_period = $row["date_of_end_period"];


    echo "<tr><td>".$row["id"]." </td>
               <td>".$row["period"]." </td>
              <td>".$row["date_of_beg_period"]."</td>
              <td>".$row["date_of_end_period"]."</td>
              <td>
              <input type='checkbox' name='check[]' id='check[]' value='{$id}'>
              </td></tr>";

}
}?>


</form>";
<?php
$naz=$_POST['naz'];
$check=$_POST['check'];
if (isset($naz)){
foreach ($check as $id) {
$res4=$conn->query("DELETE FROM vacation WHERE id='$id'");

}
}
?>
</table>
  </body>
</html>