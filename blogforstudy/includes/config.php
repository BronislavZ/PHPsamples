<?php

$config  = array(
				'title' => 'Web Developer Blog - My Experience', 
				'vk_url' => 'http://vk.com/', 
				'db'	=>	 array(	'server' => 'localhost', 
									'username' => 'root', 
									'password' => '', 
									'name' => 'test_blog' )
				);




$connection = mysqli_connect(
								$config['db']['server'],
								$config['db']['username'],
								$config['db']['password'],
								$config['db']['name'] 
							);
if($connection== false)
{
	echo 'Failed to connect to the database';
	echo mysqli_connect_error();
	exit();
}
?>