<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/laramap', 'PagesController@laramap');

Route::get('/', 'PagesController@index');

Route::get('/locations', 'PagesController@locate');

Route::get('/bradmap', 'PagesController@bradmap');

Route::get('/faramap2', 'PagesController@faramap2');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::get('/faramap', function() {
	$coords = App\Geoloc::all();
$posi =$config['center'] = 'auto';
$config['zoom'] ='14';
$config['map_height'] = '400px';/*
$config['directions'] = TRUE;
$config['directionsStart'] = 'empire state building';
$config['directionsEnd'] = 'statue of liberty';
$config['directionsDivID'] = 'directionsDiv';
$config['geocodeCaching'] = true;*/
//search me
$config['places'] = TRUE;
$config['placesAutocompleteInputID'] = 'myPlaceTextBox';
$config['placesAutocompleteInputID'] = 'myPlaceTextBox2';
$config['geocodeCaching'] = TRUE;
$config['region'] = 'US';

$config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
$config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';
//second searchbox



GMaps::initialize($config);
    
foreach ($coords as $coord) {
     $infowin = $coord->address;     

           # code...
        $marker = array();
        $marker['position'] = $coord->lat. ',' .$coord->lng;
        $marker['infowindow_content'] =  '$infowin' ;
       
        GMaps::add_marker($marker);
    }

$marker['position']= '37.4419, -122.1419';
$address ='SOS Pare-Brise + CIBOURE
11 Avenue Gabriel Delaunay
64500 Ciboure
T: 05 59 24 53 86';
$marker['infowindow_content'] = 'SOS Pare-Brise + CIBOURE <br> 11 Avenue Gabriel Delaunay <br> 64500 Ciboure <br> T: 05 59 24 53 86 <br> <a href="../ciboure/" title="Site Web" class="btn btn-primary btn-sm w-50"><span class="icon-info" aria-hidden="true"></span> PLUS D INFOS</a> <a class="pull-right route-link" target="_blank" href="https://maps.google.fr/maps?daddr=37.4419, -122.1419">Itinéraire</a>';

GMaps::add_marker($marker);

$marker['position']= 'CN tower';
$marker['infowindow_content'] = 'Laverie st denis, 10Euros';
$marker['icon'] = 'http://maps.google.com/mapfiles/kml/paddle/grn-blank.png';
$marker['draggable']= 'true';

GMaps::add_marker($marker);

$map = GMaps::create_map();

return view('pages.faramap', compact('map'));
});

Route::post('/directions', function (Request $request) {

$start = $request('myPlaceTextBox');
$end =  $request('myPlaceTextBox2');


$posi =$config['center'] = '37.4419, -122.1419';
$config['zoom'] ='14';
$config['map_height'] = '400px';
$config['directions'] = TRUE;
$config['directionsStart'] = $request('myPlaceTextBox');
$config['directionsEnd'] = $request('myPlaceTextBox2');
$config['directionsDivID'] = 'directionsDiv';
$config['geocodeCaching'] = true;
//search me

GMaps::initialize($config);

$mapp = GMaps::create_map();
return view('pages.faramap2', compact('mapp'));

});