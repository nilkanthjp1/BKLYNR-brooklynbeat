window.neighborhoodsName = ["bedfordStuyvesant","brownsville","bergenBeach","flatlands","cypressHills","clintonHill","fortGreene","williamsburg","brooklynHeights","dumbo","redHook","parkSlope","midwood","greenwoodCemetary","greenpoint","prospectHeights","flatbush","eastNewYork","dykerHeights","downtownBrooklyn","coneyIsland","carrollGardens","gowanus","canarsie","bushwick","cobbleHill","boroughPark","boerumHill","bensonhurst","bayRidge","sheepsheadBay","crownHeights","sunsetPark","windsorTerrace","brightonBeach","seagate","cityLine","leffertsGardens","ditmasPark","kensington","marinePark","gravesend","navyYard","bathBeach","manhattanBeach","gerritsenBeach","millBasin","vinegarHill"];
window.year = 1981;
window.finalHTML = "";
$.getJSON('./data/totals/combined.json', function(data) {
	console.log(data);
	for (var i=0;i<countProperties(data);i++) {
		var dataset = data[(window.year+i)];
		var currentHTML = "<ul class='year' id='"+(window.year+i)+"'><li><b>"+(window.year+i)+"</b></li>"
		for (var t=0;t<window.neighborhoodsName.length;t++) {
			currentHTML = currentHTML + "<li>" + dataset[window.neighborhoodsName[t]] + "</li>";
		}
		window.finalHTML = window.finalHTML + currentHTML + "</ul>";
	}
});

window.onload = function() {
	
	setTimeout(function() { document.getElementById("landing").innerHTML = document.getElementById("landing").innerHTML + window.finalHTML; },200);

}

function countProperties(obj) {
    var count = 0;

    for(var prop in obj) {
        if(obj.hasOwnProperty(prop))
            ++count;
    }

    return count;
}