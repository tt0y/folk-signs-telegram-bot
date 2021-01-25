<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'SuperstitionController@superstitionOnMain');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sitemap-superstitions-list', [App\Http\Controllers\SuperstitionsList::class, 'index'])->name('sitemap-superstitions-list');
Route::get('/sitemap-generate', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap-generate');

Route::get('/{day}/{month}/{slug}', 'SuperstitionController@showSuperstition')->name('superstition.show');

Route::post(Telegram::getAccessToken(), function (){
    app('App\Http\Controllers\Backend\TelegramController')->webhook();
});

Route::get(Telegram::getAccessToken(), [App\Http\Controllers\Backend\TelegramMailingController::class, 'startMailing'])->name(Telegram::getAccessToken());

Auth::routes();

