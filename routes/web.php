<?php

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
    return view('auth.register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth' => 'web'])->group(function(){

    Route::resource('topup','TopupController');

    Route::resource('product','ProductController');
    
    Route::get('/pay/{order_no}','PayController@index');
    Route::get('/historis','PayController@history')->name('pay.history');
    Route::post('/pay/create','PayController@pay')->name('pay.create');

});
