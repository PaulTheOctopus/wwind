<?php
$rStart = new datetime('2017-01-01 00:00:00');
$rStop = new datetime('2017-06-11 00:00:00');
for (;$rStart<$rStop; $rStart->modify('+1 week')) {
        echo $rStart->format('Y-m-d'),PHP_EOL;
        }
?>
