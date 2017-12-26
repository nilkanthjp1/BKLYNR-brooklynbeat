<?php

$url = $_GET["u"];

// Initializing curl
$ch = curl_init( $url );
 
// Configuring curl options
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
curl_setopt($ch, CURLOPT_USERPWD, "j07VM9P.1o5ZVOf8jt2iO6Mid9jLrIzg:");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

// Getting results
$currentResult = curl_exec($ch); // Getting jSON result string
return $currentResult;

?>

