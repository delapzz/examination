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

Route::get('/','ExpensesController@index');

Route::namespace('Admin')
->prefix('admin')
->name("admin.")
->middleware("can:admin_manager")
->group(function(){
Route:: resource('/users', 'UsersController');
});


Route::resource('expenses', 'ExpensesController');

});


