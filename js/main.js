 window.currentYear = 1981;

$.getJSON('./data/totals/combined.json', function(data) {
	window.timesData = data;
});
$.getJSON('./data/bk_census.json', function(data) {
	window.cityData = data;
});
$.getJSON('./data/totals/sorted.json', function(data) {
	window.sortedData = data;
});
$.getJSON('./data/totals/shakers.json', function(data) {
	window.shakersData = data;
});
$.getJSON('./data/bk_blurbs.json', function(data) {
	window.blurbs = data;
});


window.onload = function() {

	resizeMap();
	heatMap(window.currentYear);
	
	$("#controller ul li#"+window.currentYear).addClass("active");
	
	$("#controller ul li").click( function() {
		changeYear($(this).attr("id"));
		$("#controller #slider #sliderButton").animate({ top : (window.currentYear-1981)*($("#controller #slider").outerHeight()/32)+($("#controller ul li.active").height()-$("#controller #slider #sliderButton").width())/2 }, {
			duration: 500,
			complete : function() { 
				$("#controller #slider").css("background-size","10px "+($("#controller #slider #sliderButton").position().top-$("#controller #slider #sliderButton").width()-5)+"px"); 
			}
		});
	});
	
	$('.neighborhood').hover( function() {
		var cityID = $(this).attr("id");
		$("#neighborhoodInfo").html("<h2>"+window.cityData[cityID][0]["formattedName"]+"</h2><p>NYT Mentions in "+window.currentYear+": "+window.timesData[window.currentYear][cityID]+"</p>");
		$(this).css({ "stroke-width":2.5, "stroke":"white"});
		if (cityID == "flatlands") { $("#flatlandsEast").css({ "stroke-width":2.5, "stroke":"white"}); }
	}, function() {
		$("#neighborhoodInfo").html("");
		$(this).removeClass("active");
		$(this).css({ "stroke-width":.5, "stroke":"stroke:rgb(40.392157%,40.392157%,40.392157%);"});
		$("#flatlandsEast").css({ "stroke-width":.5, "stroke":"stroke:rgb(40.392157%,40.392157%,40.392157%);"});
	});
	
	$('#flatlandsEast').hover( function() {
		$("#neighborhoodInfo").html("<h2>Flatlands</h2><p>NYT Mentions in "+window.currentYear+": "+window.timesData[window.currentYear]["flatlands"]+"</p>");
		$(this).css({ "stroke-width":2.5, "stroke":"white"});
		$("#flatlands").css({ "stroke-width":2.5, "stroke":"white"});
	}, function() {
		$("#neighborhoodInfo").html("");
		$(this).removeClass("active");
		$(this).css({ "stroke-width":.5, "stroke":"stroke:rgb(40.392157%,40.392157%,40.392157%);"});
		$("#flatlands").css({ "stroke-width":.5, "stroke":"stroke:rgb(40.392157%,40.392157%,40.392157%);"});
	});
	
	displayYearInfo(window.currentYear);
	
}

function animateHeatMap() {
	$("#controller #slider #sliderButton").animate({ top: window.innerHeight-40+"px" },{ 
		duration:8000 , 
		step: function() {
			checkSliderYear() 
		},
		complete: function() {
			$("#neighborhoodText").css("display","block");
			$("#neighborhoodText").animate({ opacity: 1 },1000); 
		}
	});
}

window.onresize = function() {
	resizeMap();
	moveSliderYear();
	if ($(window).width() > 768) { 
		resizeController(); 
	} else {
		clearController();
	}
}

function changeYear(newYear) {
	$("#controller ul li#"+window.currentYear).removeClass("active");
	window.currentYear = newYear;
	heatMap(window.currentYear);
	displayYearInfo(window.currentYear);
	$("#controller ul li#"+window.currentYear).addClass("active");
	if (window.currentYear == 1981) {
		$("ul#swipe li#left").css("opacity", .25);
	} else if (window.currentYear == 2012) {
		$("ul#swipe li#right").css("opacity", .25);
	} else {
		$("ul#swipe li#left").css("opacity", 1);
		$("ul#swipe li#right").css("opacity", 1);
	}
}

