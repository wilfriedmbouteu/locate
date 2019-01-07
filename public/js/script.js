
var map;

var myLatLng;

$(document).ready(function() {

geolocationInit();

function geolocationInit()
{
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(success, fail);
	}
	else { alert("Browser not supported");
	 }
}

function success(position)
{
	
	var latval = position.coords.latitude;
	var lngval = position.coords.longitude;

console.log([latval, lngval]);
	myLatLng = new google.maps.LatLng(latval, lngval);
 
 createMap(myLatLng);

 //nearbySearch(myLatLng, "school");
 searchGirls(latval, lngval);
}

function fail()
{
	alert("Loading fails");
}


function createMap(myLatLng)
{
	 map = new google.maps.Map(document.getElementById('map'), {
  center: myLatLng,

  scrollwheel: false,
  zoom: 12
});

var marker = new google.maps.Marker({
   position: myLatLng,
    map: map
});

}
	
	//marker

function createMarker(latlng, icn,name)
{

var marker = new google.maps.Marker({
    position: latlng,
    map: map,
    icon:icn,
    title: name
  });

}

/*function nearbySearch(myLatLng, type)
{

var request = {
    location: myLatLng,
    radius: '150000',
    types: [type]
  };

service = new google.maps.places.PlacesService(map);
service.nearbySearch(request, callback);

function callback(results, status) {
 
//console.log(results);
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      var place = results[i];
      latlng = place.geometry.location;
      icn= 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
     name = place.name;
      createMarker(latlng, icn, name);
    }
  }
}

}
*/
function searchGirls(lat, lng)
{
	$.post('http://localhost:8000/api/searchGirls', {lat:lat, lng:lng}, function(match) {
	//console.log(match);
  $('#girlsResult').html('');
   $.each(match, function(i, val) {
   	var glatval= val.lat;
   	var glngval = val.lng;
   	var gname = val.name;
   	var Glatlng = new google.maps.LatLng(glatval, glngval);
    var gicn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
   	createMarker(Glatlng,gicn,gname);
    var html = '<h5><li>'+gname+'</li></h5>';
    $('#girlsResult').append(html);
   });

});

}

$('#searchGirls').submit(function(e) {
  e.preventDefault();
  var distval = $('#district').val();
  var cityval = $('#citylocation').val();
  
  $.post('http://localhost:8000/api/getLocationCoords',{distval:distval, cityval:cityval}, function(match) {
   //console.log(match[0]);

   myLatLng = new google.maps.LatLng(match[0], match[1]);
    createMap(myLatLng);
   searchGirls(match[0], match[1]);

  });

});

//action call when district is selected

$("#district").click(function () {
   var distval = $("#district").val();
    $.post('http://localhost:8000/api/searchCity', {distval: distval}, function(match) {
      $("#city").html(match);

//relocate map here
var distval = $('#district').val();
  var cityval = $('#citylocation').val();
  
  $.post('http://localhost:8000/api/getLocationCoords',{distval:distval, cityval:cityval}, function(match) {
   //console.log(match[0]);

   myLatLng = new google.maps.LatLng(match[0], match[1]);
    createMap(myLatLng);
   searchGirls(match[0], match[1]);

  });






    });

});

});
