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
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/',function () {
        return view('home');
    });
    
});



Route::get('/home', 'HomeController@index')->name('home');
Route::resource('expenses', 'ExpensesController');

Route::namespace('Admin')
->prefix('admin')
->name("admin.")
->middleware("can:admin_manager")
->group(function(){
    Route:: resource('/users', 'UsersController', ['except' => ['show','create','store' ]]);
});