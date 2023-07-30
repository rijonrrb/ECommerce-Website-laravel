<?php

use Illuminate\Support\Facades\Route;

Route::get('/Admin-login',[App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');
// Route::get('/Admin/Home',[App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');

Route::group(['namespace'=>'App\Http\Controllers\Admin', 'middleware'=>'is_admin'], function()
{
    Route::get('/Admin/Home', 'AdminController@admin')->name('admin.home');
    Route::get('/Admin/Logout', 'AdminController@logout')->name('admin.logout');
    //Category routes
    Route::group(['prefix' => 'category'], function() {
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('store', 'CategoryController@store')->name('category.store');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
        Route::get('/edit/{id}','CategoryController@edit');
		Route::post('/update','CategoryController@update')->name('category.update');
    });
    //Subcategory routes
    Route::group(['prefix' => 'subcategory'], function() {
        Route::get('/', 'SubcategoryController@index')->name('subcategory.index');
        Route::post('store', 'SubcategoryController@store')->name('subcategory.store');
        Route::get('/delete/{id}', 'SubcategoryController@delete')->name('subcategory.delete');
        Route::get('/edit/{id}','SubcategoryController@edit');
        Route::post('/update','SubcategoryController@update')->name('subcategory.update');
      
    });

    //childcategory routes
	Route::group(['prefix'=>'childcategory'], function(){
		Route::get('/','ChildcategoryController@index')->name('childcategory.index');
		Route::post('/store','ChildcategoryController@store')->name('childcategory.store');
		Route::get('/delete/{id}','ChildcategoryController@destroy')->name('childcategory.delete');
		Route::get('/edit/{id}','ChildcategoryController@edit');
		Route::post('/update','ChildcategoryController@update')->name('childcategory.update');
	});
    
	//Brand Routes
	Route::group(['prefix'=>'brand'], function(){
		Route::get('/','BrandController@index')->name('brand.index');
		Route::post('/store','BrandController@store')->name('brand.store');
		Route::get('/delete/{id}','BrandController@destroy')->name('brand.delete');
		Route::get('/edit/{id}','BrandController@edit');
		Route::post('/update','BrandController@update')->name('brand.update');
	});

});