<?php

error_reporting(0);

$options = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
);

$nbaTeams = array("ATL","BOS","BRK","CHA","CHI","CLE","DAL","DEN","DET","GSW","HOU","IND","LAC","LAL","MEM","MIA","MIL","MIN","NOH","NYK","OKC","ORL","PHI","PHO","POR","SAC","SAS","TOR","UTA","WAS");
$nbaTeamNames = array("Atlanta Hawks","Boston Celtics","Brooklyn Nets","Charlotte Bobcats","Chicago Bulls","Cleveland Cavaliers","Dallas Mavericks","Denver Nuggets","Detroit Pistons","Golden State Warriors","Houston Rockets","Indiana Pacers","Los Angeles Clippers","Los Angeles Lakers","Memphis Grizzlies","Miami Heat","Milwaukee Bucks","Minnesota Timberwolves","New Orleans Hornets","New York Knicks","Oklahoma City Thunder","Orlando Magic","Philadelphia Seventy Sixers","Phoenix Suns","Portland Trailblazers","Sacramento Kings","San Antonio Spurs","Toronto Raptors","Utah Jazz","Washington Wizards");

$finalJSON = '{ ';
$theYear = 2012;

// curl for salary data
$json_url = 'http://bklynr.com/nilkanth/biking/php/data/salaries/2012.json';
$ch = curl_init( $json_url );
curl_setopt_array( $ch, $options );
$currentResult = curl_exec($ch); // Getting jSON result string
$currentJSON = json_decode($currentResult);

$pgPay = 0;
$pgCount = 0;
$sgPay = 0;
$sgCount = 0;
$sfPay = 0;
$sfCount = 0;
$pfPay = 0;
$pfCount = 0;
$cPay = 0;
$cCount = 0;

print_r($currentJSON[0]);

while($searching<30) {
	$key = $nbaTeamNames[$searching];
	$playerCount = 0;
    while ($playerCount < 2 ) {
		echo $playerCount;
		$playerCount++;
	}
	$searching++;
}

echo $finalPlayersJSON;

$file = './data/'.$theYear.'.json';
//$handle = fopen($file, 'w');

//fwrite($handle, $finalPlayersJSON);
//fclose($handle);

?>

