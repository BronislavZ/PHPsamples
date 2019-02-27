<?php 
$connection = new PDO('mysql:host=localhost; dbname=test_blog', 'root','');

if($connection== false)
{
	echo 'Failed to connect to the database';
	echo mysqli_connect_error();
	exit();
}
$connection->exec("SET NAMES UTF8");
?>

<!DOCTYPE html>
<html>
<head>
	<title>all abou averything</title>
	<meta charset="utf-8">
</head>
<body>
Today <?php echo date('D  d.m.Y   H:i:s'); ?><br>


<?php

	if(count($_POST)  > 0)
	{

		//trim();
		// strip_tags();
		//htmlspecialchars();		

		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$text = $_POST['text'];
		$name = htmlspecialchars($name);
		$email = htmlspecialchars($email);
		$text = htmlspecialchars($text);
		
		

		if (strlen($name)<2) {
			$msg = 'Lenght of name not real';
		}elseif (strlen($email)<7) {
			$msg = 'Lenght of email short';
		}elseif (strlen($text)<10) {
			$msg = 'Put your comment';	
		}else{

			$query = $connection->prepare("INSERT INTO `coments` SET author=:name, email=:email, text=:text ");
			$params = array('name'=> $name, 'email' => $email , 'text'=> $text);
			$query -> execute($params);


			$msg = 'your comment added';
            $name=false;
			$email = false;
			$text = false;

		}

	}else{
		$msg = 'put info inside field';
	}

			$query = $connection->prepare("SELECT * FROM `coments` ORDER BY `pubdate` DESC" );
			$query->execute();
			$comments= $query->fetchAll();



?>







<form method="POST" action="">
		<?php echo "$msg" . '<br>'; ?>
	<input type="text" placeholder="Ваш логин" name="name" value="<?=$name?>">
	<input type="text" placeholder="Ваш email" name="email"  value="<?=$email?>">
	<br>
	<textarea name="text" required=""  placeholder="Your comment ..."><?=$text?></textarea>
	<hr>
	<input type="submit" value="Отправить">

</form>




<div class="comments">
	<?foreach ($comments as  $comment) :?>
		<div class="item">
			 <span><?=$comment['author']?></span><br>
			 <strong><?=$comment['email']?></strong><br>
			 <div><?=$comment['text']?></div>
			 <br>
	 	</div>
	<?endforeach?>
</div>

</body>
</html>




