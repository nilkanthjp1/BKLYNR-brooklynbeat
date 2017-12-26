var map = L.mapbox.map('map', 'nilo89.map-ahycheim', { 
		zoomControl: false,
		minZoom: 12,
		maxZoom: 16,
		maxBounds: L.LatLngBounds([40.5487,-74.151],[40.8487,-73.751])
	}).setView([40.6487,-73.951], 12)
    .addLayer(L.mapbox.tileLayer('', {
        detectRetina: true,
        retinaVersion: 'nilo89.map-uiq0qu79'
    }));
var ui = document.getElementById('map-ui');

new L.Control.Zoom({ position: 'topright' }).addTo(map);

window.firstLoad = true;
addHeatmap(L.mapbox.tileLayer('nilo89.bike_injuries_heat_map', {zIndex: 3, opacity:.5, updateWhenIdle: true}), 'Heatmap', 'heatmap');
addLayer(L.mapbox.tileLayer('nilo89.citiinjuries', {zIndex: 3}), 'Injuries', 'injuries');
addLayer(L.mapbox.tileLayer('nilo89.deaths', {zIndex: 3}), 'Deaths', 'deaths');
addLayer(L.mapbox.tileLayer('nilo89.nyc_bike_lanes', {zIndex: 2}), 'Bike Lanes', 'bikeLanes');

$("#injuries").removeClass("active");
$("#deaths").removeClass("active");
$("#bikeLanes").removeClass("active");

var item = document.createElement('li');
var link = document.createElement('a');

link.href = '#';
link.id = "citibikeStations";
link.innerHTML = "Citi Bike Stations";

$(document).ready( function() {
$("#map-ui #citibikeStations").click(function() {
	loadCitibike();
});
})

item.appendChild(link);
ui.insertBefore(item);

$.ajax({
	type: "GET",
	url: "./php/getcitibikedata.php",
}).done(function( data ) {
	window.citibikeData = $.parseJSON(data);
});

window.markers = new Array();

function loadCitibike() {
	if (window.markers.length > 1) {
		removeMarkers();
		$("#citibikeStations").removeClass("active");
	} else {
		for (var i=0; i<200; i++) { 
			var marker = L.marker( [window.citibikeData["stationBeanList"][i]["latitude"],window.citibikeData["stationBeanList"][i]["longitude"]] , {
    			icon: L.icon({
       				iconUrl: './img/citibike.png',
        			iconSize:     [10, 10],
        			iconAnchor:   [5, 5],
        			popupAnchor:  [0, -5],
        			shadowSize: [68, 95],
        			shadowAnchor: [22, 94]
    				}), 
    			title: window.citibikeData["stationBeanList"][i]["stationName"]
    		});
    		marker.bindPopup( "<span class='citibikeStationInfo'><h1>"+window.citibikeData["stationBeanList"][i]["stationName"]+"</h1><p class='citibikeStationBikes'>Available bikes: "+window.citibikeData['stationBeanList'][i]['availableBikes']+"</p></span>" , {
    			closeButton: false
    		}).addTo(markerLayer);
    		window.markers.push(marker);
		}
		$("#citibikeStations").addClass("active");
	}
}

var markerLayer = L.mapbox.markerLayer()
    .addTo(map);

function removeMarkers() {
	for (var i=0; i<window.markers.length; i++) {
		map.removeLayer(window.markers[i]);
	}
	window.markers = new Array;
}

function addLayer(layer, name, elementId) {
	if (window.firstLoad != true) {
    	layer.addTo(map);
    }

    // Create a simple layer switcher that toggles layers on
    // and off.
    var item = document.createElement('li');
    var link = document.createElement('a');

    link.href = '#';
    link.className = 'active';
    link.id = elementId;
    link.innerHTML = name;

    link.onclick = function(e) {
        e.preventDefault();
        e.stopPropagation();

        if (map.hasLayer(layer)) {
            map.removeLayer(layer);
            this.className = '';
        } else {
            map.addLayer(layer);
            this.className = 'active';
        }
    };

    item.appendChild(link);
    ui.insertBefore(item);
}

function addHeatmap(layer, name, elementId) {
    layer.addTo(map);

    // Create a simple layer switcher that toggles layers on
    // and off.
    var item = document.createElement('li');
    var link = document.createElement('a');

    link.href = '#';
    link.className = 'active';
    link.id = elementId;
    link.innerHTML = name;

    link.onclick = function(e) {
        e.preventDefault();
        e.stopPropagation();

        if (map.hasLayer(layer)) {
            map.removeLayer(layer);
            this.className = '';
        } else {
            map.addLayer(layer);
            this.className = 'active';
        }
    };

    item.appendChild(link);
    ui.insertBefore(item);
}

/*

.getLayerAt(0).named('base')
.getLayerAt(1).named('citibike')
.disableLayer('citibike');
.getLayer('base').composite(false)
.setZoomRange(11, 16)

L.mapbox.markerLayer({
			type: 'Feature',
			geometry: {
			type: 'Point',
			coordinates: [window.citibikeData["stationBeanList"][i]["longitude"],window.citibikeData["stationBeanList"][i]["latitude"]]
		}, properties: {
			title: window.citibikeData["stationBeanList"][i]["stationName"],
			description: 'Available bikes: '+window.citibikeData["stationBeanList"][i]["availableBikes"],
			'marker-size': 'small',
			'marker-color': '#0F808C'
		} }).addTo(map);

*/