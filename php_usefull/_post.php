<!DOCTYPE html>
<html>
<head>
	<title>faffwf</title>
	<meta charset="utf-8">
</head>
<body>






<?php

	if(count($_POST)  > 0)
	{
		$name = trim($_POST['name']);
		$phone = trim($_POST['phone']);
		$reqest_time = date("Y-m-d H:i:s");
		if (strlen($name)<2) {
			$msg = 'Lenght of name not real';
		}elseif (strlen($phone)<7) {
			$msg = 'Lenght of phone short';
		}elseif (!is_numeric($phone)) {
			$msg = 'Number of phone should be from numeric';
		}else{
			file_put_contents('text.txt', "$reqest_time--|-|--$name--|-|--$phone\n", FILE_APPEND);
			$msg = 'your requst send';
			$name = 'your name';
			$phone = 'your phone';
		}

	}else{
		$name = 'your name';
		$phone = 'your phone';
		$msg = 'put info inside field';
	}

?>


<form method="POST" >
	<input type="text" name="name" value="<?=$name?>">
	<input type="text"  name="phone" value="<?=$phone?>">
	<hr>
	<input type="submit" value="send">
</form>
<?php echo "$msg"; ?>
<hr>

<?php
$text = file_get_contents('text.txt');
echo "<pre>";
echo nl2br($text);
echo "</pre>";
?>

<hr>
<?php

$text1 = file('text.txt');
echo "<table>";
foreach ($text1 as $line) {
	echo "<tr>";
	$arr = explode('--|-|--', $line);
	foreach ($arr as $values_of_var) {
		echo "<td>$values_of_var</td>";
	}
	echo "</tr>";
}
echo "</table>";
?>
<hr>
</body>
</html>
