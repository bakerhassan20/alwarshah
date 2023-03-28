<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\HomeController;
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
});


