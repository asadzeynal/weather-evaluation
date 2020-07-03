<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/time', function(Request $request) {
    return Http::get('http://worldtimeapi.org/api/timezone/asia/baku');
});

Route::get('/weather', function(Request $request) {
    return Http::get('https://api.openweathermap.org/data/2.5/onecall?lat=40.409264&lon=49.867092&exclude=hourly,minutely&units=metric&appid=5b4b9568d68e301f9ea6d225d0906cfc');
});
