<?php

use Illuminate\Http\Request;
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

Route::get('/province','API\DistrictController@provinces');
Route::get('/province/{province_code}/amphoe','API\DistrictController@amphoes');
Route::get('/province/{province_code}/amphoe/{amphoe_code}/createpetition/petition04','API\DistrictController@districts');
Route::get('/province/{province_code}/amphoe/{amphoe_code}/createpetition/petition04/{district_code}','API\DistrictController@detail');
