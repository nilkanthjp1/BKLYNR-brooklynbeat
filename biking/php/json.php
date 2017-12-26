<?php

$finalJSON = "[ ";

$i=1;

while($i<5) {
	if ($i<10) {
		$month = "0".$i;
	} else {
		$month = $i;
	}

	$t=0;
	
	$json_url = 'http://www.kristinabudelis.com/sarah/data/2013_'.$month.'.json';
	echo "2012 ".$month;
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
		$jsonStreet = $jsonCheck[$t]['intersection']." brooklyn";
		$jsonDeaths = $jsonCheck[$t]['deaths'];
		$jsonInjuries =  $jsonCheck[$t]['injuries'];
		$jsonFormattedStreet = str_replace(" ", "+", $jsonStreet);
		
		sleep(1);
		
		$json_gurl = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$jsonFormattedStreet.'&sensor=true';

		// Initializing curl
		$che = curl_init( $json_gurl );
 
		// Configuring curl options
		$options = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
		);
 
		// Setting curl options
		curl_setopt_array( $che, $options );

		// Getting results
		$currentResult = curl_exec($che); // Getting jSON result string
		$jsonCheckGoogle = json_decode($currentResult, true);
		
		if (strlen($jsonCheckGoogle['results'][0]['formatted_address']) > 1) {
			$finalJSON = $finalJSON.'{ "address":"'.$jsonCheckGoogle['results'][0]['formatted_address'].'", "loc":"'.$jsonCheckGoogle['results'][0]['geometry']['location']['lat'].','.$jsonCheckGoogle['results'][0]['geometry']['location']['lng'].'", "deaths":"'.$jsonDeaths.'", "injuries":"'.$jsonInjuries.'"}, ';
		} else {
			$finalJSON = $finalJSON.'{ "address":"'.$jsonFormattedStreet.'", "loc":"'.$jsonCheckGoogle['results'][0]['geometry']['location']['lat'].','.$jsonCheckGoogle['results'][0]['geometry']['location']['lng'].'", "deaths":"'.$jsonDeaths.'", "injuries":"'.$jsonInjuries.'"}, ';
		}
		
		$finalAddressesArray = $finalAddressesArray.'"'.$jsonStreet.'",';
		$t++;
	}
	$i++;
}
$finalJSON = $finalJSON."]";
$finalJSON = str_replace(", ]", "]", $finalJSON);

$file = '../data/stag.json';
$handle = fopen($file, 'w');

fwrite($handle, $finalJSON);
fclose($handle);

?>

