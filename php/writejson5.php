<?php

// used to create sorted.json

$neighborhoods = array("Bedford Stuyvesant","Brownsville","Bergen Beach","Flatlands","Cypress Hills","Clinton Hill","Fort Greene","Williamsburg","Brooklyn Heights","Dumbo","Red Hook","Park Slope","Midwood","Greenwood Cemetary","Greenpoint","Prospect Heights",'Flatbush',"East New York","Dyker Heights","Downtown Brooklyn","Coney Island","Carroll Gardens","Gowanus","Canarsie","Bushwick","Cobble Hill","Borough Park","Boerum Hill","Bensonhurst","Bay Ridge","Sheepshead Bay","Crown Heights","Sunset Park","Windsor Terrace","Brighton Beach","Seagate","City Line","Lefferts Gardens","Ditmas Park","Kensington","Marine Park","Gravesend","Navy Yard","Bath Beach","Manhattan Beach","Gerritsen Beach","Mill Basin","Vinegar Hill");
$neighborhoodsName = array("bedfordStuyvesant","brownsville","bergenBeach","flatlands","cypressHills","clintonHill","fortGreene","williamsburg","brooklynHeights","dumbo","redHook","parkSlope","midwood","greenwoodCemetary","greenpoint","prospectHeights","flatbush","eastNewYork","dykerHeights","downtownBrooklyn","coneyIsland","carrollGardens","gowanus","canarsie","bushwick","cobbleHill","boroughPark","boerumHill","bensonhurst","bayRidge","sheepsheadBay","crownHeights","sunsetPark","windsorTerrace","brightonBeach","seagate","cityLine","leffertsGardens","ditmasPark","kensington","marinePark","gravesend","navyYard","bathBeach","manhattanBeach","gerritsenBeach","millBasin","vinegarHill");
$finalJSON = "{ ";

$i=1981;

while($i<2013) {
	$t=0;
	$one = 0;
	$two = 0;
	$three = 0;
	$four = 0;
	$five = 0;
	$oneText = "";
	$twoText = "";
	$threeText = "";
	$fourText = "";
	$fiveText = "";
	while($t<count($neighborhoodsName)) {
		$json_url = 'http://nilkanthpatel.com/bk/data/'.$i.'/'.$neighborhoodsName[$t].'.json';
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
		
		if ($jsonTotal > $one) {
			$two = $one;
			$three = $two;
			$four = $three;
			$five = $four;
			$one = $jsonTotal;
			$fiveText = $fourText;
			$fourText = $threeText;
			$threeText = $twoText;
			$twoText = $oneText;
			$oneText = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "count" : "'.$jsonTotal.'" }';
		} else if ($jsonTotal > $two) {
			$three = $two;
			$four = $three;
			$five = $four;
			$two = $jsonTotal;
			$fiveText = $fourText;
			$fourText = $threeText;
			$threeText = $twoText;
			$twoText = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "count" : "'.$jsonTotal.'" }';
		} else if ($jsonTotal > $three) {
			$four = $three;
			$five = $four;
			$three = $jsonTotal;
			$fiveText = $fourText;
			$fourText = $threeText;
			$threeText = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "count" : "'.$jsonTotal.'" }';
		} else if ($jsonTotal > $four) {
			$five = $four;
			$four = $jsonTotal;
			$fiveText = $fourText;
			$fourText = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "count" : "'.$jsonTotal.'" }';
		} else if ($jsonTotal > $five) {
			$five = $jsonTotal;
			$fiveText = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "count" : "'.$jsonTotal.'" }';
		}
		$t++;
	}
	$finalJSON = $finalJSON.'"'.$i.'" : [ '.$oneText.' , '.$twoText.' , '.$threeText.' , '.$fourText.' , '.$fiveText.' ], ';
	$i++;
}

$finalJSON = $finalJSON."}";
$finalJSON = str_replace("], }","]}",$finalJSON);
$finalJSON = str_replace('", ]','"]',$finalJSON);

echo $finalJSON;

$file = '../data/totals/sorted.json';
$handle = fopen($file, 'w');

fwrite($handle, $finalJSON);
fclose($handle);

?>