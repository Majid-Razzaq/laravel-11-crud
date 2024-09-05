<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[UserController::class,'index'])->name('home');
Route::get('/create',[UserController::class,'createPage'])->name('form');
Route::post('/create',[UserController::class,'store'])->name('store');
Route::get('/edit/{id}',[UserController::class,'editPage'])->name('editPage');
Route::post('/update/{id}',[UserController::class,'update'])->name('updatePage');
Route::delete('/delete',[UserController::class,'destroy'])->name('destroy');

