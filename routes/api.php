<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Auth\ApiAuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [ApiAuthController::class,'login'])->name('login.api');




Route::middleware('auth:sanctum')->group(function () {

    Route::get('/slide', [HomeController::class,'Slide']);
    Route::get('/services', [HomeController::class,'Service']);
    Route::get('/products', [HomeController::class,'Products']);
    Route::get('/product/{id}', [HomeController::class,'getProduct']);
    Route::get('/profile', [HomeController::class,'getProfile']);
    Route::post('/logout', [ApiAuthController::class,'logout'])->name('logout.api');

    //Make Orders
    Route::post('/MakeWinchOrder',[OrderController::class,'MakeWinchOrder']);
    Route::post('/MakeWashOrder',[OrderController::class,'MakeWashOrder']);
    Route::post('/MakeFuelOrder',[OrderController::class,'MakeFuelOrder']);
    Route::post('/MakeRepairOrder',[OrderController::class,'MakeRepairOrder']);

      //Get All Orders
      Route::get('/GetWinchOrder',[OrderController::class,'AllUserWinchOrder']);
      Route::get('/GetWashOrder',[OrderController::class,'AllUserWashOrder']);
      Route::get('/GetFuelOrder',[OrderController::class,'AllUserFuelOrder']);
      Route::get('/GetRepairOrder',[OrderController::class,'AllUserRepairOrder']);

    //get all repair service
    Route::get('/RepairService', [OrderController::class,'RepairService']);
});


