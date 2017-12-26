<?php


$injuries="lat,lng";
$deaths="lat,lng";

	
$json_url = 'http://www.bklynr.com/nilkanth/biking/data/combined.json';
// Initializing curl
$ch = curl_init( $json_url );
 
// Configuring curl options
$options = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
);
 
// Setting curl options
curl_setopt_array( $ch, $options );

// Getting results
$currentResult = curl_exec($ch); // Getting jSON result string
$jsonCheck = json_decode($currentResult, true);
	
while($t<count($jsonCheck)) {
	$i=0;
	$d=0;
	$injuriesTime = $jsonCheck[$t]['injuries'];
	$deathsTime = $jsonCheck[$t]['deaths'];
	$currLoc = $jsonCheck[$t]['loc'];
	while($i<$injuriesTime) {
		$injuries = $injuries."\r".$currLoc;
		$i++;
	}
	while($d<$deathsTime) {
		$deaths = $deaths."\n".$currLoc;
		$d++;
	}
	$t++;
}

echo $deaths;

$file = '../data/stag.json';
$handle = fopen($file, 'w');

fwrite($handle, $injuries);
fclose($handle);

?>

