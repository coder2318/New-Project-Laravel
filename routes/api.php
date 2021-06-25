<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth:api'])->group(function(){
    Route::apiResource('products', 'Api\ProductController');

});
Route::get('curl', 'Api\ProductController@curl');

Route::post('register', 'Api\PassportController@register');
Route::post('login', 'Api\PassportController@login');
