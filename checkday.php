<?php
include "MyCalendar.php";

$nday = $_POST["nday"];
$nmonth = $_POST["nmonth"];

$c1 = new MyCalendar();

echo "Day Name is ".$c1->checkDayNameOfDate($nday,$nmonth);

?>