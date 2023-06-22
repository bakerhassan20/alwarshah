<?php


use App\Models\Service;
use App\Http\Controllers;
use App\Models\Companies;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\OrderController;
use App\Http\Controllers\website\WebsiteController;
use App\Http\Controllers\Admin\subscriptionsController;
use App\Http\Controllers\website\ServiceProviderController;




Auth::routes();

Route::get('/', [WebsiteController::class, 'index'])->name('home')->middleware('guest');

    /*------------------------------------------
    --------------------------------------------
    All Admin Routes List
    --------------------------------------------
    --------------------------------------------*/



Route::get('maptrak/{map}',function (){

    return view('website.mapTracking');
})->name('map-tracking');


Route::get('tracking/',function (){

    $data=[

        [27.154325,31.209059],
        [27.146841,31.215414],
        [27.145389,31.234396],
        [27.145389,31.272851],
        [27.111219,31.300211],
        [27.075458,31.308803],
        [27.040603,31.315330]

    ];
    return response()->json($data);
})->name('tracking');





    Route::prefix('/admin')->middleware(['auth', 'user-access:admin'])->group(function () {


        Route::get('adminTraking',function (){
            return view('admin.mapTracking');
        })->name('adminTraking');



        Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home');

        Route::get('theme',[HomeController::class,'theme'])->name('theme');
        Route::resource('services','App\Http\Controllers\Admin\ServicesController');
        Route::resource('sub_services','App\Http\Controllers\Admin\SubServicesController');
        Route::resource('companys','App\Http\Controllers\CompaniesController');
        Route::get('/section/{id}','App\Http\Controllers\SectionsController@getproducts');

        Route::resource('roles','App\Http\Controllers\RoleController');
        Route::resource('users','App\Http\Controllers\UserController');
        Route::get('/admins','App\Http\Controllers\UserController@GetAdmins');
        Route::get('/drivers','App\Http\Controllers\UserController@GetDrivers');
        Route::get('/createDriver','App\Http\Controllers\UserController@createDriver');
        Route::post('/storeDriver','App\Http\Controllers\UserController@storeDriver');


        Route::get('/AllWinchOrder','App\Http\Controllers\Admin\OrderController@AllWinchOrder');
        Route::get('/AllFuelOrder','App\Http\Controllers\Admin\OrderController@AllFuelOrder');
        Route::get('/AllRepairOrder','App\Http\Controllers\Admin\OrderController@AllRepairOrder');
        Route::get('/AllWashOrder','App\Http\Controllers\Admin\OrderController@AllWashOrder');

        Route::get('/getSlider','App\Http\Controllers\Admin\PublicController@getSlider');
        Route::post('/addSlide','App\Http\Controllers\Admin\PublicController@addSlide');
        Route::post('/updateSlider','App\Http\Controllers\Admin\PublicController@updateSlider');
        Route::post('/deleteSlide','App\Http\Controllers\Admin\PublicController@deleteSlide');

        Route::get('/getProducts','App\Http\Controllers\Admin\PublicController@getProducts');
        Route::post('/addProduct','App\Http\Controllers\Admin\PublicController@addProduct');
        Route::post('/updateProduct','App\Http\Controllers\Admin\PublicController@updateProduct');
        Route::post('/deleteProduct','App\Http\Controllers\Admin\PublicController@deleteProduct');

    Route::prefix('/profile')->name('profile.')->middleware('auth')->group(function () {
        Route::get('/',[ProfileController::class,'index'])->name('index');
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
        Route::put('/update',[ProfileController::class,'update'])->name('update');
        Route::put('/update-password',[ProfileController::class,'update_password'])->name('update-password');
        Route::put('/update-phone',[ProfileController::class,'update_phone'])->name('update-phone');
    });

    Route::get('/plans', [subscriptionsController::class, 'index']);

    });

    /*------------------------------------------
    --------------------------------------------
    All service_provider Routes List
    --------------------------------------------
    --------------------------------------------*/

    Route::middleware(['auth', 'user-access:service_provider'])->group(function () {
        Route::get('/home', [HomeController::class, 'service_provider'])->name('service_provider.home');
        Route::get('/profile', [ServiceProviderController::class, 'profile'])->name('profile');


        Route::get('/Orders', [OrderController::class, 'getOrders'])->name('getOrders');

        Route::get('/Orders/Winch/{id}', [OrderController::class, 'getWinchOrders']);
        Route::get('/Orders/Fuel/{id}', [OrderController::class, 'getFuelOrders']);
        Route::get('/Orders/Wash/{id}', [OrderController::class, 'getWashOrders']);
        Route::get('/Orders/Repair/{id}', [OrderController::class, 'getRepairOrders']);

        Route::post('/Orders/Winch/Offer', [OrderController::class, 'addWinchOffer']);
        Route::post('/Orders/Fuel/Offer', [OrderController::class, 'addFuelOffer']);
        Route::post('/Orders/Wash/Offer', [OrderController::class, 'addWashOffer']);
        Route::post('/Orders/Repair/Offer', [OrderController::class, 'addRepairOffer']);

    });


Route::get('MarkAsRead_all','App\Http\Controllers\InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');

Route::get('/{page}', 'App\Http\Controllers\AdminController@index');






