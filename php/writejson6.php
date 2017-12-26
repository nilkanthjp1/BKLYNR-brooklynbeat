<?php

// used to create shakers.json

$neighborhoods = array("Bedford Stuyvesant","Brownsville","Bergen Beach","Flatlands","Cypress Hills","Clinton Hill","Fort Greene","Williamsburg","Brooklyn Heights","Dumbo","Red Hook","Park Slope","Midwood","Greenwood Cemetary","Greenpoint","Prospect Heights",'Flatbush',"East New York","Dyker Heights","Downtown Brooklyn","Coney Island","Carroll Gardens","Gowanus","Canarsie","Bushwick","Cobble Hill","Borough Park","Boerum Hill","Bensonhurst","Bay Ridge","Sheepshead Bay","Crown Heights","Sunset Park","Windsor Terrace","Brighton Beach","Seagate","City Line","Lefferts Gardens","Ditmas Park","Kensington","Marine Park","Gravesend","Navy Yard","Bath Beach","Manhattan Beach","Gerritsen Beach","Mill Basin","Vinegar Hill");
$neighborhoodsName = array("bedfordStuyvesant","brownsville","bergenBeach","flatlands","cypressHills","clintonHill","fortGreene","williamsburg","brooklynHeights","dumbo","redHook","parkSlope","midwood","greenwoodCemetary","greenpoint","prospectHeights","flatbush","eastNewYork","dykerHeights","downtownBrooklyn","coneyIsland","carrollGardens","gowanus","canarsie","bushwick","cobbleHill","boroughPark","boerumHill","bensonhurst","bayRidge","sheepsheadBay","crownHeights","sunsetPark","windsorTerrace","brightonBeach","seagate","cityLine","leffertsGardens","ditmasPark","kensington","marinePark","gravesend","navyYard","bathBeach","manhattanBeach","gerritsenBeach","millBasin","vinegarHill");
$finalJSON = "{ ";

$i=1982;

