<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('backend.dashboard.dashboard');
})->name('dashboard');

// Route::resource(name: '',HomeController::class);

Route::resource('propertys', PropertyController::class);
Route::resource('contacts', ContactController::class);
Route::resource('services', ServiceController::class);
Route::resource('abouts', AboutController::class);



Route::get('property', [PropertyController::class, 'index_front'])->name('property.front');
Route::get('contact', [ContactController::class, 'index_front'])->name('contact.front');
Route::get('service', [ServiceController::class, 'index_front'])->name('service.front');
Route::get('about', [AboutController::class, 'index_front'])->name('about.front');
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::resource('agents', AgentController::class);
