<?php

$start = 1; // от какого номера айди начинать парсинг
$start2 = 10000; // до какого номера айди продолжать парсинг

// Создаем поток
$options = array(
  'http'=>array(
    'method'=>"POST",
    'header'=>"Accept-language: ru\r\n" .
              "Cookie: name=  \r\n"     // здесь нужго указать куку
  )
);
$context = stream_context_create($options); 



$fp = fopen('counter1.txt', 'a+');

for ($i=$start; $i <$start2 ; $i++) { 

$link_for_parse = "http://name/ddd?id=$i";	// здесь подставить ссылку

$text = file_get_contents($link_for_parse, false, $context);
		// здесь подставить какие данные мы ищем
preg_match( "/<textarea name='content' style='width:100%;height:100px;'>(.*?)<\\/textarea>/is" , $text , $title );
$result = $title[1] . "---";

preg_match( "/selected value='(.*?)<\\/option>/is" , $text , $title );
$result .= $title[1] . "---";

preg_match( "/name='price' value='(.*?)'/is" , $text , $title );
$result .= $title[1] . ";\r\n";

 fwrite($fp, $result);


}

fclose($fp);
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
<!-- <?php  echo $result; ; ?> -->
</body>
</html>
