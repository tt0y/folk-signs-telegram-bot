<?php

use App\Http\Controllers\Backend\DashboardController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('admin')->namespace('Backend')->name('admin.')->group(function (){
    Route::get('/', 'DashboardController@index')->name('index');

    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::post('/settings', 'SettingController@store')->name('settings.store');
    Route::post('/settings/getwebhookinfo', 'SettingController@getWebhookInfo')->name('settings.getwebhookinfo');
    Route::post('/settings/setwebhook', 'SettingController@setWebhook')->name('settings.setwebhook');
});

Auth::routes();

