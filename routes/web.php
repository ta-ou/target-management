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
    return view('home');
});

Route::group(['prefix' => 'target', 'middleware' => 'auth'], function(){
    Route::get('home', 'TargetController@index')->name('target.home');
    Route::get('create', 'TargetController@create')->name('target.create');
    Route::post('store', 'TargetController@store')->name('target.store');
    Route::get('show/{id}', 'TargetController@show')->name('target.show');
    Route::get('edit/{id}', 'TargetController@edit')->name('target.edit');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
