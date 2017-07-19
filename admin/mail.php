<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
<title>Обратная связь</title>
</head>
<body>
<?php
include 'dbconnect.php';
$sql = "SELECT last_name, name, e_mail, date_of_beg_red, message FROM staff";
$result = $conn->query($sql);
while ($row2 = $result->fetch_assoc()) {
for ($i=0;$i<count("id");$i++){
$last_name = $row2["last_name"];
$name = $row2["name"];
$e_mail = $row2["e_mail"];
$date_of_beg_red = $row2["date_of_beg_red"];
$mess = $row2["message"];


$to = "stesha379@gmail.com"; /*УКАЗАТЬ СВОЙ АДРЕС*/
$headers = "Content-type: text/plain; charset = utf-8\r\nFrom:$email";
$subject = "Сообщение с вашего сайта";
$message = "Имя пославшего: $last_name $name \nЭлектронный адрес: $e_mail \nСообщение: Планирование отпуска начнется с $date_of_beg_red \nСсылка: http://wwind/admin_bd.php";
$send = mail ($to, $subject, $message, $headers);
}}
if ($send)
{
echo "<b>Оповещения сотрудникам отправлено!<p>";
echo "<a href=http://wwind/admin_bd.php>Нажмите,</a> чтобы вернуться на главную страницу";
}
else
{
echo "<p><b>Ошибка. Сообщение не отправлено!";
}

?>
</body>
</html>