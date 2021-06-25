<?php

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
})->name('welcome');

//Route::get('/products', 'ProductController@index')->name('product.index');
//Route::post('/product', 'ProductController@store')->name('product.store');

Route::resource('product', 'ProductController')->middleware('auth:web');

Auth::routes();

Route::get('view-form', 'SendMailController@mailView')->name('mailView')->middleware('checkAge');
Route::post('send-to-mail', 'SendMailController@send')->name('sendToMail');
Route::post('check', 'SendMailController@check')->name('check-code');
Route::post('change-password', 'SendMailController@changePassword')->name('change-password');
Route::get('/home', 'HomeController@index')->name('home');
