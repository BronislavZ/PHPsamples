<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<meta charset="utf-8">
</head>
<body>




<?php
// $_GET
// $_POST

//print_r($_POST);


$text = file_get_contents('text.txt');

?>


Шапка сайта
<hr>

<?php

echo "<pre>";

echo nl2br($text);

echo "</pre>";
?>




<hr>
подвал сайта 







</body>
</html>


