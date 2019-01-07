<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<title>Fara Map</title>
	{!! $map['js']
!!}
</head>
<body>
<div class="containser">
	<div class="row">
		<div class="col-md-11">
	
<h2>This map</h2>
<input type="text" class="form-control" id="myPlaceTextBox"  />

<br>
<form action="/directions" method="Post">
<input type="text" class="form-control" id="myPlaceTextBox2"  />
<button class="btn btn-primary" type="submit" >search</button>
    {!!$map['html']!!}
     <div id="directionsDiv"></div>
		</form>
		</div>
	</div>
</div>


</body>

</html>