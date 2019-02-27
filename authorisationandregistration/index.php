<?php 

session_start();

if($_GET['action'] == "out"){
	unset($_SESSION['username']);
}

if (!isset($_SESSION['username'])) {
	header('Location: authorization.php');
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<meta charset="utf-8">
</head>
<body>

	<h2>Здравствуй дорогой <?=$_SESSION['username']?></h2>

	<a  href='index.php?action=out'>Выйти</a>

</body>
</html>