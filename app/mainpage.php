<?php
include 'app/dbconnect.php';

$sql = "SELECT user_id, name, last_name FROM staff";
//var_dump($conn);
$result = $conn->query($sql);
if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

//список месяцев с названиями для замены
$_monthsList = array("","январь", "февраль",
"март", "апрель", "май", "июнь",
"июль", "август", "сентябрь",
"октябрь", "ноябрь", "декабрь");

//период отпуска
$PeriodSql = "SELECT * FROM vacation WHERE period = 'лето'";
$PeriodResult = $conn->query($PeriodSql)

?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Отпуск</title>
    <!-- 1. Подключаем скомпилированный и минимизированный файл CSS Bootstrap 3 -->
    <link href="/app/css/bootstrap.min.css" rel="stylesheet">
	<link href="/app/css/bootstrap1.css" rel="stylesheet">
	<link rel="stylesheet" href="/app/css/style.css" type="text/css">
  </head>
  <body>
      <table class="table table-bordered table-striped table-condensed">
	  <caption class="bg-warning">
    Период: <?php
    while ($row = $PeriodResult->fetch_assoc()) {
        echo $row['period']."<br>";
    }
    ?>
  </caption>
    <thead>
        <tr class="bg-info">
            <th rowspan="2" class = "staff">Сотрудники</th>

<?php //-----------------------------------------------------------------------------------------------

date_default_timezone_set("Europe/Kiev");

$sqlFDate = "SELECT date_of_beg_period FROM vacation WHERE period = 'лето'";
//var_dump($conn);
$resultFDate = $conn->query($sqlFDate);
if (!$resultFDate) {
    trigger_error('Invalid query: ' . $conn->error);
}
while ($row = $resultFDate->fetch_assoc()) {
    $firstDate = $row['date_of_beg_period']."<br>";
}

//проверяем период отпуска
$sqlLDate = "SELECT date_of_end_period FROM vacation WHERE period = 'лето'";
//var_dump($conn);
$resultLDate = $conn->query($sqlLDate);
if (!$resultLDate) {
    trigger_error('Invalid query: ' . $conn->error);
}
while ($row = $resultLDate->fetch_assoc()) {
    $lastDate = $row['date_of_end_period']."<br>";
}
//вырезаем неясные символы из строки
$firstDate = substr($firstDate, 0, -4);
//echo $firstDate;
$lastDate = substr($lastDate, 0, -4);
//var_dump($lastDate);
$day_in_month1 = (int)(date('m', strtotime($firstDate)));
$day_in_month2 = (int)(date('m', strtotime($lastDate)));
//echo $day_in_month1;
//echo $day_in_month2;

$rangeOfPeriod = ($day_in_month2 - $day_in_month1) + 1;
//echo $lastDate, PHP_EOL;
//$day_in_month = date("t", strtotime($lastDate));
//echo $lastDate, PHP_EOL;

//echo $weeks_count;

// В этой части кода расчитываеться ширина колонки месяца,
$cutFDate = date("Y-m", strtotime($firstDate));

$cutFDateDay = date("d", strtotime($firstDate));
//echo $cutFDate;
$cutLDate = date("Y-m", strtotime($lastDate));
$cutLDateDay = date("d", strtotime($lastDate));
//$currDate = substr($currDate, 0, -1);
//echo $cutFDate;
$delArr = array();
$monthArr = array();
for ($i=$day_in_month1; $i <= $day_in_month2; $i++) {

  $timeStr = substr($cutFDate, 0, -1).$i;
  //echo $timeStr, PHP_EOL;
  if ($timeStr == $cutFDate) {
    $day_in_month = date("t", strtotime($timeStr));
    $day_in_month = $day_in_month - $cutFDateDay;
  }else {
    $day_in_month = date("t", strtotime($timeStr));
  }
  //echo $day_in_month, PHP_EOL;
  // если остаток от целочисленного деления месяца на недели
  // больше чем 2, то ширина колонки +1
  // по сути месяц забирает себе еще 1 колонку если
  // у него на неделе больше дней
  $delimiter = ($day_in_month % 7);

  $j = 0;
  $delArr[] = $delimiter;
  $monthArr[] = $i;
  //echo $delimiter;
  /*$sCounter = 1;
  if ($delimiter >= 3 && $sCounter = 1) {
    $weeks_count = (int)($day_in_month / 7 + 1);
  }else if ($delimiter >=3 && $sCounter > 1) {
    $weeks_count = (int)($day_in_month / 7 - 1);
    $sCounter = 1;
  }else {
    $weeks_count = (int)($day_in_month / 7);
  }
  $sCounter++;*/
}
$anotherCounter = count($delArr);
//var_dump($anotherCounter);
/*for ($i=0; $i < $anotherCounter; $i++) {
  $res = 0;
  if ($anotherCounter - 1 < $i) {
    $res = ($delArr[$i] / $delArr[$i + 1]);
  }
  //echo $delArr[$i];
  //var_dump($res);
  if ($res > 0){
    $weeks_count = (int)($day_in_month / 7 + 1);
  }else {
    $weeks_count = (int) ($day_in_month / 7);
  }
  echo "<th colspan=".$weeks_count." class = \"mounth\">".$_monthsList[$i]."</th>";
}*/

  //print_r($delArr);




