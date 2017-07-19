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
      <li class="active" ><a href="http://wwind/admin_bd.php">База данных</a></li>
      <li><a href="http://wwind/admin_period.php">Период</a></li>
  </ul>
  <ul class="nav nav-pills nav-justified">
      <li><a href="http://wwind/userAddForm.html">Добавить пользователя</a></li>
      <li><a href="http://wwind/userUpForm.html">Обновить данные пользователя</a></li>
      <li><a href="http://wwind/mail.php">Отправить оповещение сотрудникам</a></li>
      <li><form  action=""method="POST"><input type="submit" name="naz" value="Удалить пользователя (-лей)"></li>

  </ul>
    </header>

<table class="table table-bordered table-striped table-condensed">
<tr>
<th>н/п</th>
<th>Уник. код</th>
<th>ФИО</th>
<th>Дата приема на роб.</th>
<th>Прио- ритет</th>
<th>Уров. дост.</th>
<th>Отдел</th>
<th>Должность</th>
<th>Проэкт</th>
<th>E-mail</th>

<th>Дата нач. редакт.</th>
<th>Дата нач. планир.</th>
<th>Дата окон. редакт.</th>
<th>Дата нач. отпуска</th>
<th>Дата окон. отпуска</th>
<th></th>
</tr>

<?PHP
include 'dbconnect.php';

$sql = "SELECT id, Key_staff, last_name, name, date_of_employment, priority, 
level_access, department, post, project, e_mail, date_of_beg_red, date_of_beg_plan, 
date_of_end_red, date_of_beg_vac, date_of_end_vac  FROM staff";
$result = $conn->query($sql);
while ($row2 = $result->fetch_assoc()) {
for ($i=0;$i<count("id");$i++){
  $id = $row2["id"];
  $Key_staff = $row2["Key_staff"];
  $last_name = $row2["last_name"];
  $name = $row2["name"];
  $date_of_employment = $row2["date_of_employment"];
  $priority = $row2["priority"];
  $level_access = $row2["level_access"];
  $department = $row2["department"];
  $post = $row2["post"];
  $project = $row2["project"];
  $e_mail = $row2["e_mail"];
  $date_of_beg_red = $row2["date_of_beg_red"];
  $date_of_beg_plan = $row2["date_of_bag_plan"];
  $date_of_end_red = $row2["date_of_end_red"];
  $date_of_beg_vac = $row2["date_of_beg_vac"];
  $date_of_end_vac = $row2["date_of_end_vac"];


    echo "<tr><td>".$row2["id"]." </td>
              <td>".$row2["Key_staff"]." </td>
              <td>".$row2["last_name"]." ".$row2["name"]."</td>
              <td>".$row2["date_of_employment"]."</td>
              <td>".$row2["priority"]." </td>
              <td>".$row2["level_access"]."</td>
              <td>".$row2["department"]."</td>
              <td>".$row2["post"]." </td>
              <td>".$row2["project"]."</td>
              <td>".$row2["e_mail"]."</td>
              <td>".$row2["date_of_beg_red"]." </td>
              <td>".$row2["date_of_beg_plan"]."</td>
              <td>".$row2["date_of_end_red"]."</td>
              <td>".$row2["date_of_beg_vac"]."</td>
              <td>".$row2["date_of_end_vac"]."</td>
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
$res4=$conn->query("DELETE FROM staff WHERE id='$id'");
}
}
?>
</table>
  </body>
</html>