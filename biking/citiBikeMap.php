<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title></title>

	<meta name="author" content="Thomas Rhiel" />
	<meta name="description" content="In-depth stories about Brooklyn — all of Brooklyn." />
	<meta name="robots" content="index, follow" />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
	
	<!-- Web app-able -->
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
	
	<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		
	<!-- TYPEKIT -->
	<script type="text/javascript" src="//use.typekit.net/zso2ovy.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	<!-- TINYPASS -->
	<script type="text/javascript" src="https://code.tinypass.com/tinypass.js"></script>
	
	<!-- GOOGLE ANALYTICS -->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-38635212-1']);
	  _gaq.push(['_setDomainName', 'bklynr.com']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>

		
<script>

	// clicks Sign In link
	$(".subscribeButtonInsetSignInLink_theActualLink").click(function(){
	   // trigger second button ?
	   $(".tp_login_click").click();
	});	

</script>		
	
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
	
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

<link href='http://api.tiles.mapbox.com/mapbox.js/v1.0.2/mapbox.css' rel='stylesheet' />
<script src='http://api.tiles.mapbox.com/mapbox.js/v1.0.2/mapbox.js'></script>
						
<style>	


/*	BUTTON STUFF	*/

.cf:before,
.cf:after {
    content: " "; /* 1 */
    display: table; /* 2 */
}

.cf:after {
    clear: both;
}

/**
 * For IE 6/7 only
 * Include this rule to trigger hasLayout and contain floats.
 */
.cf {
    *zoom: 1;
}

.tinyPassButtonBox {
	display: none;
}


.subscribeButtonInset {
	padding: 1.25em 1.25em 1em 1.25em;
	background: #f0f0f0; /* Old browsers */
	background: -moz-linear-gradient(top, #f0f0f0 0%, rgb(250, 250, 250) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f0f0f0), color-stop(100%,rgb(250, 250, 250))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #f0f0f0 0%,rgb(250, 250, 250) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #f0f0f0 0%,rgb(250, 250, 250) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #f0f0f0 0%,rgb(250, 250, 250) 100%); /* IE10+ */
	background: linear-gradient(to bottom, #f0f0f0 0%,rgb(250, 250, 250) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f0f0f0', endColorstr='rgb(250, 250, 250)',GradientType=0 ); /* IE6-9 */
	border-radius: 6px;
	box-shadow: inset 0px 1px 10px rgb(225,225,225), inset 0px -1px 1px rgb(255,255,255) ;
	border:	1px solid rgba(100,100,100,0.125);
	border-bottom: 1px solid rgba(150,150,150,0.1);
	
	width: 33%;
	float: right;
	margin-top: 0.5em;
	margin-left: 1.25em;
	margin-bottom: 0.75em;
}

.newSubscribeButton {
	margin-top: 0em;
	margin-bottom: 8px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	background: rgb(85,125,177); /* Old browsers */
	background: -moz-linear-gradient(top, rgba(85,125,177,1) 0%, rgba(32,88,139,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(85,125,177,1)), color-stop(100%,rgba(32,88,139,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, rgba(85,125,177,1) 0%,rgba(32,88,139,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, rgba(85,125,177,1) 0%,rgba(32,88,139,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, rgba(85,125,177,1) 0%,rgba(32,88,139,1) 100%); /* IE10+ */
	background: linear-gradient(to bottom, rgba(85,125,177,1) 0%,rgba(32,88,139,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#557db1', endColorstr='#20588b',GradientType=0 ); /* IE6-9 */	
	padding: 1.5em 1em;
	text-align: center;
	font-size: 1.5em;
	box-shadow: 0px 5px 10px rgba(100,100,100,0.5), inset 0 1px 0px rgba(250,250,250,0.25);
	border-radius: 2px;
	border: 1px solid rgb(104,104,104);
	
	float: left;
	width: 100%;
	color: whitesmoke !important;
	-webkit-font-smoothing: antialiased;
}

a.newSubscribeButton:visited {
	color: whitesmoke !important;
}

.lastNewSubscribeButton {
	margin-right: 0;
}

.newSubscribeButton:hover {
	opacity: 0.925;
	cursor: pointer;
}

.newSubscribeButton span {
	display: block;
	font-size: 0.75em;
	font-weight: 500;
	opacity: 0.65;
	margin-top: 0.125em;
}

.subscribeButtonInset p {
	float: right;
	margin-top: 10px;
	font-family: "proxima-nova", "helvetica neue", helvetica, arial !important;
	text-align: center;
	font-size: 0.9em !important;
	color: rgb(104,104,104);
	-webkit-font-smoothing: antialiased;
	width: 100%;
}

.subscribeButtonInset .subscribeButtonInsetSignInLink {
	text-indent: 0 !important;
	border-top: 1px solid rgb(220,220,220);
	padding-top: 10px;
}

.subscribeButtonInset .subscribeButtonInsetSignInLink a, .subscribeButtonInset .subscribeButtonInsetSignInLink a:visited {
	color: rgba(85,125,177,1) !important;
	cursor: pointer;
}

@media only screen and (max-width: 850px) {

	.newSubscribeButton {
			font-size: 1.25em;
	}
}

@media only screen and (max-width: 767px) {

	.subscribeButtonInset {
		width: 100%;
		box-sizing: border-box;
		-moz-box-sizing: border-box;
	}
	
}


/* NEEL STYLES */


/* special styling to add to map when you want it to be blurred */

body #map.blur {
	-webkit-filter: blur(5px);
	filter: blur(5px);
	opacity:.5
;	-webkit-opacity:.5;
	width:140%;
	height:140%;
	margin:-10px;
}

/* BKLYNR logo and issue styline */

#articleLogoDiv {
	text-align: center;
	margin-left: auto;
	margin-right: auto;	
}
#articleLogoSpan {
	display: inline-block;
	padding: 10px 12px 12px;
	border-radius: 5px;
	-webkit-font-smoothing: antialiased;
	color:gray;
}
h1#articleLogo {
	margin:0;
}
h1#articleLogo a {
	font-family: quatro, "Helvetica Neue", Helvetica, Arial, sans-serif;
	color:gray;
}
p.issueAndIssueDate {
	margin-bottom:0;
}
p.issueAndIssueDate a {
	font-family: "proxima-nova", "Arial Narrow", sans-serif;
	color:gray;
}

/* Citibike station popup info styling */

.citibikeStationInfo h1 {
	margin:0;
	padding:0;
	font-size:14px;
}
.citibikeStationInfo p.citibikeStationBikes {
	font-family: "proxima-nova", "Arial Narrow", sans-serif;
	padding:0;
	margin:0;
}
	
/* infographic styling */

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
    }
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
    }
body {
	line-height: 1;
	overflow: hidden;
    }
ol, ul {
	list-style: none;
    }
blockquote, q {
	quotes: none;
    }
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
    }
table {
	border-collapse: collapse;
	border-spacing: 0;
    }

/* Typography */

body,
input,
textarea {
    font: 16px/22px 'adobe-text-pro', sans-serif;
    color: #333;
    -webkit-font-smoothing: antialiased;
    }

pre,
code { font:normal 12px/20px monospace; }

h1, h2, h3, h4, h5, h6 { 
    margin: 0;
    }
    
h1, h2 {
    font-family: "proxima-nova", "Arial Narrow", sans-serif;
    line-height: 1em;
    font-size: 2em;
    font-weight:800;
    padding-top:20px;
    }

h2 {
	font-size:1em;
	margin-bottom:20px;
	padding:0;
	font-weight:600;
}

a {
    color:#369;
    text-decoration:none;
    }

/* Layout */

h1 {
    display: block;
    margin: 10px 0;
    }

p {
    margin-bottom: 20px;
    }

body > div {
    position: relative;
    z-index: 1;
    }

.map {
    position: absolute;
    height: 100%;
    width: 100%;
    z-index: 0;
    }


#content {
	position: absolute;
    height: 100%;
    min-height: 725px;
	width: 310px;
	top: 0px;
	left:0px;
    background: rgb(255,255,255); /* old ie */
    background: rgba(255,255,255,1);
    border-bottom: 1px solid #ccc;
    overflow: scroll;
    z-index: 2;
    }

