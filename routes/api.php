<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\UbicacionRackController;
use App\Http\Controllers\InventarioController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('sensordata',[SensorController::class,'index']);
Route::get('/sensores','App\Http\Controllers\SensorController@index');
//RACK
Route::get('/rack/{id}','App\Http\Controllers\RackController@show');
Route::post('/rack','App\Http\Controllers\RackController@store');
Route::put('/rack/actualizar/{id}','App\Http\Controllers\RackController@update');
Route::delete('/rack/destroy/{id}','App\Http\Controllers\RackController@destroy');

//inventario por posicion de Ubicacion
Route::get('/inventario/{id}','App\Http\Controllers\InventarioController@show');



Route::post('/sensor','App\Http\Controllers\SensorController@store');

Route::post('/inventario','App\Http\Controllers\InventarioController@store');


// Route::resource('sensor', [SensorController::class]);
