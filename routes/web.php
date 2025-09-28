<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register',[UserController::class,'create'])->name('register');
Route::post('/register',[UserController::class,'store'])->name('register.create');

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'auth'])->name('auth');

Route::get('/forgot-password', function () {
    //return view('auth.login');
})->name('forgot-password');


Route::get('/contacts', function () {
    return view('home');
})->name('contacts');
