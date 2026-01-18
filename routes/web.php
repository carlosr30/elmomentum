<?php

use Illuminate\Support\Facades\Route;

Route::get('/auth/{provider}/redirect', [App\Http\Controllers\Auth\AuthController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [App\Http\Controllers\Auth\AuthController::class, 'callback']);
Route::get('/test', [App\Http\Controllers\Controller::class, 'test']);