function checkSliderYear() {
	var fromTop = parseInt($("#controller #slider #sliderButton").css("top"))+($("#controller #slider #sliderButton").width()/2);
	var yearHeight = $("#controller ul li.active").height();
	var yearNow = 1981+Math.floor(fromTop/yearHeight);
	if (yearNow<1981) {
		yearNow = 1981;
	} else if (yearNow>2012) {
		yearNow = 2012;
	}
	if (yearNow != window.currentYear) {
		changeYear(yearNow);
	}
}

function moveSliderYear() {
	$("#controller #slider #sliderButton").css("top",(window.currentYear-1981)*($("#controller #slider").outerHeight()/32));
	$("#controller #slider").css("background-size","10px "+(window.currentYear-1981)*($("#controller #slider").outerHeight()/32)+"px");
}

function resizeMap() {
	if ($(window).width() < 1200) {
		if ($(window).height() < 600) {
			$("#map svg").css("height",($(window).width()*(5/6))+"px");
		} else {
			$("#map svg").css("height",($(window).width()*(2/3))+"px");
		}
	} else {
		$("#map svg").css("height",(1200*(2/3))+"px");
	}
}

function resizeController() {
	var numberOfItems = 33;
	var theHeight = ($(window).height()-$("#controller h2").outerHeight()-10)/numberOfItems;
	$("#controller #years li").css("height",theHeight+"px");
	$("#controller #years li").css("line-height",theHeight+"px");
	setTimeout( function() { $("#controller #slider").css("height",document.getElementById("years").offsetHeight+"px"); },100);
	$("#controller #years li .totalCircle").css("margin-top",(((window.innerHeight-$("#controller h2").outerHeight())/numberOfItems)-10)/2+"px");
	$("#controller #slider #sliderButton").draggable({
		containment: [0,$("#controller h2").outerHeight(),0,$("#controller #years li#2012").position().top-10],
		axis: "y"
	});
	$("#controller #slider #sliderButton").on( "drag", function( event, ui ) {
		checkSliderYear();
		$("#controller #slider").css("background-size","10px "+($("#controller #slider #sliderButton").position().top-$("#controller #slider #sliderButton").width()-5)+"px"); 
	});
}

function clearController() {
	$("#controller #years li").css("height","15px");
	$("#controller #years li").css("line-height","13px");
	$("#controller #years li .totalCircle").css("margin-top","3px");
}

function heatMap(year) {
	$('.neighborhood').each( function(index,neighborhood) {
		cityID = $(neighborhood).attr("id");
		cityMentions = parseInt(window.timesData[year][cityID]);
		cityMentionsNormalized = Math.round(150*(cityMentions/300));
		$("#"+cityID).css("fill","rgb(0,"+(105+cityMentionsNormalized)+","+(105+cityMentionsNormalized)+")");
		if (cityID == "flatlands") { $("#flatlandsEast").css("fill","rgb(0,"+(105+cityMentionsNormalized)+","+(105+cityMentionsNormalized)+")"); }
	});
}

function displayYearInfo(year) {
	if (year == 1981) {
		$("#neighborhoodText #neighborhoodTextShakers").addClass("invisible");
	} else {
		$("#neighborhoodText #neighborhoodTextShakers").removeClass("invisible");
		getTopShakers(year);
	}
	document.getElementById("neighborhoodTextYear").innerHTML = year;
	$("#neighborhoodText #neighborhoodTextBlurb").html(window.blurbs[String(year)]);
	getTopMentions(year);
}