while($i<2013) {

	$one = 0;
	$two = 0;
	$three = 0;
	$four = 0;
	$five = 0;
	$oneText = "{}";
	$twoText = "{}";
	$threeText = "{}";
	$fourText = "{}";
	$fiveText = "{}";
	
	$oneLowest = 1000;
	$twoLowest = 1000;
	$threeLowest = 1000;
	$fourLowest = 1000;
	$fiveLowest = 1000;
	$oneTextLowest = "{}";
	$twoTextLowest = "{}";
	$threeTextLowest = "{}";
	$fourTextLowest = "{}";
	$fiveTextLowest = "{}";

	$json_urlLast = 'http://nilkanthpatel.com/bk/data/totals/'.($i-1).'.json';
	$json_urlCurrent = 'http://nilkanthpatel.com/bk/data/totals/'.($i).'.json';
	
	// Initializing curl
	$chLast = curl_init( $json_urlLast );
	$chCurrent = curl_init( $json_urlCurrent );
 
	// Configuring curl options
	$options = array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
	);
 
	// Setting curl options
	curl_setopt_array( $chLast, $options );
	curl_setopt_array( $chCurrent, $options );

	// Getting results
	$lastResult = json_decode(curl_exec($chLast), true);
	$currentResult = json_decode(curl_exec($chCurrent), true);
	
	$t = 0;
	while ($t<count($neighborhoodsName)) {
	
		$lastTotal =$lastResult[0][$neighborhoodsName[$t]];
		$currentTotal = $currentResult[0][$neighborhoodsName[$t]];
		$change = $currentTotal-$lastTotal;
		if ($lastTotal>0) { 
			$changePercent = Round(100*($change/$lastTotal),1)."%"; 
		} else {
			$changePercent = "all positive";
		}
		if ($change>0) {
			$change = "+".$change;
			$changePercent = "+".$changePercent;
		}
		
		if ($change > $one) {
			$two = $one;
			$three = $two;
			$four = $three;
			$five = $four;
			$one = $change;
			$fiveText = $fourText;
			$fourText = $threeText;
			$threeText = $twoText;
			$twoText = $oneText;
			$oneText = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "change" : "'.$change.'", "changePercentage" : "'.$changePercent.'" }';
		} else if ($change > $two) {
			$three = $two;
			$four = $three;
			$five = $four;
			$two = $change;
			$fiveText = $fourText;
			$fourText = $threeText;
			$threeText = $twoText;
			$twoText = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "change" : "'.$change.'", "changePercentage" : "'.$changePercent.'" }';
		} else if ($change > $three) {
			$four = $three;
			$five = $four;
			$three = $change;
			$fiveText = $fourText;
			$fourText = $threeText;
			$threeText ='{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "change" : "'.$change.'", "changePercentage" : "'.$changePercent.'" }';
		} else if ($change > $four) {
			$five = $four;
			$four = $change;
			$fiveText = $fourText;
			$fourText = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "change" : "'.$change.'", "changePercentage" : "'.$changePercent.'" }';
		} else if ($change > $five) {
			$five = $change;
			$fiveText = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "change" : "'.$change.'", "changePercentage" : "'.$changePercent.'" }';
		}
		
		if ($change < $oneLowest) {
			$twoLowest = $oneLowest;
			$threeLowest = $twoLowest;
			$fourLowest = $threeLowest;
			$fiveLowest = $fourLowest;
			$oneLowest = $change;
			$fiveTextLowest = $fourTextLowest;
			$fourTextLowest = $threeTextLowest;
			$threeTextLowest = $twoTextLowest;
			$twoTextLowest = $oneTextLowest;
			$oneTextLowest = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "change" : "'.$change.'", "changePercentage" : "'.$changePercent.'" }';
		} else if ($change < $twoLowest) {
			$threeLowest = $twoLowest;
			$fourLowest = $threeLowest;
			$fiveLowest = $fourLowest;
			$twoLowest = $change;
			$fiveTextLowest = $fourTextLowest;
			$fourTextLowest = $threeTextLowest;
			$threeTextLowest = $twoTextLowest;
			$twoTextLowest = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "change" : "'.$change.'", "changePercentage" : "'.$changePercent.'" }';
		} else if ($change < $threeLowest) {
			$fourLowest = $threeLowest;
			$fiveLowest = $fourLowest;
			$threeLowest = $change;
			$fiveTextLowest = $fourTextLowest;
			$fourTextLowest = $threeTextLowest;
			$threeTextLowest ='{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "change" : "'.$change.'", "changePercentage" : "'.$changePercent.'" }';
		} else if ($change < $fourLowest) {
			$fiveLowest = $fourLowest;
			$fourLowest = $change;
			$fiveTextLowest = $fourTextLowest;
			$fourTextLowest = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "change" : "'.$change.'", "changePercentage" : "'.$changePercent.'" }';
		} else if ($change < $fiveLowest) {
			$fiveLowest = $change;
			$fiveTextLowest = '{ "name" : "'.$neighborhoods[$t].'", "formattedName" : "'.$neighborhoodsName[$t].'", "change" : "'.$change.'", "changePercentage" : "'.$changePercent.'" }';
		}
				
		$t++;
	}
	
	$finalpositive = '[ '.$oneText.' , '.$twoText.' , '.$threeText.' , '.$fourText.' , '.$fiveText.' ]';
	$finalnegative = '[ '.$oneTextLowest.' , '.$twoTextLowest.' , '.$threeTextLowest.' , '.$fourTextLowest.' , '.$fiveTextLowest.' ]';
		
	$finalJSON = $finalJSON.' "'.$i.'" : { "positive" : '.$finalpositive.', "negative" : '.$finalnegative.' },';

	$i++;
}

$finalJSON = $finalJSON."}";
$finalJSON = str_replace("},}","}}",$finalJSON);
$finalJSON = str_replace("} , }","}}",$finalJSON);

echo $finalJSON;
$file = '../data/totals/shakers.json';
$handle = fopen($file, 'w');

fwrite($handle, $finalJSON);
fclose($handle);

?>