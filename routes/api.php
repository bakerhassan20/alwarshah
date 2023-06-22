<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Auth\ApiAuthController;



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
    Route::post('/updateProfile', [HomeController::class,'updateProfile']);
    Route::post('/logout', [ApiAuthController::class,'logout'])->name('logout.api');
    Route::get('/getFcmNotification', [HomeController::class,'getFcmNotification']);



      Route::get('/GetUserOrder',[OrderController::class,'AllUserOrder']);

    //get all repair service
    Route::get('/RepairService', [OrderController::class,'RepairService']);

    // subscription
    Route::post('/subscription',[SubscriptionController::class,'subscription']);
    Route::get('/cancelSubscription',[SubscriptionController::class,'CancelSubscription']);
    Route::get('/checkSubscription',[SubscriptionController::class,'CheckSubscription']);
    Route::get('/renewSubscription',[SubscriptionController::class,'RenewSubscription']);
    Route::get('/userSubscription',[SubscriptionController::class,'UserSubscription']);
    Route::get('/allUserSubscription',[SubscriptionController::class,'AllUserSubscription']);


});


Route::middleware(['auth:sanctum','check-Subscription'])->group(function () {

    //Make Orders
    Route::post('/MakeWinchOrder',[OrderController::class,'MakeWinchOrder']);
    Route::post('/MakeWashOrder',[OrderController::class,'MakeWashOrder']);
    Route::post('/MakeFuelOrder',[OrderController::class,'MakeFuelOrder']);
    Route::post('/MakeRepairOrder',[OrderController::class,'MakeRepairOrder']);


});

