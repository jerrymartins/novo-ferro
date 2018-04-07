<?php

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
        width: 100%;
       }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
	<body>
		<div id="map"></div>
			<script>
				function initialize() {
				    var locations = [
				        ['Opera House', -3.0846126, -60.0127844, 3],
				        ['Casa Jerry', -2.9916354, -60.0196253, 2],
				        ['Milenium Shopping', -3.1011313, -60.0272744, 1]
				    ];

				    window.map = new google.maps.Map(document.getElementById('map'), {
				        mapTypeId: google.maps.MapTypeId.ROADMAP
				    });

				    var infowindow = new google.maps.InfoWindow();

				    var bounds = new google.maps.LatLngBounds();

				    for (i = 0; i < locations.length; i++) {
				        marker = new google.maps.Marker({
				            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
				            map: map
				        });

				        bounds.extend(marker.position);

				        google.maps.event.addListener(marker, 'click', (function (marker, i) {
				            return function () {
				                infowindow.setContent(locations[i][0]);
				                infowindow.open(map, marker);
				            }
				        })(marker, i));
				    }

				    map.fitBounds(bounds);

				    var listener = google.maps.event.addListener(map, "idle", function () {
				        map.setZoom(12);
				        google.maps.event.removeListener(listener);
				    });
				}

				function loadScript() {
				    var script = document.createElement('script');
				    script.type = 'text/javascript';
				    //script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
				    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCgMDLmIF-p9LD8m8icoMeXChb_7wA9_nw&callback=initialize';
				    document.body.appendChild(script);
				}

				window.onload = loadScript;
			</script>
			
	</body>
</html>