.footer {
	position: absolute;
	bottom: 4px;
	font-family: "proxima-nova", helvetica, arial, sans-serif;
	font-weight: 600;
	font-size: 0.85em;
	line-height: 1.2em;
	padding-right: 20px;
}
    
#about {
    float: left;
    padding: 0 20px;
    border-left: 1px solid #bbb;
    }
    
.layers {
    position: absolute;
    width: 120px;
    right: 50px;
    top: 70px;
    }
    
.layers a {
    padding: 10px;
    margin: 1px 0;
    border-left: 5px solid #fff;
    background: white;
    color: #333;
    }
 
 .layers a#deaths {
 	margin-bottom:25px;
 }
 
.layers a:hover {
    border-left: 5px solid #333;
}
    
.layers a.active {
    border-left: 5px solid #333;
    background: #16BBCC;
    color: white;
}

.layers a#bikeLanes.active {
	background: #6C8C26;
}

.layers a#deaths.active {
	background: #D91818;
}

.layers a#injuries.active {
	background: #F2A71B;
}

.layers a#heatmap.active {
	background: purple;
}

.layers a:hover {
    border-left: 5px solid #333;
}
    
.layers a {
	font: 1em/1.5em "proxima-nova",  "Arial Narrow", sans-serif;
    width: 133px;
    float: left;
    margin-right: 40px;
    font-weight:800;
    }

