<?php

$neighborhoodsName = array("bedfordStuyvesant","brownsville","bergenBeach","flatlands","cypressHills","clintonHill","fortGreene","williamsburg","brooklynHeights","dumbo","redHook","parkSlope","midwood","greenwoodCemetary","greenpoint","prospectHeights","flatbush","eastNewYork","dykerHeights","downtownBrooklyn","coneyIsland","carrollGardens","gowanus","canarsie","bushwick","cobbleHill","boroughPark","boerumHill","bensonhurst","bayRidge","sheepsheadBay","crownHeights","sunsetPark","windsorTerrace","brightonBeach","seagate","cityLine","leffertsGardens","ditmasPark","kensington","marinePark","gravesend","navyYard","bathBeach","manhattanBeach","gerritsenBeach","millBasin","vinegarHill");
$finalJSON = "[ { ";

$i=1987;
$t=0;

while($i<1988) {
	while($t<count($neighborhoodsName)) {
		$json_url = 'http://www.nilkanthpatel.com/bk/data/'.$i.'/'.$neighborhoodsName[$t].'.json';

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
		$jsonTotal = count($jsonCheck);
		
		$finalJSON = $finalJSON.'"'.$neighborhoodsName[$t].'" : "'.$jsonTotal.'", ';
		$t++;
	}
	$finalJSON = $finalJSON."} ";
	$i++;
}

$finalJSON = str_replace(", }","}",$finalJSON);
$finalJSON = str_replace('", }','"}',$finalJSON);

$finalJSON = $finalJSON."]";
echo $finalJSON;

?>