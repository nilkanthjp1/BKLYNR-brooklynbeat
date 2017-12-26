var pgPay = 0;
var pgCount = 0;
var sgPay = 0;
var sgCount = 0;
var sfPay = 0;
var sfCount = 0;
var pfPay = 0;
var pfCount = 0;
var cPay = 0;
var cCount = 0;

var pgPayLow = 0;
var pgCountLow = 0;
var sgPayLow = 0;
var sgCountLow = 0;
var sfPayLow = 0;
var sfCountLow = 0;
var pfPayLow = 0;
var pfCountLow = 0;
var cPayLow = 0;
var cCountLow = 0;

var pgPayHigh = 0;
var pgCountHigh = 0;
var sgPayHigh = 0;
var sgCountHigh = 0;
var sfPayHigh = 0;
var sfCountHigh = 0;
var pfPayHigh = 0;
var pfCountHigh = 0;
var cPayHigh = 0;
var cCountHigh = 0;

var inflation = {"1998":0.71,"1999":0.72,"2000":0.75,"2001":0.77,"2002":0.78,"2003":0.8,"2004":0.82,"2005":0.85,"2006":0.88,"2007":0.9,"2008":0.94,"2009":0.93,"2010":0.95,"2011":0.98,"2012":1,"2013":1};
var champions = [
["Miami Heat","San Antonio Spurs","Indiana Pacers","Memphis Grizzlies"],
["Miami Heat","Oklahoma City Thunder","Boston Celtics","San Antonio Spurs"],
["Dallas Mavericks","Miami Heat","Oklahoma City","Chicago Bulls"],
["Boston Celtics","Orlando Magic","Los Angeles Lakers","Phoenix Suns"],
["Orlando Magic","Cleveland Cavaliers","Los Angeles Lakers","Denver Nuggets"],
["Boston Celtics","Detroit Pistons","Los Angeles Lakers","San Antonio Spurs"],
["Cleveland Cavaliers","Detroit Pistons","San Antonio Spurs","Utah Jazz"],
["Miami Heat","Detroit Pistons","Dallas Mavericks","Phoenix Suns"],
["Detroit Pistons","Miami Heat","San Antonio Spurs","Phoenix Suns"],
["Detroit Pistons","Indiana Pacers","Los Angeles Lakers","Minnesota Timberwolves"],
["New Jersey Nets","Detroit Pistons","San Antonio Spurs","Dallas Mavericks"],
["New Jersey Nets","Boston Celtics","Los Angeles Lakers","Sacramento Kings"],
["Philadelphia 76ers","Milwaukee Bucks","Los Angeles Lakers","San Antonio Spurs"],
["Indiana Pacers","New York Knicks","Los Angeles Lakers","Portland Trail Blazers"],
["New York Knicks","Indiana Pacers","San Antonio Spurs","Portland Trail Blazers"],
["Chicago Bulls","Indiana Pacers","Utah Jazz","Los Angeles Lakers"]
]

var losers = [
["Phoenix Suns","Cleveland Cavaliers","Charlotte Bobcats","Orlando Magic"],
["Cleveland Cavaliers","New Orleans Hornets","Washington Wizards","Charlotte Bobcats"],
["Washington Wizards","Toronto Raptors","Cleveland Cavaliers","Minnesota Timberwolves"],
["Washington Wizards","Sacramento Kings","Minnesota Timberwolves","Brooklyn Nets"],
["Oklahoma City Thunder","Los Angeles Clippers","Washington Wizards","Sacramento Kings"],
["Memphis Grizzlies","Minnesota Timberwolves","Seattle SuperSonics","Miami Heat"],
["Atlanta Hawks","Milwaukee Bucks","Boston Celtics","Memphis Grizzlies"],
["Atlanta Hawks","Charlotte Bobcats","New York Knicks","Portland Trail Blazers"],
["Utah Jazz","Charlotte Bobcats","New Orleans Hornets","Atlanta Hawks"],
["Los Angeles Clippers","Washington Wizards","Chicago Bulls","Orlando Magic"],
["Miami Heat","Toronto Raptors","Cleveland Cavaliers","Denver Nuggets"],
["Denver Nuggets","Memphis Grizzlies","Chicago Bulls","Golden State Warriors"],
["Memphis Grizzlies","Washington Wizards","Golden State Warriors","Chicago Bulls"],
["Memphis Grizzlies","Golden State Warriors","Chicago Bulls","Los Angeles Clippers"],
["Denver Nuggets","Chicago Bulls","Los Angeles Clippers","Memphis Grizzlies"],
["Memphis Grizzlies","Los Angeles Clippers","Toronto Raptors","Denver Nuggets"]
]

var year = window.location.href.split('#')[1];
var yearNumber = (1998-year)*-1;

$.ajax({
	type: "GET",
	url: "./php/data/records/"+year+".json",
}).done(function( data ) {
	window.teamData = data;
});

