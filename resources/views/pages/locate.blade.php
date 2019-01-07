<!-- <!DOCTYPE html>
<html>
<head>
	<title>Google map Locations</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 

Minified jQuery 3 JS

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-10">
			
			<form  >
		     <h3>Find nearest Garage</h3>
             <div class="form-group col-md-5" style="">
             	<label for="title">Label :</label>
             	<input type="text" name="title" id="title" size="20px" class="form-control">
             </div>
          <div class="form-group col-md-5" style="">
             	<label for="title">Map :</label>
             	<input type="text" name="map" id="map" size="20px" class="form-control">
             </div>

             <div class="col-md-12" id="map" style="width:100%;height:400px;">
             </div>

            <div class="form-group col-md-4" style="">
             	<label for="title">Lat :</label>
             	<input type="text" name="lat" id="lat" class="form-control">
             </div>
             <div class="form-group col-md-4" style="">
             	<label for="title">Long :</label>
             	<input type="text" name="long" id="long" class="form-control">
             </div>
             <button class="btn btn-primary btn-sm">submit</button>
                 

			</form>
		</div>
 
	</div>
</div>
<script>
function initMap() {
  // The location of Uluru
  var uluru = {lat: -25.344, lng: 131.036};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>

 	 <script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:10,
};
var marker = new google.maps.Marker({
	position: {
	lat: 51.508742,
	lng: -0.120850
},
//var marker = new google.maps.Marker({position: uluru, map: map});
//marker.setMap(map);
  map: map
});
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgNfwFbR2XCAo9I1oUjyHluZIeeHQoPnc&callback=initMap"></script>
	 

</body>
</html> -->

<!DOCTYPE html>
<html>
  <head>
    <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
    	
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -25.344, lng: 131.036};
  // The map, centered at Uluru

  //var map = new google.maps.Map(
   //   document.getElementById('map'), {zoom: 12, center: uluru});

//infoWindow = new google.maps.InfoWindow;

  // The marker, positioned at Uluru
  //var marker = new google.maps.Marker({position: uluru, map: map});
  if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgNfwFbR2XCAo9I1oUjyHluZIeeHQoPnc&callback=initMap">
    </script>
  </body>
</html>