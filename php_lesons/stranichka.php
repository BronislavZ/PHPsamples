<!DOCTYPE html>
<html>
<head>
	<title>all abou averything</title>
	<meta charset="utf-8">
</head>
<body>
Today <?php echo date('D  d.m.Y   H:i:s'); ?><br>






<form method="POST" action="/avtorizacia.php">
	<input type="text" placeholder="Ваш логин" name="login">
	<input type="text" placeholder="Ваш пароль" name="password">
	<hr>
	<input type="submit" value="Отправить">

</form>

</body>
</html>