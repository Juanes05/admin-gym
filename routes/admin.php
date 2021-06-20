<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('', [AdminController::class,'index']);

Route::resource('customers', App\Http\Controllers\Admin\CustomerController::class)->middleware('auth');
Route::resource('pays', App\Http\Controllers\Admin\PayController::class)->middleware('auth');


Route::get('pays/create/{id}', [App\Http\Controllers\Admin\PayController::class,'create_by_id'])->middleware('auth')->name('create-by-id');

Route::get('customer/pays/show/{id}', [App\Http\Controllers\Admin\CustomerController::class,'showPays'])->middleware('auth')->name('show-pays-by-id');