#search {
    height: 30px;
    margin-bottom: 20px;
    }

form.geocode input[type=text] {
    font-size: .85em;
    color: #333;
    height: 18px;
    width: 200px;
    display: block;
    float: left;
    padding: 5px;
    margin: 0;
    border: 1px solid  #ccc;
    }
    
form.geocode input[type=submit] {
    background: #2da0ef url(../img/search.png) no-repeat -0px -0px;
    text-indent: -9999px;
    width: 30px;
    height: 30px;
    display: block;
    border: none;
    margin: 0;
    padding: 0;
    float: left;
    cursor: pointer;
    }
    
    form.geocode input[type=submit]:hover { background-color:#333; }
	form.geocode input[type=submit]:active { background-color:#000; }
	
form.geocode.loading input[type=submit] {
    background: url(img/ajax-loader.gif) no-repeat 50% 50%;
    border-color:#bbb;
    background-color:#ddd;
    box-shadow:inset rgba(0,0,0,0.1) 0px 1px 3px;
    -moz-box-shadow:inset rgba(0,0,0,0.1) 0px 1px 3px;
    -webkit-box-shadow:inset rgba(0,0,0,0.1) 0px 1px 3px;
    }
    
#geocode-error {
    display: none;
    float: left;
    position: relative;
    top: 1em;
    color: black;
    font-size: 1em;
    line-height: 0em;
    font: .9em/1.5em 'proxima-nova', sans-serif;
    font-weight:800;
    text-align:left;
    }
    
a.zoomer {
	position: absolute;
    top: 20px;
    right:50px;
    }
a.zoomin {
	right:20px;
}

/* Map */

#map-ui li {
	list-style:none;
}

.map-legends {
	display:none;
    }
    
.map-legends a {
    color: rgb(51, 51, 51);
    }

.map-legends .map-legend {
    width: 275px;
    }

.map-legends .scale img { 
    float: left; 
    }

.map-legend {
    padding: 10px;
    }

.map-legend .scale {
    width: 100%;
    margin-bottom: 0;
    }
.map-legend > div {
    clear: both;
    } 
.map-legend .scale span {
    display: block;
    width: 30px;
    float: left;
    text-align: center;
    font-size: 9px;
    }

.map-legends .scale label {
    display: block;
    margin-bottom: 5px;
    }

.map-legend .scale > div {
    }

.map-attribution {
    bottom: 205px;
    }

.wax-share h3 {
    margin: 0px 0px 10px;
    font-size: 16px;
    font-weight: normal;
    }

.wax-share strong {
    font-weight: 700;
    }

.wax-share small {
    font-size: 11px;
    color: #999;
    display: block;
    margin-top: 0.5em;
    }

.share {
    top: 45px;
    z-index: 2;
    }
    
