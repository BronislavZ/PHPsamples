<?php 
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
	$email = htmlspecialchars($_POST['email']);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	
	$query = $connection->prepare("SELECT username FROM usersnew WHERE username=:username");
	$params = array('username' => $name );
	$query->execute($params);
	$exists_name = $query->fetchALL();

	$query = $connection->prepare("SELECT username FROM usersnew WHERE email=:email");
	$params = array('email' => $email );
	$query->execute($params);
	$exists_email = $query->fetchALL();

	if (!empty($exists_name)) {
		$msg = 'Такой пользователь уже существует';
	}elseif (strlen($name)<3) {
		$msg = 'Имя слишком короткое';
	}elseif (strlen($password)<8) {
		$msg = 'Пароль должен содержать минимум 8 символов';
	}elseif (!empty($exists_email)) {
		$msg = 'Пользователь с таким email-ом уже существует';
	}elseif ($password!==$password2) {
		$msg = 'Пароли не совпадают';
	}else{
		
		$hash = password_hash($password, PASSWORD_DEFAULT);

		$query = $connection->prepare("INSERT INTO `usersnew` SET username=:name, email=:email, password=:password ");
		$params = array('name'=> $name, 'email' => $email , 'password'=> $hash);
		$query -> execute($params);

		$msg = 'Вы успешно зарегистрированы';
        $name=false;
        $email=false;
	}
}else{
	$msg = 'Пожалуста заполните все поля для регистрации';
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<meta charset="utf-8">
</head>
<body>

	<form method="POST" action="">
		<?php echo "$msg" . '<br>'; ?>
		<input type="text" placeholder="Ваш логин" name="name" value="<?=$name?>">
		<input type="email" placeholder="Ваш email" name="email" value="<?=$email?>">
		<input type="password" placeholder="Ваш пароль" name="password" >
		<input type="password" placeholder="Повторите ваш пароль" name="password2" >
		<br>
		<hr>
		<input type="submit" value="Отправить">
	</form>
	<br>
	<a href="authorization.php">Страничка авторизации</a>

</body>
</html>