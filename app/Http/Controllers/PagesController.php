<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use Mapper;
use FarhanWazir\GoogleMaps\GMaps;
use App\Geoloc;
use App\Location;



class PagesController extends Controller
{
    //
   /* protected $gmaps;
public function __construct(GMaps $gmaps){ $this->gmaps = $gmaps;}
*/
    public function index()
    {
    	$articles =  Articles::orderBy('created_at', 'desc')->paginate(5);
    	return view('pages.index', compact('articles'));
    }

    public function locate()
    {

    	return view('pages.locate');
    }

    public function laramap()
    {
        $districts = Location::pluck('district', 'district');

        return view('pages.front', compact('districts'));
    }
      public function faramap()
      {

        return view('pages.faramap', compact('map'));
      }
     
      public function faramap2()
      {
        

       $coords = Geoloc::all();
       $config['center']= 'auto';
       $config['map_height']= '13';
      app('map')->initialize($config);
       //GMaps::initialize($config);
         // $this->googlemaps->initialize($config);
       foreach ($coords as $coord) {
           # code...
        $marker = array();
        $marker['position'] = $coord.lat. ',' .$coord.lng;
        //GMaps::add_marker($marker);
app('map')->add_marker($marker);
        
        $mapp = GMaps::create_map();


       }
        return view('pages.faramap2', compact('mapp'));
      }





    public function bradmap()
    {
        Mapper::map(53.381128999999990000, -1.470085000000040000);

        Mapper::marker(53.381128999999990000, -1.470085000000040000);
Mapper::marker(53.381128999999990000, -1.470085000000040000, ['symbol' => 'circle', 'scale' => 1000]);

/*Mapper::informationWindow(53.381128999999990000, -1.470085000000040000, 'Content', ['open' => true, 'maxWidth'=> 300, markers' => ['title' => 'Title']]);*/
Mapper::map(52.381128999999990000, 0.470085000000040000)->informationWindow(53.381128999999990000, -1.470085000000040000, 'Content', ['markers' => ['animation' => 'DROP']]);

       Mapper::map(52.381128999999990000, 0.470085000000040000)->polyline([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['strokeColor' => '#000000', 'strokeOpacity' => 0.1, 'strokeWeight' => 2]);
Mapper::polyline([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]]);
     

        return view('pages.bradmap', compact('map'));
    }
}
