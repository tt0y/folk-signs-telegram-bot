<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

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
Route::get('/superstition/{day}/{month}/{slug}', 'SuperstitionController@showSuperstition')->name('superstition.show');

route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    // Categories
    Route::get('/superstitions', 'Admin\SuperstitionsController@index')->name('superstitions');

    Route::get('/superstitions/add', 'Admin\SuperstitionsController@addSuperstition')->name('superstitions.add');
    Route::post('/superstitions/add', 'Admin\SuperstitionsController@addRequestSuperstition');

    Route::get('/superstitions/edit/{id}', 'Admin\SuperstitionsController@editSuperstition')->name('superstitions.edit');
    Route::post('/superstitions/edit/{id}', 'Admin\SuperstitionsController@editRequestSuperstition')->name('superstitions.edit');

    Route::delete('/superstitions/delete/', 'Admin\SuperstitionsController@deleteSuperstition')->name('superstitions.delete');
});

Route::post(Telegram::getAccessToken(), function (){
    app('App\Http\Controllers\Backend\TelegramController')->webhook();
});

Route::get(Telegram::getAccessToken(), [App\Http\Controllers\Backend\TelegramMailingController::class, 'startMailing'])->name(Telegram::getAccessToken());

Auth::routes();

