<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/searchGirls', 'SearchGirlsController@SearchGirls');

Route::post('/searchCity', 'SearchGirlsController@searchCity');

Route::post('/getLocationCoords', 'SearchGirlsController@locationCoords');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('/articles', 'ArticlesController');

Route::get('articles', 'ArticlesController@index');

//show article
Route::get('articles/{id}', 'ArticlesController@show');

//create article
Route::post('articles', 'ArticlesController@store');

Route::put('article/{id}', 'ArticlesController@store');

Route::delete('article/{id}', 'ArticlesController@destroy');

