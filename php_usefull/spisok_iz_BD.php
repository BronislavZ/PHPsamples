<!DOCTYPE html>
<html>
<head>
	<title>all abou averything</title>
	<meta charset="utf-8">
</head>
<body>
Today <?php echo date('D  d.m.Y   H:i:s'); ?><br>

<?php



// $connection = mysqli_connect(сервер, имя пользователя, пароль, название базы данных)
$connection = mysqli_connect('localhost', 'root','','test_db' );
if($connection== false)
{
	echo 'Неудалось подключится к базе данных';
	echo mysqli_connect_error();
	exit();
}



// $result = mysqli_query($connection, "zapros"); переменная нужна чтобы потом понять удочно ли был исполнен запрос

$result = mysqli_query($connection, "SELECT * FROM `articles_categorie`");

echo 'записей найдено:' . mysqli_num_rows($result);

//$row = mysqli_fetch_assoc($result);
//print_r($row); 
// выдаст первый результат  с масива 

/*while( ($record = mysqli_fetch_assoc($result)) )
{
	print_r ($record);
	echo '<hr>';
}

// выдаст все строки в виде Array ( [id] => 1 [title] => Кулинария )
*/
?>



<ul>
	<?php
	/*
		while(  ($cat = mysqli_fetch_assoc($result))   )
		{
			$numcategories = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` =  " . $cat['id']);
			echo '<li>' . $cat['title'] .' (' . mysqli_num_rows($numcategories) .  ')</li>';
		}  
		*/

		while(  ($cat = mysqli_fetch_assoc($result))   )
		{
$numcategories = mysqli_query($connection, "SELECT COUNT('id') AS `total_count` FROM  `articles` WHERE `categorie_id` =  " . $cat['id']);
$num_categories_record = mysqli_fetch_assoc($numcategories);
			echo '<li>' . $cat['title'] .' (' . $num_categories_record[total_count] .  ')</li>';
		}  
	?>
</ul>








<?php
mysqli_close($connection);
?>


</body>
</html>