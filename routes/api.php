<?php

use App\Http\Controllers\API\ArrondissementController;
use App\Http\Controllers\API\FabricantController;
use App\Http\Controllers\API\PaysController;
use App\Http\Controllers\API\QuartierController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VillesController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('user',[UserController::class,'index']);

Route::post('user',[UserController::class,'login']);

Route::put('user/{user}',[UserController::class,'update']);

Route::resource('pays',PaysController::class);

Route::resource('villes',VillesController::class);

Route::resource('arrondissements',ArrondissementController::class);

Route::resource('quartiers',QuartierController::class);

Route::resource('fabricants',FabricantController::class);

