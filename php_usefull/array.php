<?php
echo "1=================================================================================================== <br>";

$arr = array(1,2,3,4);
$arr[114]='wow';
var_dump($arr);



echo "2=================================================================================================== <br>";


$arr2 = array(1,2,3,4);
$arr2[] = 'hey';
echo '<pre>';
print_r($arr2);
echo '</pre>';

echo "3=================================================================================================== <br>";



$arr3=  array('Moskov','Kiev','London','Warshava');

echo $arr3[0];
echo $arr3[1];
echo $arr3[2];
echo $arr3[3];

echo '<br>';

for ($i=0; $i < count($arr3) ; $i++)        
{ 
	echo $arr3[$i] . '<br>';
}



echo "4=================================================================================================== <br>";
$arr4 =  [
			'Russia'=>			'Moskov',
			'Ukraine'=>			'Kiev',
			'England'=>			'London',
			'Polish'=>			'Warshava'];


foreach ($arr4 as $country => $capital) {
	echo "$country - $capital<br>";
}

echo '<br>';
foreach ($arr4 as $capital) {
	echo " $capital<br>";
}

echo "4=================================================================================================== <br>";

$arr4 =  [
			'Russia'=>			['Moskov','Peterburg','Vladivastok'],
			'Ukraine'=>			['Kiev','Harkov'],
			'England'=>			['London','else city','else city','else city'],
			'Polish'=>			['Warshava','else city','else city']
		];


   echo "<ul>";
foreach ($arr4 as $capital1 => $all_sities) 
{
			echo 	'<li>';
  					echo "$capital1";
			   		echo "<ol>";
					foreach ($all_sities as  $sities) 
					{
													echo 	'<li>';
										  			echo "$sities";
													echo 	'</li>';
					}
			  		 echo "</ol>";
			echo 	'</li>';
}
   echo "</ul>";

?>

<ul>
	<?foreach ($arr4 as $capital1 => $all_sities):?>
			<li>
				<?=$capital1?>
		   		<ol>
					<?foreach ($all_sities as  $sities):?>
						<li><a href=""><?=$sities?></a></li>
					<?endforeach;?>
		  		</ol>
			</li>
	<? endforeach;?>
</ul>