$.ajax({
	type: "GET",
	url: "./php/data/salaries/"+year+".json",
}).done(function( data ) {
	window.salaryData = data;
	for (var key in window.salaryData) {
    	for (var i=0; i<window.salaryData[key].length; i++) {
    		var currentPosition = window.salaryData[key][i]["position"];
    		if (currentPosition == "PG") {
					pgPay = pgPay+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					pgCount++;
			} else if (currentPosition == "SG") {
					sgPay = sgPay+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					sgCount++; 
			} else if (currentPosition == "SF") {
					sfPay = sfPay+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					sfCount++;
			} else if (currentPosition == "PF") {
					pfPay = pfPay+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					pfCount++;
			} else if (currentPosition == "C") {
					cPay = cPay+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					cCount++;
			}
    	}
    	var currentChampions = champions[yearNumber].toString();
    	if (currentChampions.indexOf(key) > 1) {
    		for (var i=0; i<window.salaryData[key].length; i++) {
    			var currentPosition = window.salaryData[key][i]["position"];
    			if (currentPosition == "PG") {
					pgPayHigh = pgPayHigh+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					pgCountHigh++;
				} else if (currentPosition == "SG") {
					sgPayHigh = sgPayHigh+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					sgCountHigh++; 
				} else if (currentPosition == "SF") {
					sfPayHigh = sfPayHigh+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					sfCountHigh++;
				} else if (currentPosition == "PF") {
					pfPayHigh = pfPayHigh+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					pfCountHigh++;
				} else if (currentPosition == "C") {
					cPayHigh = cPayHigh+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					cCountHigh++;
				}
			}
    	}
    	var currentLosers = losers[yearNumber].toString();
    	if (currentLosers.indexOf(key) > 1) {
    		for (var i=0; i<window.salaryData[key].length; i++) {
    			var currentPosition = window.salaryData[key][i]["position"];
    			if (currentPosition == "PG") {
					pgPayLow = pgPayLow+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					pgCountLow++;
				} else if (currentPosition == "SG") {
					sgPayLow = sgPayLow+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					sgCountLow++; 
				} else if (currentPosition == "SF") {
					sfPayLow = sfPayLow+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					sfCountLow++;
				} else if (currentPosition == "PF") {
					pfPayLow = pfPayLow+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					pfCountLow++;
				} else if (currentPosition == "C") {
					cPayLow = cPayLow+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					cCountLow++;
				}
			}
    	}
	}
	
	pgAvg = pgPay/pgCount;
	sgAvg = sgPay/sgCount;
	sfAvg = sfPay/sfCount;
	pfAvg = pfPay/pfCount;
	cAvg = cPay/cCount;
	
	pgAvgHigh = pgPayHigh/pgCountHigh;
	sgAvgHigh = sgPayHigh/sgCountHigh;
	sfAvgHigh = sfPayHigh/sfCountHigh;
	pfAvgHigh = pfPayHigh/pfCountHigh;
	cAvgHigh = cPayHigh/cCountHigh;
	
	pgAvgLow = pgPayLow/pgCountLow;
	sgAvgLow = sgPayLow/sgCountLow;
	sfAvgLow = sfPayLow/sfCountLow;
	pfAvgLow = pfPayLow/pfCountLow;
	cAvgLow = cPayLow/cCountLow;
	
	var yearAvg = '{ "pgCount": '+pgCount+', "pgTotal": '+pgPay+', "pgAvg": '+pgAvg+', "sgCount": '+sgCount+', "sgTotal": '+sgPay+', "sgAvg": '+sgAvg+', "sfCount": '+sfCount+', "sfTotal": '+sfPay+', "sfAvg": '+sfAvg+', "pfCount": '+pfCount+', "pfTotal": '+pfPay+', "pfAvg": '+pfAvg+', "cCount": '+cCount+', "cTotal": '+cPay+', "cAvg": '+cAvg+' }';
	var highAvg = '{ "pgCount": '+pgCountHigh+', "pgTotal": '+pgPayHigh+', "pgAvg": '+pgAvgHigh+', "sgCount": '+sgCountHigh+', "sgTotal": '+sgPayHigh+', "sgAvg": '+sgAvgHigh+', "sfCount": '+sfCountHigh+', "sfTotal": '+sfPayHigh+', "sfAvg": '+sfAvgHigh+', "pfCount": '+pfCountHigh+', "pfTotal": '+pfPayHigh+', "pfAvg": '+pfAvgHigh+', "cCount": '+cCountHigh+', "cTotal": '+cPayHigh+', "cAvg": '+cAvgHigh+' }';
	var lowAvg =  '{ "pgCount": '+pgCountLow+', "pgTotal": '+pgPayLow+', "pgAvg": '+pgAvgLow+', "sgCount": '+sgCountLow+', "sgTotal": '+sgPayLow+', "sgAvg": '+sgAvgLow+', "sfCount": '+sfCountLow+', "sfTotal": '+sfPayLow+', "sfAvg": '+sfAvgLow+', "pfCount": '+pfCountLow+', "pfTotal": '+pfPayLow+', "pfAvg": '+pfAvgLow+', "cCount": '+cCountLow+', "cTotal": '+cPayLow+', "cAvg": '+cAvgLow+' }';
	
	$("body").html('"'+year+'": { "high": '+highAvg+', "avg": '+yearAvg+', "low": '+lowAvg+' }');
});



function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
}

