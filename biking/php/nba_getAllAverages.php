<?php

$options = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
);

// curl for salary data
$json_url = 'http://bklynr.com/nilkanth/biking/nba_TopAvg.html#2009';
$ch = curl_init( $json_url );
curl_setopt_array( $ch, $options );
$currentResult = curl_exec($ch); // Getting jSON result string

echo $currentResult;

?>

