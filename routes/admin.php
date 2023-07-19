<?php

use Illuminate\Support\Facades\Route;

Route::get('/Admin-login',[App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/Admin/Home',[App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');
