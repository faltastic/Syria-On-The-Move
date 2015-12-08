/**
 * WIP !
 */

var legendkeys = [];

var map = L.map('map', {
	scrollWheelZoom: false,
	center: [14.0, 14.0],
	zoom: 6,
	attributionControl: false
});

var photoLayer = L.photo.cluster().on('click', function(evt) {
	var photo = evt.layer.photo,
		template = '<img src="{url}"/></a><p>{caption}</p>';

	// Portrait vs Landscape
	var photoWidth = window.innerWidth / 2; // for landscape photos

	if (photo.width < photo.height) {
		photoWidth = window.innerWidth / 4; // for portrait photos
	}
	if (window.innerWidth < 500) {
		photoWidth = window.innerWidth / 1.25; // landscape on mobile screens

		if (photo.width < photo.height) {
			photoWidth = window.innerWidth / 1.5; // portrait on mobile screens
		}
	}

	// console.log("original w = " + photo.width + " show w = " + photoWidth);

	var photoHeight = photoWidth * (photo.height / photo.width);

	evt.layer.bindPopup(L.Util.template(template, photo), {
		className: 'leaflet-popup-photo',
		minWidth: photoWidth // was 500
	}).openPopup()
});

map.on('popupopen', function(e) {
	var px = map.project(e.popup._latlng); // find the pixel location on the map where the popup anchor is
	px.y -= 200;
	// was px.y -= (e.popup._container.clientHeight)/2;
	// find the height of the popup container, divide by 2, subtract from the Y axis of marker location
	// doesn't work so -200 pixels

	map.panTo(map.unproject(px), {
		animate: true
	}); // pan to new center
});



reqwest({
	url: '/map/13/49',
	success: function(data) {
		for (var i = 0; i < data.length; i++) {
			data[i].thumbnail = data[i].thumbnail;
			data[i].url = data[i].url;

			legendkeys.push({
				coordinates: [data[i].lat, data[i].lng, 30],
				text: data[i].id,
				thumbnail: data[i].thumbnail
			});
		}

		////////////////////////////////////////
		// add everything to map
		//////////////////////////////////////

		var legend1 = {
			title: "Feautred",
			description: "Thumbails",
			//displayPopup: false,
			sections: [{
				title: 'ALL',
				className: 'roads',
				keys: legendkeys
			}]
		};

		var layer = new
			L.tileLayer(
			'http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
				legend: legend1,
				openLegendOnLoad: false,
				attribution: '&copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
			});


		map.addLayer(layer);

		var legendControl = (new L.Control.TileLegend()).addTo(map);

		console.log(data);

		photoLayer.add(data).addTo(map);
		map.fitBounds(photoLayer.getBounds());
	}
});

//# sourceMappingURL=map.js.map
