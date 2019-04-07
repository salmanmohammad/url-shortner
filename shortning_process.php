<?php
require('config.php');
//Generate random string to shorten the url
function randomString($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
	return $randomString; 
}  

generate_shorten_url($_POST['url']);

//Generate short url for long version
function generate_shorten_url($url)
{
	global $conn;
	$shorten_url = randomString(5);
	if(mysqli_query($conn, "insert into shortened_url (long_url, short_url, created) values('".$url."','".$shorten_url."', NOW() )"))
	{
		$short_url =  $_SERVER['HTTP_HOST'].'/url-shortner/index.php/'.$shorten_url;
		echo json_encode(array('short_url'=> $short_url));
	}
	
}
?>