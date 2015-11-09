var globals = {};

function createMap(myLat, myLong){
	L.mapbox.accessToken = 'pk.eyJ1IjoidG1rIiwiYSI6ImNpZ2pudnlqdzAwNTF2MWx6YnVoZ3cxazEifQ.VZcmbaEEvr4rM_4M08L_mg';

	var map = L.mapbox.map('map', 'mapbox.streets')
	.setView([myLat, myLong], 14);

	//marking user location
	L.marker([myLat, myLong], {
	    icon: L.mapbox.marker.icon({
	        'marker-size': 'small',
	        'marker-symbol': 'circle-stroked',
	        'marker-color': '#ff8125'
	    })
	}).addTo(map);

	//Marking walking distance
	var circle_options = {
	    color: '#000',  
	    opacity: 0.24,    
	    weight: 3,        
	    fillColor: '#000',  
	    fillOpacity: 0    
	};

	var circleMarker= {};

	circleMarker.fiveMin = L.circle([myLat, myLong], 256, circle_options).addTo(map);
	circleMarker.fifteenMin = L.circle([myLat, myLong], 768, circle_options).addTo(map);
}

function initMap() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(setPosition);
    } 
    else {
        alert("Geolocation is not supported by this browser.");
    }
}
function setPosition(position) {

	globals.myPos = {
		myLat: position.coords.latitude,
		myLong: position.coords.longitude,
	};

	createMap(globals.myPos.myLat, globals.myPos.myLong);
}

$(document).ready(function($) {

	initMap();
	
	//Drawing fine me button
	var topLeftLeaflet = $("#map").find(".leaflet-top .leaflet-right");
	var button = '<button id="mapCenterMe" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>';

	topLeftLeaflet.append(button);
});
	

