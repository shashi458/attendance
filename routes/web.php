<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;



Route::get('/',[adminController::class,'index'])->name('login');
Route::get('/add/employee',[adminController::class,'addEmployee'])->name('add.employee');
Route::post('/store/employee',[adminController::class,'storeEmployee'])->name('store.employee');
