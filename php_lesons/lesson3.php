<?php
error_reporting(E_ALL);
?>





<?php
$time = date('H');
$img = false;
if ( $time <= 6 )
	$img = '1.jpg';
elseif ( $time <= 12) 
	$img = '2.jpg';
elseif ( $time <= 18)
	$img = '3.jpg';
else
	$img = '4.jpg';

echo 'Now' . $time . '<br>';
echo $img . '<br>';
?>

<?php
const PI = 3.14;

function find_area($r)
{
	$area = (($r*$r)*PI);
	echo $area . '<br>';
}

find_area(3);
find_area(5);
find_area(7);
?>



<?php
$a = 5;
function print_some($a)
{	
	echo $a . '<br>';
	$a = 10;
}
echo $a . '<br>';
print_some($a);
echo $a . '<br>';
?>

<?php
echo '<br> function with return <br>';

function find_area22($r)
{
	return $r*$r*PI;
}
echo '<br>';
find_area22(3);
echo '<br>';
echo find_area22(5);
echo '<br>';
echo (find_area22(7) - find_area22(3));
echo '<br>';
echo "find_area22(7) - find_area22(3)";
echo '<br>';
?>



















