<?php
$neighborhoods = array("Bedford%20Stuyvesant","Brownsville","Bergen%20Beach","Flatlands","Cypress%20Hills","Clinton%20Hill","Fort%20Greene","Williamsburg","Brooklyn%20Heights","Dumbo","Red%20Hook","Park%20Slope","Midwood","Greenwood%20Cemetary","Greenpoint","Prospect%20Heights",'Flatbush%20-"flatbush%20avenue"',"East%20New%20York","Dyker%20Heights","Downtown%20Brooklyn","Coney%20Island","Carroll%20Gardens","Gowanus","Canarsie","Bushwick","Cobble%20Hill","Borough%20Park","Boerum%20Hill","Bensonhurst","Bay%20Ridge","Sheepshead%20Bay","Crown%20Heights","Sunset%20Park","Windsor%20Terrace","Brighton%20Beach","Seagate","City%20Line","Lefferts%20Gardens","Ditmas%20Park","Kensington","Marine%20Park","Gravesend","Navy%20Yard","Bath%20Beach","Manhattan%20Beach","Gerritsen%20Beach","Mill%20Basin","Vinegar%20Hill");
$neighborhoodsName = array("bedfordStuyvesant","brownsville","bergenBeach","flatlands","cypressHills","clintonHill","fortGreene","williamsburg","brooklynHeights","dumbo","redHook","parkSlope","midwood","greenwoodCemetary","greenpoint","prospectHeights","flatbush","eastNewYork","dykerHeights","downtownBrooklyn","coneyIsland","carrollGardens","gowanus","canarsie","bushwick","cobbleHill","boroughPark","boerumHill","bensonhurst","bayRidge","sheepsheadBay","crownHeights","sunsetPark","windsorTerrace","brightonBeach","seagate","cityLine","leffertsGardens","ditmasPark","kensington","marinePark","gravesend","navyYard","bathBeach","manhattanBeach","gerritsenBeach","millBasin","vinegarHill");
$years = array("1981","1982","1983","1984","1985","1986","1987","1988","1989","1990","1991","1992","1993","1994","1995","1996","1997","1998","1999","2000","2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012");

$i=1981;

while($i<2013) {
	include('http://nilkanthpatel.com/bk/php/json.php?q="East Flatbush"%20-"flatbush%20avenue"&y='.$i.'&f=flatbush');
	$i++;
}

?>