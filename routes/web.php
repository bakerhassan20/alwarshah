<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\website\WebsiteController;
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
    /*------------------------------------------
    --------------------------------------------
    All Admin Routes List
    --------------------------------------------
    --------------------------------------------*/
    Route::prefix('/admin')->middleware(['auth', 'user-access:admin'])->group(function () {

        Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home');

        Route::get('theme',[HomeController::class,'theme'])->name('theme');
        Route::resource('sections','App\Http\Controllers\SectionsController');
        Route::resource('services','App\Http\Controllers\ServicesController');
        Route::resource('companys','App\Http\Controllers\CompaniesController');
        Route::get('/section/{id}','App\Http\Controllers\SectionsController@getproducts');

        Route::resource('roles','App\Http\Controllers\RoleController');
        Route::resource('users','App\Http\Controllers\UserController');

    Route::prefix('/admin/profile')->name('profile.')->middleware('auth')->group(function () {
        Route::get('/',[ProfileController::class,'index'])->name('index');
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
        Route::put('/update',[ProfileController::class,'update'])->name('update');
        Route::put('/update-password',[ProfileController::class,'update_password'])->name('update-password');
        Route::put('/update-phone',[ProfileController::class,'update_phone'])->name('update-phone');
    });

    });

    /*------------------------------------------
    --------------------------------------------
    All Admin Routes List
    --------------------------------------------
    --------------------------------------------*/
    Route::middleware(['auth', 'user-access:service_provider'])->group(function () {

        Route::get('/home', [HomeController::class, 'service_provider'])->name('service_provider.home');
    });







Route::resource('invoices','App\Http\Controllers\InvoicesController');



Route::get('/InvoicesDetails/{id}','App\Http\Controllers\InvoicesDetailsController@edit');

Route::get('View_file/{invoice_number}/{file_name}', 'App\Http\Controllers\InvoicesDetailsController@open_file');

Route::get('download/{invoice_number}/{file_name}', 'App\Http\Controllers\InvoicesDetailsController@get_file');

Route::post('delete_file', 'App\Http\Controllers\InvoicesDetailsController@destroy')->name('delete_file');

Route::resource('InvoiceAttachments', 'App\Http\Controllers\InvoicesAttachmentsController');

Route::get('/edit_invoice/{id}', 'App\Http\Controllers\InvoicesController@edit');

Route::get('/Status_show/{id}', 'App\Http\Controllers\InvoicesController@show')->name('Status_show');

Route::post('/Status_Update/{id}', 'App\Http\Controllers\InvoicesController@Status_Update')->name('Status_Update');

Route::resource('Archive', 'App\Http\Controllers\InvoiceAchiveController');

Route::get('Invoice_Paid','App\Http\Controllers\InvoicesController@Invoice_Paid');

Route::get('Invoice_UnPaid','App\Http\Controllers\InvoicesController@Invoice_UnPaid');

Route::get('Invoice_Partial','App\Http\Controllers\InvoicesController@Invoice_Partial');

Route::get('Print_invoice/{id}','App\Http\Controllers\InvoicesController@Print_invoice');

Route::get('export_invoices','App\Http\Controllers\InvoicesController@export');



    Route::get('invoices_report', 'App\Http\Controllers\Invoices_Report@index');
    Route::post('Search_invoices', 'App\Http\Controllers\Invoices_Report@Search_invoices');
    Route::get('customers_report', 'App\Http\Controllers\Customers_Report@index')->name("customers_report");
    Route::post('Search_customers', 'App\Http\Controllers\Customers_Report@Search_customers');


    Route::get('MarkAsRead_all','App\Http\Controllers\InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');











Route::get('/{page}', 'App\Http\Controllers\AdminController@index');






