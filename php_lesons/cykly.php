<!DOCTYPE html>
<html>
<head>
	<title>Цыклы</title>
	<meta charset="utf-8">
</head>
<body>

<?php

//for
//while
//foreach
//do

echo '--------------------------------------------<br>';
for ($a=0; $a < 10 ; $a++)
	{ 
	if ( $a%2 == 1 )
		echo "$a нечетное <br>";
	else
		echo "$a четное <br>";
	}

echo '--------------------------------------------<br>';
$test = 10;
while ( $test <= 20 )
{
	echo 'test-' . $test . '<br/>';
	$test++;
}

echo '--------------------------------------------<br>';
$names = array('John','Din','Walker','Vovan');
foreach ($names as $value)
{
	echo $value . '<br/>';
}



echo '--------------------------------------------<br>';
$numbers = array(5,10,15,25,50);

foreach ($numbers as $number) 
{
	echo 'Kуб числа' . $number . '=' . ($number * $number) . '<br/>';
}


?>

</body>
</html>