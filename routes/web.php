<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/users/auth', AuthUserController::class)->name('users.auth');
Route::get('/{any?}', AppController::class)->where('any', '[\/\w\.-]*')->name('root');
