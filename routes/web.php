<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[UserController::class,'index'])->name('home');
Route::get('/create',[UserController::class,'createPage'])->name('form');
Route::post('/create',[UserController::class,'store'])->name('store');
