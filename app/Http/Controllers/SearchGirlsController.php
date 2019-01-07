<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Girls;
use App\Location;


class SearchGirlsController extends Controller
{
    //
    public function searchGirls(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        $girls = Girls::wherebetween('lat', [$lat - 0.8, $lat + 0.5])->wherebetween('lng', [$lng - 0.4, $lng + 0.4])->get();

        return $girls;
    }

    public function searchCity(Request $request)
    {
    	$distval = $request->distval;
    	$matchedCities = Location::where('district', $distval)->pluck('city','city');

    	return view('ajaxresult', compact('matchedCities'));

    }

    public function locationCoords(Request $request)
    {
        $cityval = $request->cityval;
        $distval = $request->distval;

        $col = Location::where('district', $distval)->where('city', $cityval)->first();

        $lat = $col->lat;
        $lng = $col->lng;

        return [$lat, $lng];

    }
}
