<?php
	
	$keywords='Earthquake%20India';
	$url = "https://ajax.googleapis.com/ajax/services/search/news?" . "v=1.0&num=8&q=$keywords&userip=192.168.1.2&rsz=8";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$body = curl_exec($ch);
	curl_close($ch);

	$json = json_decode($body);
	//Traversing the JSON response tree 
print_r($json);
echo PHP_EOL


?>