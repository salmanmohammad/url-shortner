<?php 
require('config.php');

$hit_url = $_SERVER['PHP_SELF'];
$hit_url = explode('/', $hit_url);
$shorten_string = end($hit_url);
redirect_to_long_url($shorten_string);
function redirect_to_long_url($shorten_string)
{
	global $conn;
	$result = mysqli_query($conn, "select * from shortened_url where short_url = '".$shorten_string."'");
	$row = mysqli_fetch_array($result);
	mysqli_query($conn, "update shortened_url set hit_count = (hit_count+1) where short_url = '".$shorten_string."'");
	if(strpos($row['long_url'], 'http') !== false)
	{
		header("Location:".$row['long_url']);
	}
	else
	{
		header("Location:http://".$row['long_url']);
	}
	exit;
}

?>