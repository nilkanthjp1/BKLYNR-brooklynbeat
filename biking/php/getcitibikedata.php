<?php

$citibikeURL = "http://citibikenyc.com/stations/json";

// Initializing curl
$ch = curl_init( $citibikeURL );
 
// Configuring curl options
$options = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
);
 
// Setting curl options
curl_setopt_array( $ch, $options );

// Getting results
$currentResult = curl_exec($ch); // Getting jSON result string
echo $currentResult;

?>