.mmg-default {
    width: 20px;
    height: 40px;
    background: url(../img/map.png) -120px -30px;
    left: -10px;
    top: -30px;
    }
    
/* embed */

.embed .map {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: white;
    z-index: 1000;
    }

.embed #header, .embed #content {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 10001;
    visibility: hidden;
    overflow: hidden;
    }

.embed a.zoomer {
    top: 10px;
    }

.embed .map-tooltip {
    top: 10px;
    right: 10px;
    }

.embed .map-legends {
    right: 10px;
    bottom: 10px;
    }

.embed .share {
    top: 45px;
    z-index: 1001;
    }

.embed .layers {
    position: absolute	;
    top: 90px;
    left: 0;
    z-index: 1001;
    visibility: visible;
    }

.embed .layer {
    width: 100px;
    text-align: center;
    border: 1px solid #ccc;
    }

/* Animation */

.map-tile-loaded {
    -webkit-animation-name:               fade-in;
    -moz-animation-name:                  fade-in;
    -ms-animation-name:                   fade-in;
    -o-animation-name:                    fade-in;
    -webkit-animation-timing-function:    linear;
    -moz-animation-timing-function:       linear;
    -ms-animation-timing-function:        linear;
    -o-animation-timing-function:         linear;
    -webkit-animation-duration:           .2s;
    -moz-animation-duration:              .2s;
    -ms-animation-duration:               .2s;
    -o-animation-duration:                .2s;
}

@-webkit-keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }
@-moz-keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }
@-ms-keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }
@-o-keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }

@media (max-width : 768px) {
	#content {
		width:100%;
		position:relative;
		min-height: 0;
	}
	
	.footer {
	position: relative;

}
	#map-ui {
		position:relative;
		top:15px;
		left:5px;
	}
	#map-ui li {
		font-size:.8em;
	}
	#map-ui a {
		padding:5px;
	}
	#map-ui #citibikeStations {
		margin-bottom:0px;
	}
}

@media (max-device-width : 480px) {
/* Styles */
}

@media (max-device-width : 320px) {
/* Styles */
}


</style>

</head>

  <body data-map="map">
    <div id="content">

      <div id="about">
      	<div id="articleLogoDiv">
      		<span id="articleLogoSpan">
				<h1 id="articleLogo"><a href="/">BKLYNR</a></h1>	
				<p class="issueAndIssueDate"><a href="http://bklynr.com/issues/issue-5/">Issue 5 | June 6, 2013</a></p>	
			</span>
		</div>
        <h1>Mean Streets</h1>
        <h2>An interactive map by <a href="http://www.nilkanthpatel.com">Nilkanth Patel</a>.</h2>
        <p>Since the recent arrival of the city's bike share program, more Brooklynites are taking to two wheels, but not all journeys are equally safe. To figure out which roadways are most dangerous to cyclists, we’ve compiled all the data publicly available from <a href="http://www.nyc.gov/html/nypd/html/traffic_reports/motor_vehicle_accident_data.shtml" target="_blank">NYPD vehicle accident reports</a> that indicate the locations of incidents involving cyclists and other vehicles. Before you hop on a bike, it’s worth taking a look at our&nbsp;map.</p>
        <p>The heat map indicates where the greatest number of accidents have occurred. You can also choose to see the specific locations of cycling injuries or deaths, as well as bike lanes and Citi Bike stations. (Click a Citi Bike station to see how many bikes are currently available&nbsp;there.) </p>

		<p class="footer">NYPD vehicle accident report data spans the period from August 2011 to April 2013.</p>

      </div>
    </div>

    <div id="map-ui" class="layers" data-control="switcher"></div>

    <div id="map" class="map">
    </div>

<script>
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
ui.appendChild(item);

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
		for (var i=0; i<300; i++) { 
			
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
    ui.appendChild(item);
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
z
        if (map.hasLayer(layer)) {
            map.removeLayer(layer);
            this.className = '';
        } else {
            map.addLayer(layer);
            this.className = 'active';
        }
    };

    item.appendChild(link);
    ui.appendChild(item);
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
</script>
  </body>
</html>