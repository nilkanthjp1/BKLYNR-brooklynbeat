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

var year = window.location.href.split('#')[1];

var teamTotals = { "Atlanta Hawks": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Boston Celtics": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Brooklyn Nets": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Charlotte Bobcats": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Chicago Bulls": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Cleveland Cavaliers": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Dallas Mavericks": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Denver Nuggets": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Detroit Pistons": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Golden State Warriors": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Houston Rockets": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Indiana Pacers": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Los Angeles Clippers": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Los Angeles Lakers": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Memphis Grizzlies": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Miami Heat": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Milwaukee Bucks": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Minnesota Timberwolves": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "New Orleans Hornets": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "New York Knicks": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Oklahoma City Thunder": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Orlando Magic": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Philadelphia Seventy Sixers": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Phoenix Suns": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Portland Trailblazers": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Sacramento Kings": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "San Antonio Spurs": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Toronto Raptors": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Utah Jazz": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 }, "Washington Wizards": { "pgCount": 0, "pgTotal": 0, "pgAvg": 0, "sgCount": 0, "sgTotal": 0, "sgAvg": 0, "sfCount": 0, "sfTotal": 0, "sfAvg": 0, "pfCount": 0, "pfTotal": 0, "pfAvg": 0, "cCount": 0, "cTotal": 0, "cAvg": 0 } } ;
var inflation = {"1998":0.71","1999":0.72","2000":0.75","2001":0.77","2002":0.78","2003":0.8","2004":0.82","2005":0.85","2006":0.88","2007":0.9","2008":0.94","2009":0.93","2010":0.95","2011":0.98","2012":1,"2013":1};

$.ajax({
	type: "GET",
	url: "./php/data/records/"+year+".json",
}).done(function( data ) {
	window.teamData = data;
});

window.setTimeout( function() {
$.ajax({
	type: "GET",
	url: "./php/data/salaries/"+year+".json",
}).done(function( data ) {
	window.salaryData = data;
	for (var key in window.salaryData) {
    	for (var i=0; i<window.salaryData[key].length; i++) {
    		var currentPosition = window.salaryData[key][i]["position"];
    		switch (currentPosition) {
				case "PG": 
					pgPay = pgPay+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					pgCount++;
					teamTotals[key]["pgTotal"] = teamTotals[key]["pgTotal"]+parseInt(window.salaryData[key][i]["salary"]);
					teamTotals[key]["pgCount"]++;
				case "SG": 
					sgPay = sgPay+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					sgCount++;
					teamTotals[key]["sgTotal"] = teamTotals[key]["sgTotal"]+parseInt(window.salaryData[key][i]["salary"]);
					teamTotals[key]["sgCount"]++;
				case "SF": 
					sfPay = sfPay+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					sfCount++;
					teamTotals[key]["sfTotal"] = teamTotals[key]["sfTotal"]+parseInt(window.salaryData[key][i]["salary"]);
					teamTotals[key]["sfCount"]++;
				case "PF": 
					pfPay = pfPay+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					pfCount++;
					teamTotals[key]["pfTotal"] = teamTotals[key]["pfTotal"]+parseInt(window.salaryData[key][i]["salary"]);
					teamTotals[key]["pfCount"]++;
				case "C": 
					cPay = cPay+parseInt(window.salaryData[key][i]["salary"])/inflation[year];
					cCount++;
					teamTotals[key]["cTotal"] = teamTotals[key]["cTotal"]+parseInt(window.salaryData[key][i]["salary"]);
					teamTotals[key]["cCount"]++;
			}
    	}
    	teamTotals[key]["pgAvg"]=teamTotals[key]["pgTotal"]/teamTotals[key]["pgCount"];
    	teamTotals[key]["sgAvg"]=teamTotals[key]["sgTotal"]/teamTotals[key]["sgCount"];
    	teamTotals[key]["sfAvg"]=teamTotals[key]["sfTotal"]/teamTotals[key]["sfCount"];
    	teamTotals[key]["pfAvg"]=teamTotals[key]["pfTotal"]/teamTotals[key]["pfCount"];
    	teamTotals[key]["cAvg"]=teamTotals[key]["cTotal"]/teamTotals[key]["cCount"];
    	/* try {
    		$("#teamTotals").html($("#teamTotals").html()+"<div class='oneTeam'><h1>"+key+"</h1><h1 class='red'>"+window.teamData[key]["wins"]+"-"+window.teamData[key]["losses"]+"</h1><li>PG: "+teamTotals[key]["pgTotal"]+"</li><li>SG: "+teamTotals[key]["sgTotal"]+"</li><li>SF: "+teamTotals[key]["sfTotal"]+"</li><li>PF: "+teamTotals[key]["pfTotal"]+"</li><li>C: "+teamTotals[key]["cTotal"]+"</li></div>");
  		} catch(err) { } */
	}
	pgAvg = pgPay/pgCount;
	sgAvg = sgPay/sgCount;
	sfAvg = sfPay/sfCount;
	pfAvg = pfPay/pfCount;
	cAvg = cPay/cCount;
	totalAvg=4000000;
	/* totalAvg = (pgAvg+sgAvg+sfAvg+pfAvg+cAvg)/5;
	$("#positionCircles #pg").css("width",Math.round(pgAvg/totalAvg*100)+"%").html("PG: $"+commaSeparateNumber(Math.round(pgAvg*10)/10));
	$("#positionCircles #sg").css("width",Math.round(sgAvg/totalAvg*100)+"%").html("SG: $"+commaSeparateNumber(Math.round(sgAvg*10)/10));
	$("#positionCircles #sf").css("width",Math.round(sfAvg/totalAvg*100)+"%").html("SF: $"+commaSeparateNumber(Math.round(sfAvg*10)/10));
	$("#positionCircles #pf").css("width",Math.round(pfAvg/totalAvg*100)+"%").html("PF: $"+commaSeparateNumber(Math.round(pfAvg*10)/10));
	$("#positionCircles #c").css("width",Math.round(cAvg/totalAvg*100)+"%").html("C: $"+commaSeparateNumber(Math.round(cAvg*10)/10)); */
});
},1000);



function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
}

