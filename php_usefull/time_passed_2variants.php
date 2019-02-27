<!DOCTYPE html>
<html>
<head>
	<title>all abou averything</title>
	<meta charset="utf-8">
</head>
<body>
Today <?php echo date('D  d.m.Y   H:i:s'); ?><br>

<?php

$date_from_db = '2016-07-09 02:27:10';
$startdate_form = strtotime($date_from_db);
$difference = time() - $startdate_form;

echo 'Это пример даты как в базе данных ' . $date_from_db . '<br/>';
echo 'Время в секундах от создания епохи UNIX и до нашей выбранной даты = ' . $startdate_form . '<br/>';
echo 'Время в секундах от выбранной даты до теперешнего момента = ' . $difference . '<br/>';





echo '<hr>';
echo '<h2>Вариант 1</h2>';
echo 'Между ' . date('d.m.Y   H:i:s', $startdate_form) . ' и ' . date('d.m.Y   H:i:s') . ' прошло:<br/>';

$years_passed = floor($difference/31536000);
$days_passed = ((floor($difference/86400))%365);
$hours_passed = ((floor($difference/3600))%24);
$minutes_passed = ((floor($difference/60))%60);
$seconds_passed = $difference%60;

$years_array = array('год','года','лет');
$days_array = array('день','дня','дней');
$hours_array = array('час','часа','часов');
$minutes_array = array('минута','минуты','минут');
$seconds_array = array('секунда','секунды','секунд');

function time_units($a,$array_names)
{
	$g = ($a%100);
	$g = ($a%10);
	if ($a >5 && $a <20) {
		$name = '2';
	}elseif ($g == 1) {
		$name = '0';
	} elseif ($g>1 && $g<5) {
	    $name = '1';
	} else {
	    $name = '2';
	}    
	return  $array_names[$name];
}

echo ' ' . $years_passed .time_units($years_passed,$years_array);
echo ' ' . $days_passed .time_units($days_passed,$days_array);
echo ' ' . $hours_passed .time_units($hours_passed,$hours_array);
echo ' ' . $minutes_passed .time_units($minutes_passed,$minutes_array);
echo ' ' . $seconds_passed .time_units($seconds_passed,$seconds_array);





echo '<hr>';
echo '<h2>Вариант 1(English)</h2>';
echo 'Between ' . date('d.m.Y   H:i:s', $startdate_form) . ' and ' . date('d.m.Y   H:i:s') . ' passed:<br/>';

$years_passed1 = floor($difference/31536000);
$days_passed1 = ((floor($difference/86400))%365);
$hours_passed1 = ((floor($difference/3600))%24);
$minutes_passed1 = ((floor($difference/60))%60);
$seconds_passed1 = $difference%60;

$years_array1 = array('year','years');
$days_array1 = array('day','days',);
$hours_array1 = array('hour','hours',);
$minutes_array1 = array('minute','minutes');
$seconds_array1 = array('second','seconds');

function time_units1($a,$array_names)
{
	if ($a == 1) {
		$name = '0';
	} else {
	    $name = '1';
	}    
	return  $array_names[$name];
}

echo ' ' . $years_passed1 .time_units1($years_passed1,$years_array1);
echo ' ' . $days_passed1 .time_units1($days_passed1,$days_array1);
echo ' ' . $hours_passed1 .time_units1($hours_passed1,$hours_array1);
echo ' ' . $minutes_passed1 .time_units1($minutes_passed1,$minutes_array1);
echo ' ' . $seconds_passed1 .time_units1($seconds_passed1,$seconds_array1);






echo '<hr>';
echo '<h2>Вариант 2</h2>';
echo 'Между ' . date('d.m.Y   H:i:s', $startdate_form) . ' и ' . date('d.m.Y   H:i:s') . ' прошло:<br/>';

if($difference>31536000)
	echo 'больше года';
elseif($difference>2592000)
	echo 'больше месяца';
elseif($difference>86400)
	echo 'больше одного дня';
elseif($difference>3600)
	echo 'больше часа';
elseif($difference>60)
	echo 'несколько минут';
else
	echo 'не больше минуты';





echo '<hr>';
echo '<h2>Вариант 2(English)</h2>';
echo 'Between ' . date('d.m.Y   H:i:s', $startdate_form) . ' and ' . date('d.m.Y   H:i:s') . ' passed:<br/>';

if($difference>31536000)
	echo 'more than one year';
elseif($difference>2592000)
	echo 'more than one month';
elseif($difference>86400)
	echo 'more than one day';
elseif($difference>3600)
	echo 'more than one hour';
elseif($difference>60)
	echo 'more than one minute';
else
	echo 'one moment';



?>


</body>
</html>