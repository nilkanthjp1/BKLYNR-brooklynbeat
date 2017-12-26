<?php


$options = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
);

$nbaTeams = array("ATL","BOS","NJN","CHA","CHI","CLE","DAL","DEN","DET","GSW","HOU","IND","LAC","LAL","MEM","MIA","MIL","MIN","NOH","NYK","OKC","ORL","PHI","PHO","POR","SAC","SAS","TOR","UTA","WAS");
$nbaTeamNames = array("Atlanta Hawks","Boston Celtics","Brooklyn Nets","Charlotte Bobcats","Chicago Bulls","Cleveland Cavaliers","Dallas Mavericks","Denver Nuggets","Detroit Pistons","Golden State Warriors","Houston Rockets","Indiana Pacers","Los Angeles Clippers","Los Angeles Lakers","Memphis Grizzlies","Miami Heat","Milwaukee Bucks","Minnesota Timberwolves","New Orleans Hornets","New York Knicks","Oklahoma City Thunder","Orlando Magic","Philadelphia Seventy Sixers","Phoenix Suns","Portland Trailblazers","Sacramento Kings","San Antonio Spurs","Toronto Raptors","Utah Jazz","Washington Wizards");

$finalPlayersJSON = '{ ';

$searching = 0;
$theYear = $_GET["y"];

while($searching<30) {

$currentTeam = $nbaTeams[$searching];

// Curl for roster data
$jsonRoster_url = 'http://www.basketball-reference.com/teams/'.$currentTeam.'/'.$theYear.'.html';
$chRoster = curl_init( $jsonRoster_url );
curl_setopt_array( $chRoster, $options );
$rosterResult = curl_exec($chRoster); // Getting jSON result string

// Analyze roster data
$rosterTable = explode('Record:</span>', $rosterResult);
$rosterTable = explode('</p>', $rosterTable[1]);
$rosterTable = $rosterTable[0];

// Build empty arrays
$rosterPlayersData = array();
$finalPlayersJSON = $finalPlayersJSON.'"'.$nbaTeamNames[$searching].'" : [';

// Find team results
$teamWins = explode('-', $rosterTable);
$teamWins = $teamWins[0];

$teamLosses = explode('-', $rosterTable);
$teamLosses = explode(', Finished', $teamLosses[1]);
$teamLosses = $teamLosses[0];

$teamStanding = explode(', Finished ', $rosterTable);
$teamStanding = explode(' in', $teamStanding[1]);
$teamStanding = $teamStanding[0];
if ( is_numeric($teamStanding[0].$teamStanding[1]) ) {
	$teamStanding = $teamStanding[0].$teamStanding[1];
} else {
	$teamStanding = $teamStanding[0];
}

$teamDivision = explode('NBA</a> ', $rosterTable);
$teamDivision = explode(' (<a', $teamDivision[1]);
$teamDivision = $teamDivision[0];

$teamPlayoffsRound = explode('Playoffs:</span>', $rosterTable);
$teamPlayoffsRound = explode(' versus', $teamPlayoffsRound[1]);
$teamPlayoffsRound = explode('<br>', $teamPlayoffsRound[0]);
$teamPlayoffsRound = $teamPlayoffsRound[1];

$teamPlayoffsTeam = explode('Playoffs:</span>', $rosterTable);
$teamPlayoffsTeam = explode('</a>', $teamPlayoffsTeam[1]);
$teamPlayoffsTeam = explode('">', $teamPlayoffsTeam[0]);
$teamPlayoffsTeam = $teamPlayoffsTeam[1];

$teamStandingJSON = '{ "position":'.$teamStanding.', "division":"'.$teamDivision.'" }';
$teamPlayoffsJSON = '{ "result":"'.$teamPlayoffsRound.'", "team":"'.$teamPlayoffsTeam.'" }';
			
$finalPlayersJSON = $finalPlayersJSON.'{ "wins":'.$teamWins.', "losses":'.$teamLosses.', "standing":'.$teamStandingJSON.', "playoffs":'.$teamPlayoffsJSON.' }, ';

$finalPlayersJSON = $finalPlayersJSON."], ";
$finalPlayersJSON = str_replace("}, ]","} ]",$finalPlayersJSON);

$searching++;

}

$finalPlayersJSON = $finalPlayersJSON."}";
$finalPlayersJSON = str_replace("], }","] }",$finalPlayersJSON);
echo $finalPlayersJSON;

$file = './data/records/'.$theYear.'.json';
$handle = fopen($file, 'w');

fwrite($handle, $finalPlayersJSON);
fclose($handle);

?>



