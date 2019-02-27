<?php



// $connection = mysqli_connect(сервер, имя пользователя, пароль, название базы данных)
$connection = mysqli_connect(localhost, root,NULL,test_db );
if($connection== false)
{
	echo 'Неудалось подключится к базе данных';
	echo mysqli_connect_error();
	exit();
}

echo 'everything allright';