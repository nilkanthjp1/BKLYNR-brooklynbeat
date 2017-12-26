window.onload = function() {
	finalHTML="";
	for (var y=1998; y<2013; y++) {	
		finalHTML = finalHTML+'<div class="yearBreakdown" id="'+y+'"><h1>'+y+'</h1><div class="low"><div class="lowGraph"></div></div><div class="avg"><div class="avgGraph"></div></div><div class="high"><div class="highGraph"></div></div></div>';
	}
	document.getElementById("pg").innerHTML = finalHTML;
	document.getElementById("sg").innerHTML = finalHTML;
	document.getElementById("sf").innerHTML = finalHTML;
	document.getElementById("pf").innerHTML = finalHTML;
	document.getElementById("c").innerHTML = finalHTML;
}

$.ajax({
	type: "GET",
	url: "./php/data/yearlyAvg.json",
}).done(function( data ) {
	for (var y=1998; y<2013; y++) {	
		
		//pg data
		$("#pg #"+y+" .lowGraph").css("height",Math.round(data[y]["low"]["pgAvg"]/6000000*100)+"%");
		$("#pg #"+y+" .highGraph").css("height",Math.round(data[y]["high"]["pgAvg"]/6000000*100)+"%");
		$("#pg #"+y+" .avgGraph").css("height",Math.round(data[y]["avg"]["pgAvg"]/6000000*100)+"%");
		
		$("#sg #"+y+" .lowGraph").css("height",Math.round(data[y]["low"]["sgAvg"]/6000000*100)+"%");
		$("#sg #"+y+" .highGraph").css("height",Math.round(data[y]["high"]["sgAvg"]/6000000*100)+"%");
		$("#sg #"+y+" .avgGraph").css("height",Math.round(data[y]["avg"]["sgAvg"]/6000000*100)+"%");
		
		$("#sf #"+y+" .lowGraph").css("height",Math.round(data[y]["low"]["sfAvg"]/6000000*100)+"%");
		$("#sf #"+y+" .highGraph").css("height",Math.round(data[y]["high"]["sfAvg"]/6000000*100)+"%");
		$("#sf #"+y+" .avgGraph").css("height",Math.round(data[y]["avg"]["sfAvg"]/6000000*100)+"%");
		
		$("#pf #"+y+" .lowGraph").css("height",Math.round(data[y]["low"]["pfAvg"]/6000000*100)+"%");
		$("#pf #"+y+" .highGraph").css("height",Math.round(data[y]["high"]["pfAvg"]/6000000*100)+"%");
		$("#pf #"+y+" .avgGraph").css("height",Math.round(data[y]["avg"]["pfAvg"]/6000000*100)+"%");
		
		$("#c #"+y+" .lowGraph").css("height",Math.round(data[y]["low"]["cAvg"]/6000000*100)+"%");
		$("#c #"+y+" .highGraph").css("height",Math.round(data[y]["high"]["cAvg"]/6000000*100)+"%");
		$("#c #"+y+" .avgGraph").css("height",Math.round(data[y]["avg"]["cAvg"]/6000000*100)+"%");
				
	}
	
});