function getTopMentions(year) {
	var final = "";
	for (var i=0; i<5; i++) {
		final = final + "<li id='"+window.sortedData[year][i]["formattedName"]+"' >"+window.sortedData[year][i]["name"]+" ("+window.sortedData[year][i]["count"]+")</li>"
	}
	document.getElementById("neighborhoodTextMostMentioned").innerHTML = final;
	$("#neighborhoodText #neighborhoodTextMostMentioned li").hover(function() {
		$("#neighborhoodInfo").html("<h2>"+window.cityData[$(this).attr("id")][0]["formattedName"]+"</h2><p>New York Times Article Mentions in "+window.currentYear+": "+window.timesData[window.currentYear][$(this).attr("id")]+"</p>");	
		$("#svgMap #"+$(this).attr("id")).css({ "stroke-width":2.5, "stroke":"white"});
	},function() {
		$("#svgMap #"+$(this).attr("id")).css({ "stroke-width":.5, "stroke":"stroke:rgb(40.392157%,40.392157%,40.392157%);"});
		$("#neighborhoodInfo").html("");
	});
}

function getTopShakers(year) {
	var finalP = "";
	var finalN = "";
	for (var i=0; i<3; i++) {
		if ( window.shakersData[year]["positive"][i]["formattedName"] != undefined ) { finalP = finalP + "<li id='"+window.shakersData[year]["positive"][i]["formattedName"]+"' >"+window.shakersData[year]["positive"][i]["name"]+" (<span class='positive'>"+window.shakersData[year]["positive"][i]["change"]+"</span>,&nbsp;<span class='positive'>"+window.shakersData[year]["positive"][i]["changePercentage"]+"</span>)</li>"; }
	}
	for (var i=0; i<3; i++) {
		if ( window.shakersData[year]["positive"][i]["formattedName"] != undefined ) { finalN = finalN + "<li id='"+window.shakersData[year]["negative"][i]["formattedName"]+"' >"+window.shakersData[year]["negative"][i]["name"]+" (<span class='negative'>"+window.shakersData[year]["negative"][i]["change"]+"</span>,&nbsp;<span class='negative'>"+window.shakersData[year]["negative"][i]["changePercentage"]+"</span>)</li>"; }
	}
	document.getElementById("neighborhoodTextPositive").innerHTML = finalP;
	document.getElementById("neighborhoodTextNegative").innerHTML = finalN;
	$("#neighborhoodText #neighborhoodTextPositive li, #neighborhoodText #neighborhoodTextNegative li").hover(function() {
		$("#svgMap #"+$(this).attr("id")).css({ "stroke-width":2.5, "stroke":"white"});
		$("#neighborhoodInfo").html("<h2>"+window.cityData[$(this).attr("id")][0]["formattedName"]+"</h2><p>New York Times Article Mentions in "+window.currentYear+": "+window.timesData[window.currentYear][$(this).attr("id")]+"</p>");	
	},function() {
		$("#svgMap #"+$(this).attr("id")).css({ "stroke-width":.5, "stroke":"stroke:rgb(40.392157%,40.392157%,40.392157%);"});
		$("#neighborhoodInfo").html("");
	});
}

function animateTotals() {
	var totalMentions = 0;
	var highestMentions = 0;
	for (var year=1981; year<2013; year++) {
		totalMentions = totalMentions+parseInt(window.timesData[year]["total"]);
		if (parseInt(window.timesData[year]["total"])>highestMentions) { highestMentions = parseInt(window.timesData[year]["total"]); }	
	}
	$("#controller #years li span.text").animate({ opacity: 0 },300);
	$("#controller #controllerHeading").animate({ opacity: 0 },300, function() {
	var multFactor = .8/(highestMentions/totalMentions);
	$('.totalCircle').each( function(index,circle) {
		var percentage = multFactor*(parseInt(window.timesData[$(circle).attr("id")]["total"])/totalMentions);
		var mentionsPerDay = Math.round((window.timesData[$(circle).attr("id")]["total"]/365)*10)/10;
		$(this).parent().children('.text').html(mentionsPerDay);
		if ((100-(percentage*100))>80) {
			var effectivePercentage = 80;
		} else if ((100-(percentage*100))<20) {
			var effectivePercentage = 20;
		} else {
			var effectivePercentage = (percentage*100);
		}
		$(circle).animate({ left: effectivePercentage+"%" },1000);
	});
	$("#controller #controllerHeading").text("Total NYT Articles Mentioning Brooklyn Per Day");
	setTimeout(function() {
		$("#controller #controllerHeading").animate({ opacity: 1 },300);
		$("#controller #years li span.text").animate({ opacity: 1 },300);
	},200);
	});
}

