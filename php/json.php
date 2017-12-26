<?php

//jSON URL which should be requested
$offset = 0;
$query = str_replace(" ", "%20", $_GET['q']);
$queryUnformatted = $_GET['q'];
$year = str_replace(" ", "%20", $_GET['y']);
$filename = str_replace(" ", "%20", $_GET['f']);
$result = "";

$jsonCheck_url = 'http://api.nytimes.com/svc/search/v1/article?format=json&query="'.$query.'"%20brooklyn%20source_facet:[The%20New%20York%20Times]&begin_date='.$year.'0101&end_date='.$year.'1231&fields=url,title,author,body,date,page_facet,geo_facet,day_of_week_facet,nytd_section_facet&api-key=f22d7884f8a4c0778983eb695078f5a2:9:67470091';
// Initializing curl
$ch = curl_init( $jsonCheck_url );
 
// Configuring curl options
$options = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
);
 
// Setting curl options
curl_setopt_array( $ch, $options );
// Getting results

$jsonCheckResult = curl_exec($ch); // Getting jSON result string
$jsonCheck = json_decode($jsonCheckResult, true);
$jsonTotal = $jsonCheck["total"];

$queryLimit = ceil($jsonTotal/10);

echo "<p style='font-family:Helvetica; font-size:16px; padding:10px;'>The New York Times published <b>".$jsonTotal." articles about ".$queryUnformatted." in ".$year."</b>.</p>";

while($offset<=$queryLimit) {
	$json_url = 'http://api.nytimes.com/svc/search/v1/article?format=json&offset='.$offset.'&query="'.$query.'"%20brooklyn%20source_facet:[The%20New%20York%20Times]&begin_date='.$year.'0101&end_date='.$year.'1231&fields=url,title,author,body,date,page_facet,geo_facet,day_of_week_facet,nytd_section_facet&api-key=f22d7884f8a4c0778983eb695078f5a2:9:67470091';
		
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
	$currentResult = split('"results" :',$currentResult,2);
	$currentResult = $currentResult[1];
	$currentResult = split('"tokens"',$currentResult,2);
	$currentResult = $currentResult[0];
	$currentResult = str_replace("[{","{",$currentResult);
	$currentResult = str_replace("}]","}",$currentResult);
	$currentResult = str_replace(" [] , ","",$currentResult);
	$result = $result." ".$currentResult;
	$offset++;
}

$result = "[".$result."]";
$result = str_replace("} ,  ]","}]",$result);
$result = str_replace("} , ]","}]",$result);

$file = '../data/'.$year.'/'.$filename.'.json';
$handle = fopen($file, 'w');

fwrite($handle, $result);
fclose($handle);

print "<p style='font-family:Helvetica; font-size:16px; padding:10px;'>Data was <a href='../data/".$year."/".$filename.".json'>successfully written</a>. Yes!</p>";

?>