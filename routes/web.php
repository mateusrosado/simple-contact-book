<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register',[UserController::class,'create'])->name('register');
Route::post('/register',[UserController::class,'store'])->name('register.store');

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'auth'])->name('auth');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('/forgot-password', function () {
})->name('forgot-password');

Route::middleware(['auth'])->group(function() {
    Route::get('/contacts', [ContactController::class,'index'])->name('contacts');
    Route::post('/contact', [ContactController::class,'store'])->name('contact.store');
});