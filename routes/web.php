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
    Route::get('index', 'TargetController@index')->name('target.index');
    Route::get('create', 'TargetController@create')->name('target.create');
    Route::post('store', 'TargetController@store')->name('target.store');
    Route::get('show/{id}', 'TargetController@show')->name('target.show');
    Route::get('edit/{id}', 'TargetController@edit')->name('target.edit');
    Route::post('update/{id}', 'TargetController@update')->name('target.update');
    Route::post('destroy/{id}', 'TargetController@destroy')->name('target.destroy');
});

Route::get('/user', 'UserController@index')->name('user.index')->middleware('auth');
Route::get('/user/userEdit', 'UserController@userEdit')->name('user.userEdit')->middleware('auth');
Route::post('/user/userEdit', 'UserController@userUpdate')->name('user.userUpdate')->middleware('auth');

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
