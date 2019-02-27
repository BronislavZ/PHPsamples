    <?php
//открываем файл, читаем строку, разбиваем строку, 
$handle = fopen("counter.txt", "r");
while (!feof($handle)) {
    $buffer = fgets($handle, 4096);
	list($list1, $category, $price) = explode("	", $buffer);



 //    $buffer = fgets($handle, 4096);
	// $list1 = $buffer;
	// $category = 64; 
	// $price = 14;






	// массив для переменных, которые будут переданы с запросом
	$paramsArray = array(
	    'save' => 'Save', 
	    'list1' => $list1,
	    'category' => $category, 
	    'seller' => '1', 
	    'sellerprc' => '1',
	    'norefund' => '1',
	    'price' => $price
	); 
	 // преобразуем массив в URL-кодированную строку
	$vars = http_build_query($paramsArray);
	// создаем параметры контекста
	$options = array(
	    'http' => array(  
	                'method'  => "POST",  // метод передачи данных
	                'header'  => "Accept-language: ru\r\n" .
	              				 "Cookie: PHPSESSID=vs9a6f2frrit\ \r\n".
	              				 "Content-type: application/x-www-form-urlencoded",
	              					  // заголовок 
	                'content' => $vars,  // переменные
	            )  
	);  
	$context  = stream_context_create($options);  // создаём контекст потока
	$result = file_get_contents('http://(sitename).php?act=add', false, $context); //отправляем запрос
}
fclose($handle);
echo 'finish';
?>