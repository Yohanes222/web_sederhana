<?php

use App\Http\Controllers\authController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/redirect', [authController::class, "redirect"]);

Route::get('/auth/callback', [authController::class, "callback"]); 
