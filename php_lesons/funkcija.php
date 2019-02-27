<?php

// abs, round, ceil, floor, min, max.


//========================================================
function myfunction()
{
	echo 'hello world' . '<br/>';
}

myfunction();
myfunction();

//========================================================
function get_bigger($a,$b)
{
	if( $a > $b )
		echo $a . '<br/>';
	
	else
		echo $b . '<br/>';
}


get_bigger(10,20);
echo '=============================================<br>';
echo 'without return<br>';
$bigger1 = get_bigger(120,6);
echo "$bigger1 get_bigger(120,6)<br>";
echo '$bigger1 get_bigger(120,6)<br>';

echo '=============================================<br>';
function get_bigger2($a,$b)
{
	if( $a > $b )
	{
		echo $a . '<br/>';
		return $a;
	}
	else
	{
		echo $b . '<br/>';
		return $b;

	}
}

$bigger2 = get_bigger2(120,6);

echo $bigger2;
echo $bigger2;
echo $bigger2;