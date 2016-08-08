var map;
function initialize() {
	var myImg = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADMAAABCCAMAAADNAR58AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAADNQTFRFAAAA8ZsZ8ZsZ8ZsZ8ZsZ8ZsZ8ZsZ8ZsZ8ZsZ8ZsZ8ZsZ8ZsZ8ZsZ8ZsZ8ZsZ8ZsZ8ZsZYHuIUwAAABB0Uk5TABAgMEBQYHCAj5+vv8/f7yMagooAAAHKSURBVEjHlVbZgsQgCANrrW09+P+v3Yc5tkZBh7exE5GQoESPSKLFRUrsoodXMEUO5UuUpH3I2gm4Shitu6oegChI4cHyJTfpkST2i17EGZjh5+FG9jGUAzc0QLlcxsRYtKoNaNoXgOdtivFSuSnwonk0NMEORORCjDHg4pPvBELj8yXMGrHq+8FzC8lfOWce880FmM8PDyToYu4yvn8/IwANR1cZEVFtMHnE9w1C28ChDLI7iTwKzZuu5iqOMgrNxlCURLWQjQFRsRQ6MA+3kNrJeycqqJurwZw4NRIReTSoe5Ldb7i9+uTQs/+QDYu93nJFv+2fTAVdlT95YzfY+EgiktAMFL4G4I5vdY6UBzwuYZoD5coLkLZwvzgPGoLvpblzGmmV+YYFxIU5ijcal+m8LoNbaXYv+CkrENuwYD+559xy9snJnS47LppQovE+CL/u5qr6cqBdkd1tVEppKDub0XEXSrU6R+eg2GOiEK4dDXPn95tess9ckkEkfsFZ+B9bukPZBRzYc9kNOFHEFU3ulWHhfhgtKLtkCQ1l503Njodstp2me0z3oCo7t3rFPFp5rxPwfQyZTlPe4NX9iKFr8e5rH4sqz39FGB8xsb4ByQAAAABJRU5ErkJggg==';
	var styles = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#5dff00"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#0f252e"},{"lightness":17}]}];
	var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});
	var myLatlng = new google.maps.LatLng(49.796302,24.0687144);
	var image = myImg.replace("image/png", "image/octet-stream");
	var mapOptions = {
		disableDefaultUI: true,
		zoom: 17,
		center: myLatlng,
		scrollwheel: false,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.SMALL,
			position: google.maps.ControlPosition.RIGHT_TOP
		}
	};
	map = new google.maps.Map(document.getElementById('map'),mapOptions);
	map.mapTypes.set('map_style', styledMap);
	map.setMapTypeId('map_style');
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		icon: image
	});
	var latlng = new google.maps.LatLng(49.796302,24.0687144);
	marker.setPosition(latlng);
	map.setCenter(myLatlng);
}

if($('body').hasClass('contacts-page')) {
	google.maps.event.addDomListener(window, 'load', initialize);
}
