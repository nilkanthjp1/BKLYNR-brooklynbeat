<?php

error_reporting(0);

$options = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
);

$nbaTeams = array("ATL","BOS","BRK","CHA","CHI","CLE","DAL","DEN","DET","GSW","HOU","IND","LAC","LAL","MEM","MIA","MIL","MIN","NOH","NYK","OKC","ORL","PHI","PHO","POR","SAC","SAS","TOR","UTA","WAS");
$nbaTeamNames = array("Atlanta Hawks","Boston Celtics","Brooklyn Nets","Charlotte Bobcats","","","","","","","","","","","","","","","","","","","","","Chicago Bulls","Cleveland Cavaliers","Dallas Mavericks","Denver Nuggets","Detroit Pistons","Golden State Warriors","Houston Rockets","Indiana Pacers","Los Angeles Clippers","Los Angeles Lakers","Memphis Grizzlies","Miami Heat","Milwaukee Bucks","Minnesota Timberwolves","New Orleans Hornets","New York Knicks","Oklahoma City Thunder","Orlando Magic","Philadelphia Seventy Sixers","Phoenix Suns","Portland Trailblazers","Sacramento Kings","San Antonio Spurs","Toronto Raptors","Utah Jazz","Washington Wizards");

$finalPlayersJSON = '{ ';

$searching = 0;
$theYear = 2013;

while($searching<30) {

$currentTeam = $nbaTeams[$searching];

// curl for salary data
$json_url = 'http://www.basketball-reference.com/contracts/'.$currentTeam.'.html';
$ch = curl_init( $json_url );
curl_setopt_array( $ch, $options );
$currentResult = curl_exec($ch); // Getting jSON result string

// curl for roster data
$jsonRoster_url = 'http://www.basketball-reference.com/teams/'.$currentTeam.'/2013.html';
$chRoster = curl_init( $jsonRoster_url );
curl_setopt_array( $chRoster, $options );
$rosterResult = curl_exec($chRoster); // Getting jSON result string

// Analyze salary data
$salaryTable = explode('id="div_payroll">', $currentResult);
$salaryTable = explode('</table>', $salaryTable[1]);
$players = explode('<tr', $salaryTable[0]);

// Analyze roster data
$rosterTable = explode('id="div_roster">', $rosterResult);
$rosterTable = explode('</table>', $rosterTable[1]);
$rosterPlayers = explode('</tr>', $rosterTable[0]);

// Build empty arrays
$rosterPlayersData = array();
$salaryPlayersData = array();
$finalPlayersData = array();
$finalPlayersJSON = $finalPlayersJSON.'"'.$nbaTeamNames[$searching].'" : [';

// Iteratively build roster array
$i=0;	
while($i<count($rosterPlayers)) {
	$rosterPlayer = explode('</td>', $rosterPlayers[$i]);
	
	$rosterPlayerURL = explode('/players', $rosterPlayer[1]);
	$rosterPlayerURL = explode('.html', $rosterPlayerURL[1]);
	$rosterPlayerURL = $rosterPlayerURL[0];
	
	$rosterPlayerPosition = explode('>', $rosterPlayer[2]);
	$rosterPlayerPosition = $rosterPlayerPosition[1];
	
	$rosterPlayerData = array(
		"url" => $rosterPlayerURL,
		"position" => $rosterPlayerPosition
	);
	
	array_push($rosterPlayersData, $rosterPlayerData);

	$i++;
}

// Iteratively build salary array
$t=3;	
while($t<count($players)) {
	$salaryPlayer = explode("</td>",$players[$t]);
	
	$salaryPlayerName = explode(">",$salaryPlayer[0]);
	$salaryPlayerName = explode(">",$salaryPlayerName[count($salaryPlayerName)-2]);
	$salaryPlayerName = explode("<",$salaryPlayerName[0]);
	$salaryPlayerName = $salaryPlayerName[0];
	
	$salaryPlayerURL = explode('href="/players',$salaryPlayer[0]);
	$salaryPlayerURL = explode('.html',$salaryPlayerURL[1]);
	$salaryPlayerURL = $salaryPlayerURL[0];
	
	$salaryPlayerSalary = explode('csk="',$salaryPlayer[1]);
	$salaryPlayerSalary = explode('"',$salaryPlayerSalary[1]);
	$salaryPlayerSalary = $salaryPlayerSalary[0];
	
	$salaryPlayerData = array(
		"name" => $salaryPlayerName,
		"url" => $salaryPlayerURL,
		"salary" => $salaryPlayerSalary
	);
	
	array_push($salaryPlayersData, $salaryPlayerData);
	
	$t++;
}

// Iteratively build final array
$r=0;	
while($r<count($rosterPlayersData)) {
	$s = 0;
	$currentURL = $rosterPlayersData[$r]["url"];
	
	while($s<count($salaryPlayersData)) {
		$currentSalaryURL = $salaryPlayersData[$s]["url"];
		if ( strpos($currentURL,$currentSalaryURL) !== false )  {
		
			$currentPlayerData = array(
				"name" => $salaryPlayersData[$s]["name"],
				"url" => $currentURL,
				"position" => $rosterPlayersData[$r]["position"],
				"salary" => $salaryPlayersData[$s]["salary"]
			);
			array_push($finalPlayersData, $currentPlayerData);
			
			$finalPlayersJSON = $finalPlayersJSON.'{ "name":"'.$salaryPlayersData[$s]["name"].'", "url":"'.$currentURL.'", "position":"'.$rosterPlayersData[$r]["position"].'", "salary":"'.$salaryPlayersData[$s]["salary"].'" }, ';
			
			break;
		}
		$s++;
	}
	$r++;
}
$finalPlayersJSON = $finalPlayersJSON."], ";
$finalPlayersJSON = str_replace("}, ]","} ]",$finalPlayersJSON);
$searching++;
}

$finalPlayersJSON = $finalPlayersJSON."}";
$finalPlayersJSON = str_replace("], }","] }",$finalPlayersJSON);
echo $finalPlayersJSON;

$file = './data/'.$theYear.'.json';
$handle = fopen($file, 'w');

fwrite($handle, $finalPlayersJSON);
fclose($handle);

?>

