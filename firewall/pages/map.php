<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCH3l4C9i8QTx8tRFHAta5VwK7uqJaI4Bw&v=3.exp&libraries=visualization,drawing,places,weather,geometry"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<style>
.infowindow {
	width:200px;
	height:150px;
}
#map-canvas {
  height: 700px;
  width: 100%;
}
</style>
<h3>IP Location</h3>
<div id="map-canvas"></div>

<script>
var IPCollection=[
      <?php
        $admin->JSONMapIP($one);
      ?>
          ];
</script>
<script>
	function initialize() {
 		map = new google.maps.Map(document.getElementById('map-canvas'), {
			zoom: 3,
			center: {lat: 2.8, lng: -187.3},
      mapTypeId: 'terrain'
		});



 		IPCollection.forEach(function(ipplace) {
 			var marker=new google.maps.Marker({position:{lat:ipplace.latitude, lng:ipplace.longitude}, clickable:true, map:map, animation:google.maps.Animation.DROP });


 			google.maps.event.addListener(marker,'click',function() {
		 	var infowindow = new google.maps.InfoWindow();
		 	var infolist=jQuery('<ul></ul>');
		 	for (attribute in ipplace) {
		 		infolist.append('<li><b>'+attribute+'</b>: '+ipplace[attribute]+'</li>');
		 	}
		 	infowindow.setContent('<div class="infowindow">'+infolist.html()+'</div>');
			infowindow.open(map, marker);
			map.panTo(marker.getPosition());
		 	});
 		});



	}

	google.maps.event.addDomListener(window, 'load', initialize);

</script>
