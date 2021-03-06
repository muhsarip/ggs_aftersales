<?php

use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WarrantyController;
use App\Http\Controllers\CaptchaServiceController;
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

// Service
Route::get('/service', 'App\Http\Controllers\Frontend\ServiceController@index')->name('service.index');
Route::get('/service/{serId}', 'App\Http\Controllers\Frontend\ServiceController@show')->name('service.show');
Route::post('/service', 'App\Http\Controllers\Frontend\ServiceController@submit');


// Upload File
Route::post('/file/upload', 'App\Http\Controllers\Frontend\FileController@upload')->name('file.upload');

Route::get('/status', 'App\Http\Controllers\Frontend\SearchController@index')->name('page.status');
Route::post('/status/check', 'App\Http\Controllers\Frontend\SearchController@check')->name('status.check');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/', 'App\Http\Controllers\Admin\HomeController@index');

    Route::resource('distributors', DistributorController::class);
    Route::resource('warranties', WarrantyController::class);
    Route::resource('settings', SettingController::class);

    Route::resource('profiles', ProfileController::class);

    Route::get('/password', 'App\Http\Controllers\Admin\ProfileController@password')->name('change-password.index');
    Route::put('/password/{user}', 'App\Http\Controllers\Admin\ProfileController@changePassword')->name('change-password.update');
});


// Captcha
Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [CaptchaServiceController::class, 'captchaFormValidate']);
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);


Route::get('/shdfdjfowejfjekw', function () {
    Artisan::call("config:cache");
    Artisan::call("comp:dump");
})->middleware(['auth']);

require __DIR__ . '/auth.php';