function animatePercentages() {
	$("#controller #years li span.text").animate({ opacity: 0 },300);
	$("#controller #controllerHeading").animate({ opacity: 0 },300, function() {
	var highestMentions = 0;
	for (var year=1981; year<2013; year++) {
		if ((parseInt(window.timesData[year]["total"])/parseInt(window.timesData[year]["totalNYT"]))>highestMentions) { highestMentions = (parseInt(window.timesData[year]["total"])/parseInt(window.timesData[year]["totalNYT"])); }	
	}
	$('.totalCircle').each( function(index,circle) {
		var percentage = (parseInt(window.timesData[$(circle).attr("id")]["total"])/parseInt(window.timesData[$(circle).attr("id")]["totalNYT"]))/highestMentions;
		var finalPercentage = (Math.round(parseInt(window.timesData[$(circle).attr("id")]["total"])/parseInt(window.timesData[$(circle).attr("id")]["totalNYT"])*1000)/10)+"%";
		$(this).parent().children('.text').html(finalPercentage);
		if ((percentage*100)>80) {
			var effectivePercentage = 80;
		} else if ((percentage*100)<20) {
			var effectivePercentage = 20;
		} else {
			var effectivePercentage = (percentage*100);
		}
		$(circle).animate({ left: effectivePercentage+"%" },1000);
	});
	$("#controller #controllerHeading").text("Percentage of All NYT Articles That Mention Brooklyn");
	setTimeout(function() {	
		$("#controller #controllerHeading").animate({ opacity: 1 },300);
		$("#controller #years li span.text").animate({ opacity: 1 },300);
	},200);
	});
}

function curtainOpen() {
	$(".curtains #interactive").css("display","block");
	$(".curtains #cover").animate({ top : -30-window.innerHeight }, {
		duration: 1000,
		complete : function() {
			if (window.innerWidth > 768) { resizeController(); } 
			$(this).css("display","none");
			animatePercentages();
			$("#controller").animate({ opacity: 1 },300);
		}
	});
}

function swipeYear(delta) {
	if (window.currentYear == 1981 && delta == -1) {
		delta = 0;
	} else if (window.currentYear == 2012 && delta == 1) {
		delta = 0;
	}
	changeYear(parseInt(window.currentYear)+delta);
	$("#controller #slider #sliderButton").animate({ top : ($("#controller ul li.active").height()*(window.currentYear-1981))+(($("#controller ul li.active").height()-$("#controller #slider #sliderButton").width())/2)+"px" }, {
		duration: 500,
		complete : function() { 
			$("#controller #slider").css("background-size","10px "+($("#controller #slider #sliderButton").position().top-$("#controller #slider #sliderButton").width()-5)+"px"); 
		}
	});
}

function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
}

function sortObject(data) {
	var newData = {};
	var lowest = 0;
	var highest;
	var index = 0;
	for (var t in data) {
		if (index < (countProperties(data)-1)) {
		if (index == 0) {
			for (var i in data) {
				if (lowest < data[i] ) { 
					lowest = data[i];
					var name = i;
				}
			}
		} else {
			highest = 0;
			for (var z in data) {
				if (lowest > data[z] && data[z] >= highest ) { 
					highest = data[z];
					var name=z;
				}
			}
			if (lowest < 1000) { lowest = highest;}
		}
		index++;
		} else {
			lowest = 1000;
			for (var q in data) {
				if (lowest > data[q]) { 
					lowest = data[q];
					var name = q;
				}
			}
		}
		newData[name] = lowest;
	}
	return newData;
}

function countProperties(obj) {
	var count = 0;
    for (var prop in obj) {
		if ( obj.hasOwnProperty(prop) ) { ++count; }
    }
    return count;
}