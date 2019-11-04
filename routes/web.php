<?php

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

    Route::namespace('ExpenseCategory')
        ->prefix('expenseCategory')
        ->name('expense.')
        ->group(function(){
            Route::resource('/expenses', 'ExpensesController');
    });

});