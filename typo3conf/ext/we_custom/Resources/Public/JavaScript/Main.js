jQuery( document ).ready(function() {
});

if(jQuery('#locations-list').length) {
	var map;
	var marker;
	var infowindow;
	var mapLocations = jQuery('#locations-list .location-item');
	var defaultZoomLever = parseInt(jQuery('#locations-list #defaultZoomlevel').val());
	var defaultMapCenter = jQuery('#defaultMapCenter').val();
	var setCenterToFirstItem = jQuery('#setCenterToFirstItem').val();
	function initialize() {
		i = 0;
		getLatLong = defaultMapCenter;
		if (mapLocations.length > 0 && setCenterToFirstItem == '1') {
			getLatLong = jQuery(mapLocations[i]).children('.latlng').val();
		}
		console.log(getLatLong);
		latlng = getLatLong.split(",");
		var mapOptions = {
			zoom : defaultZoomLever,
			center : new google.maps.LatLng(parseFloat(latlng[0]), parseFloat(latlng[1])),
			mapTypeId : google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		for (i = 0; i < mapLocations.length; i++) {
			getLatLong = jQuery(mapLocations[i]).children('.latlng').val();
			latlng = getLatLong.split(",");
			marker = new google.maps.Marker({
				position : new google.maps.LatLng(parseFloat(latlng[0]), parseFloat(latlng[1])),
				map : map,
				animation: google.maps.Animation.DROP
			});
			inforBoxOnMap(marker, i);
		}
	}
	function inforBoxOnMap(marker, num) {
		if (num == 0) {
			infowindow = new google.maps.InfoWindow({
				content: jQuery(mapLocations[num]).children('.contact').html()
			});
			infowindow.open(marker.get('map'), marker);
		}
		google.maps.event.addListener(marker, 'click', function() {
			zoom = jQuery(mapLocations[num]).children('.zoomlevel').val() * 1;
			if ( zoom ) {
				defaultZoomLever = zoom;
			}
			marker.setAnimation(google.maps.Animation.DROP);
			map.setCenter(marker.getPosition());
			map.setZoom(defaultZoomLever);
			infowindow.setContent(jQuery(mapLocations[num]).children('.contact').html());
			infowindow.open(marker.get('map'), marker);
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);
}