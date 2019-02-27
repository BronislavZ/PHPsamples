<?php 
session_start();
$connection = new PDO('mysql:host=localhost; dbname=test_blog', 'root','');

if($connection== false)
{
	echo 'Failed to connect to the database';
	echo mysqli_connect_error();
	exit();
}
$connection->exec("SET NAMES UTF8");



if(count($_POST)  > 0)
{
	$name = trim(htmlspecialchars($_POST['name']));
	$password = $_POST['password'];

	$query = $connection->prepare("SELECT * FROM usersnew WHERE username=:username");
	$params = array('username'=> $name);
	$query -> execute($params);
	$user_info = $query->fetchALL();

	
	if ($_SESSION['secpic']!==strtolower($_POST['secpic'])) {
		$msg = 'Код с защитной картинки введен не верно';
	}elseif(strlen($name)<3) {
		$msg = 'Имя слишком короткое';
	}elseif (strlen($password)<8) {
		$msg = 'Пароль должен содержать минимум 8 символов';
	}elseif (password_verify ($password , $user_info['0']['password'] )) {
		session_start();
		$_SESSION['username'] = $name;
		header('Location: index.php');
		exit;
	}else{
		$msg = 'Такого пользователя не существует или не верный пароль';
	}
}else{
	$msg = 'Пожалуста авторизуйтесь';
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<meta charset="utf-8">
</head>
<body>

	<form method="POST" action="">
		<?php echo "$msg" . '<br>'; ?>
		<input type="text" placeholder="Ваш логин" name="name" value="<?=$name?>">
		<input type="password" placeholder="Ваш пароль" name="password" ">
		<br>
		<img src="captcha/secpic.php" alt="защитный код" />
			<input type="text" placeholder="Введите символы с картинки" name="secpic">
			<br>
		<hr>
		<input type="submit" value="Отправить">

	</form>

	<p>Если вы еще не зарегистрированы <a href="registration.php">ЗАРЕГИСТРИРУЙТЕСЬ!!!</a></p>

</body>
</html>