<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperstitionController;

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

Route::resource('v1/superstitions', 'SuperstitionController', ['except' => ['create', 'edit']]);

Route::group([
    'namespace' => 'Api',
], function () {

    Route::resource('v1/superstitions/{day}/{month}', 'SuperstitionController', ['only' => [
        'index', 'show'
    ]]);

});
