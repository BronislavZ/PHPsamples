<?php

// $_GET
// $_POST

//print_r($_POST);

include('/includes/db.php');

$login = $_POST[login];
$password = $_POST[password];

$count = mysqli_query($connection, "SELECT * FROM `users` WHERE `login`=	'$login' AND `password`= '$password' ");
if(  (mysqli_num_rows($count)) == 0)
	echo 'введены неправильные данные';
else
	echo "Добро пожаловать, $login!";