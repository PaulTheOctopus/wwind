
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
  <li class="active"><a href="http://wwind/admin.php">Данные из Bitrix</a></li>
  <li><a href="http://wwind/admin_bd.php">База данных</a></li>
  <li><a href="http://wwind/admin_period.php">Период</a></li>
  </ul>
</ul>
<ul class="nav nav-pills nav-justified">
  <li><a href="#">Загрузить пользователя (-лей)</a></li>
  <li><a href="#">Обновить пользователя (-лей)</a></li>
  <li><a href="#">Добавить пользователя</a></li>
  <li><a href="#">Удалить пользователя (-лей)</a></li>
</ul>
		</header>

<table class="table table-bordered table-striped table-condensed">
<tr>
<th>Уникальный код</th>
<th>ФИО</th>
<th>Приоритет</th>
<th>Уровень доступа</th>
<th>Отдел</th>
<th>Должность</th>
<th>Проэкт</th>
<th>E-mail</th>
<th>Дата начала планирования</th>
<th>Дата начала отпуска</th>
<th>Дата окончания отпуска</th>
<th></th>
</tr>
<?php
include 'dbconnect.php';
$sql = "SELECT `Key_staff`,last_name, name, `priority`, `level_access`, `department`, `post`, `project`, 
  `e_mail`, `date_of_beg_plan`, `date_of_beg_vac`, `date_of_end_vac` from staff ORDER BY `date_of_employment`";
$result = $conn->query($sql);?>
<?if ($result->num_rows > 0) {
               // output data of each row
           while($row = $result->fetch_assoc()) {
               echo "<tr><td>".$row["Key_staff"]." </td>
              <td>".$row["last_name"]." ".$row["name"]."</td>
              <td>".$row["priority"]."</td>
              <td>".$row["level_access"]."</td>
              <td>".$row["department"]."</td>
              <td>".$row["post"]."</td>
              <td>".$row["project"]."</td>
              <td>".$row["e_mail"]."</td>
              <td>".$row["date_of_beg_plan"]."</td>
              <td>".$row["date_of_beg_vac"]."</td>
              <td>".$row["date_of_end_vac"]."</td>
              <td><div class=\"checkbox\">
                     <label><input class=\"checkbox\" type=\"checkbox\" name=\"checkbox[]\" value=\"checkbox".$i."\" id=\"checkbox".$i."\" /></label>
                   </div></td></tr>";
           }
            } else {
               echo "0 results";
            }
        ?>
</table>
	</body>
</html>