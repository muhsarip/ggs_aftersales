<?php

use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WarrantyController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Warranty
Route::get('/warranty', 'App\Http\Controllers\Frontend\WarrantyController@index')->name('warranty.index');
Route::get('/warranty/{rmaId}', 'App\Http\Controllers\Frontend\WarrantyController@show')->name('warranty.show');
Route::post('/warranty', 'App\Http\Controllers\Frontend\WarrantyController@submit');
Route::get('/warranty-download/{rmaId}', 'App\Http\Controllers\Frontend\WarrantyController@download');

// Service
Route::get('/service', 'App\Http\Controllers\Frontend\ServiceController@index')->name('service.index');
Route::get('/service/{serId}', 'App\Http\Controllers\Frontend\ServiceController@show')->name('service.show');
Route::post('/service', 'App\Http\Controllers\Frontend\ServiceController@submit');
Route::get('/service-download/{serId}', 'App\Http\Controllers\Frontend\ServiceController@download');

Route::get('/status', 'App\Http\Controllers\Frontend\SearchController@index')->name('page.status');
Route::post('/status/check', 'App\Http\Controllers\Frontend\SearchController@check')->name('status.check');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth'],'prefix'=>'admin'], function () {
    Route::get('/', 'App\Http\Controllers\Admin\HomeController@index');

    Route::resource('distributors', DistributorController::class);
    Route::resource('warranties', WarrantyController::class);
    Route::resource('settings', SettingController::class);
});


Route::get('/shdfdjfowejfjekw', function () {
    exec('composer dump-autoload');
    Artisan::call("config:cache");
})->middleware(['auth']);

require __DIR__.'/auth.php';
