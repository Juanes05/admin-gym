<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('', [AdminController::class,'index']);

Route::resource('customers', App\Http\Controllers\Admin\CustomerController::class)->middleware('auth');