//----------------------------------------------------------------------------------------
?>
        </tr>
		<tr class="bg-info">
            <?php
            // В этой части кода месяцы деляться на периоды(недели)
                        //var_dump($firstDate);
            $rStart = new datetime($firstDate);
            $rStop = new datetime($lastDate);

            //echo $rStart->format('Y-m-d');
            $counter = 0;
            //for (;$rStart<$rStop; ) {
            //var_dump($rStart);
            for (;$rStart<$rStop; ) {
                    echo "<th class = \"date\">",$rStart->format('Y-m-d'),PHP_EOL;
                    $rStart->modify('+1 week');
                    echo " - ",$rStart->format('Y-m-d'),PHP_EOL,"</th>";
                    $counter++;
                    }
//----------------------------------------------------------------------
            ?>
            <th>count</th >
        </tr>
    </thead>
    <tbody>
    	<?php
      $idCounter = 1;
      if ($result->num_rows > 0) {
    			// output data of each row
    		while($row = $result->fetch_assoc()) {
        		//echo "id: " . $row["user_id"]. " - Name: " . $row["name"]. " " . $row["last_name"]. "<br>";
    			echo "<tr><td class=\"bg-info\">".$row["name"]." ".$row["last_name"]."</td>";

          ?>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
          <?php
          // цикл добавляет пустые колонки недель
          for ($i = 1; $i <= $counter; $i++) {
            //каждой кнопке добавляеться индекс, это можно обыграть
            echo "
                  <td>
                    <div class=\"checkbox\">
                      <label><input onclick=\"return OptionsSelected(this)\" type=\"checkbox\" name=\"checkbox[]\" id=".$idCounter." /></label>
                    </div>
                  </td>";
            $sqlquery = "INSERT INTO checkbox_status(checkboxID)
            SELECT checkboxID
            FROM checkbox_status
            WHERE NOT EXISTS(
              SELECT checkboxID FROM checkbox_status WHERE checkboxID = '$idCounter'
              )
            ";
            //var_dump($sqlquery);
              $chkbxStat = $conn->query($sqlquery);
              if (!$chkbxStat) {
                  trigger_error('Invalid query: ' . $conn->error);
            }
            $idCounter++;


          }
          echo "
          <td></td>
          </tr>
    			";
    		}
			} else {
    			echo "0 results";
			}
		?>
        </tr>
		<tr class="bg-warning">
            <td class="bg-info">Количество</td>
            <?php
            for ($i = 0; $i <= $counter; $i++) {
              echo "<td></td>";
            }
            ?>
        </tr>
    </tbody>
</table>


<!--тут начинаються скрипты-->

<script type="text/javascript">
//check next
window.disableFunc = function(id) {
  var inputs = document.getElementsByTagName('input');
  inputs[id].disabled = true;
}

function OptionsSelected(me)
{
    /*//var inputs = document.getElementsByTagName('input');
    console.log(me.id);
    var next = (+me.id + 1);
    //console.log(next);
    var elem = document.getElementById(next);
    console.log(elem);
    elem.setAttribute('checked', 'checked'); //check*/
    var inputs = document.getElementsByTagName('input');
    console.log(me.id)
    //console.log(inputs);
for(var i = 0; i<inputs.length; i++){
  if(typeof inputs[i].getAttribute === 'function' && inputs[i].id === me.id){
    if (inputs[i+1].checked == false) {
      inputs[i+1].checked = true;
      inputs[i+1].disabled= true;
    }else {
      inputs[i+1].checked = false;
      inputs[i+1].disabled= false;
    }
    break;
  }
}

}
</script>

<?php //insert to the table
/*if(isset($_POST['subject'])){

$sqlquery = "INSERT INTO 'checkbox_status' VALUES('$id','$subject')";
  $result = $conn->query($sqlquery);
  if (!$result) {
      trigger_error('Invalid query: ' . $conn->error);
  }
$tbl_name="test"; // Table name
foreach($_POST['subject'] as $index => $val){
echo "subject[".$index."]=".$val;
}
mysql_close();

}*/
?>

</body>
</html>
