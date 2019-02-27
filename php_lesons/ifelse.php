<?php 


$wether = 'снег'; //снег, дождь, облачно, ясно

if ( $wether=='снег') 
	echo 'snow';
elseif ( $wether=='дождь' ) 
	echo 'rain';
elseif ( $wether=='облачно' )
	echo 'cloudly';
else
	echo 'the best weather';
echo '<br>';
$yetonevariable = 1;

if ($wether=='снег' and $yetonevariable == 1 ){
	echo 'it is bad'; 
}
echo '<br>';

if ($wether=='снег' or $wether=='дождь' ){
	echo 'it is bad'; 
}



?>