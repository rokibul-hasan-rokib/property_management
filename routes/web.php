<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('frontend.home.index');
});
Route::get('/dashboard', function () {
    return view('backend.dashboard.dashboard');
})->name('dashboard');
