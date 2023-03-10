<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\website\WebsiteController;
use App\Http\Controllers\website\ServiceProviderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', [WebsiteController::class, 'index'])->name('home')->middleware('guest');
Route::get('/complete', function(){
  return view('auth.complete');
});
    /*------------------------------------------
    --------------------------------------------
    All Admin Routes List
    --------------------------------------------
    --------------------------------------------*/
    Route::prefix('/admin')->middleware(['auth', 'user-access:admin'])->group(function () {

        Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home');

        Route::get('theme',[HomeController::class,'theme'])->name('theme');
        Route::resource('services','App\Http\Controllers\Admin\ServicesController');
        Route::resource('sub_services','App\Http\Controllers\Admin\SubServicesController');
        Route::resource('companys','App\Http\Controllers\CompaniesController');
        Route::get('/section/{id}','App\Http\Controllers\SectionsController@getproducts');

        Route::resource('roles','App\Http\Controllers\RoleController');
        Route::resource('users','App\Http\Controllers\UserController');

    Route::prefix('/profile')->name('profile.')->middleware('auth')->group(function () {
        Route::get('/',[ProfileController::class,'index'])->name('index');
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
        Route::put('/update',[ProfileController::class,'update'])->name('update');
        Route::put('/update-password',[ProfileController::class,'update_password'])->name('update-password');
        Route::put('/update-phone',[ProfileController::class,'update_phone'])->name('update-phone');
    });

    });

    /*------------------------------------------
    --------------------------------------------
    All service_provider Routes List
    --------------------------------------------
    --------------------------------------------*/
    Route::middleware(['auth', 'user-access:service_provider'])->group(function () {

        Route::get('/home', [HomeController::class, 'service_provider'])->name('service_provider.home');
        Route::get('/profile', [ServiceProviderController::class, 'profile'])->name('profile');

    });

Route::get('MarkAsRead_all','App\Http\Controllers\InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');

Route::get('/{page}', 'App\Http\Controllers\AdminController@index');






