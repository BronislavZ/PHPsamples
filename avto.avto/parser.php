<?php

$fp = fopen('counter.txt', 'a+');



$start = 80793; // от какого номера айди начинать 
$fin_page = 100000; // до какого номера айди продолжать 



for ($i=$start; $i <$fin_page ; $i++) { 

$c = curl_init("http://kapot.fdparts.ru/shop/UID_$i.html");
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
$content = curl_exec($c);


	preg_match( '/<img itemprop="image" src="(.*?)" border="1" /is' , $content , $title );
	$img_url = $title[1];

	preg_match( '/<h1 itemprop="name">(.*?)<\\/h1>/is' , $content , $title );
	$name = $title[1];

	preg_match( '/class="cena">(.*?)<\\/span>/is' , $content , $title );
	$price = $title[1];



	$content2 = iconv("windows-1251","utf-8", $content);


	preg_match( '/Оригинальный номер\\(а\\): <span class="strong nomer">(.*?)<\\/span>/is' , $content2 , $title );
	$orig_num = $title[1];
	$orig_num = iconv("utf-8","windows-1251", $orig_num);
	$orig_num =  str_replace('<br>',', ',$orig_num);

	preg_match( '/Артикул: (.*?)<\\/span>/is' , $content2 , $title );
	$article = $title[1];
	$article = iconv("utf-8","windows-1251", $article);

	preg_match( '/Модель автомобиля: <span class="strong">(.*?)<\\/span>/is' , $content2 , $title );
	$mod = $title[1];
	$mod = iconv("utf-8","windows-1251", $mod);

	preg_match( '/Место уставновки: <span class="strong">(.*?)<\\/span>/is' , $content2 , $title );
	$place_instal = $title[1];
	$place_instal = iconv("utf-8","windows-1251", $place_instal);

	preg_match( '/Год выпуска автомобиля: <span class="strong nomer">(.*?)<\\/span>/is' , $content2 , $title );
	$year_prodused = $title[1];
	$year_prodused = iconv("utf-8","windows-1251", $year_prodused);

	$result = $article.'	'.$name.'	'.$orig_num.'	'.$mod.'	'.$place_instal.'	'.$year_prodused.'	'.$price. "\r\n";
	$result = iconv("windows-1251","utf-8", $result);

	fwrite($fp, $result);
	if (!empty($img_url)) {
		$img_of_article = file_get_contents($img_url);
		file_put_contents("avtofoto/$article.jpg", $img_of_article);
	}


}

fclose($fp);
echo "Finish";

?>