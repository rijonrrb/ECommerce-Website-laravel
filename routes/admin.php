<?php

use Illuminate\Support\Facades\Route;

Route::get('/Admin-login',[App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');
// Route::get('/Admin/Home',[App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');

Route::group(['namespace'=>'App\Http\Controllers\Admin', 'middleware'=>'is_admin'], function()
{
    Route::get('/Admin/Home', 'AdminController@admin')->name('admin.home');
    Route::get('/Admin/Logout', 'AdminController@logout')->name('admin.logout');

    Route::group(['prefix' => 'category'], function() {
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('store', 'CategoryController@store')->name('category.store');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
    });
});