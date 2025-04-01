<?php

use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PromotionController::class, 'index'])->name('home');
Route::resource('promotions', PromotionController::class);