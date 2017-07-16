<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
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
<body>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCH3l4C9i8QTx8tRFHAta5VwK7uqJaI4Bw&v=3.exp&libraries=visualization,drawing,places,weather,geometry"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script>

var IPCollection=[
  {"ip":"103.28.248.0","country_code":"SG","country_name":"Singapore","region_code":"","region_name":"","city":"","zip_code":"","time_zone":"Asia/Singapore","latitude":1.3667,"longitude":103.8,"metro_code":0}
,{"ip":"172.93.148.247","country_code":"US","country_name":"United States","region_code":"NY","region_name":"New York","city":"Buffalo","zip_code":"14202","time_zone":"America/New_York","latitude":42.8864,"longitude":-78.8781,"metro_code":514}
,{"ip":"190.141.184.123","country_code":"PA","country_name":"Panama","region_code":"8","region_name":"Provincia de Panama","city":"Panama City","zip_code":"","time_zone":"America/Panama","latitude":8.9936,"longitude":-79.5197,"metro_code":0}
,{"ip":"149.255.154.4","country_code":"AZ","country_name":"Azerbaijan","region_code":"","region_name":"","city":"","zip_code":"","time_zone":"Asia/Baku","latitude":40.5,"longitude":47.5,"metro_code":0}
,{"ip":"46.72.110.132","country_code":"RU","country_name":"Russia","region_code":"ORL","region_name":"Orlovskaya Oblast'","city":"Oryol","zip_code":"302004","time_zone":"Europe/Moscow","latitude":53.0747,"longitude":36.2468,"metro_code":0}
,{"ip":"138.204.145.39","country_code":"BR","country_name":"Brazil","region_code":"","region_name":"","city":"","zip_code":"","time_zone":"","latitude":-22.8305,"longitude":-43.2192,"metro_code":0}
,{"ip":"180.250.159.69","country_code":"ID","country_name":"Indonesia","region_code":"JT","region_name":"Central Java","city":"Kudus","zip_code":"","time_zone":"Asia/Jakarta","latitude":-6.8048,"longitude":110.8405,"metro_code":0}
,{"ip":"206.127.88.18","country_code":"US","country_name":"United States","region_code":"MT","region_name":"Montana","city":"Lewistown","zip_code":"59457","time_zone":"America/Denver","latitude":47.0127,"longitude":-109.3429,"metro_code":755}
,{"ip":"152.101.20.35","country_code":"JP","country_name":"Japan","region_code":"13","region_name":"Tokyo","city":"Tokyo","zip_code":"100-0001","time_zone":"Asia/Tokyo","latitude":35.6427,"longitude":139.7677,"metro_code":0}
,{"ip":"89.187.217.113","country_code":"LB","country_name":"Lebanon","region_code":"","region_name":"","city":"","zip_code":"","time_zone":"Asia/Beirut","latitude":33.8333,"longitude":35.8333,"metro_code":0}
,{"ip":"23.239.9.177","country_code":"US","country_name":"United States","region_code":"NJ","region_name":"New Jersey","city":"Newark","zip_code":"07175","time_zone":"America/New_York","latitude":40.7357,"longitude":-74.1724,"metro_code":501}
,{"ip":"111.68.115.22","country_code":"ID","country_name":"Indonesia","region_code":"JK","region_name":"Jakarta","city":"Jakarta","zip_code":"","time_zone":"Asia/Jakarta","latitude":-6.1744,"longitude":106.8294,"metro_code":0}
,{"ip":"138.204.145.39","country_code":"BR","country_name":"Brazil","region_code":"","region_name":"","city":"","zip_code":"","time_zone":"","latitude":-22.8305,"longitude":-43.2192,"metro_code":0}
,{"ip":"110.77.159.197","country_code":"TH","country_name":"Thailand","region_code":"10","region_name":"Bangkok","city":"Bangkok","zip_code":"10200","time_zone":"Asia/Bangkok","latitude":13.7594,"longitude":100.4889,"metro_code":0}
,{"ip":"23.239.9.236","country_code":"US","country_name":"United States","region_code":"NJ","region_name":"New Jersey","city":"Newark","zip_code":"07175","time_zone":"America/New_York","latitude":40.7357,"longitude":-74.1724,"metro_code":501}
,{"ip":"149.255.154.4","country_code":"AZ","country_name":"Azerbaijan","region_code":"","region_name":"","city":"","zip_code":"","time_zone":"Asia/Baku","latitude":40.5,"longitude":47.5,"metro_code":0}
,{"ip":"89.187.217.113","country_code":"LB","country_name":"Lebanon","region_code":"","region_name":"","city":"","zip_code":"","time_zone":"Asia/Beirut","latitude":33.8333,"longitude":35.8333,"metro_code":0}
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
</head>
<body>
<div id="map-canvas"></div>
</html>
