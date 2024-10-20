<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CancelFlatController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;



// Route::resource(name: '',HomeController::class);


Route::get('/register',[AuthController::class, 'loadRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register'])->name('register.store');
Route::get('/login',[AuthController::class,'loadLogin'])->name('login.page');
Route::post('/login',[AuthController::class,'userLogin'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');



Route::get('property', [PropertyController::class, 'index_front'])->name('property.front');
Route::get('service', [ServiceController::class, 'index_front'])->name('service.front');
Route::get('about', [AboutController::class, 'index_front'])->name('about.front');
Route::get('/', [HomeController::class, 'index'])->name('home');


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('example1');
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->name('example2');

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::group(['middleware' => ['auth', 'role:admin,user']], function () {


Route::resource('agents', AgentController::class);
Route::resource('owners', OwnerController::class);
Route::resource('customers', CustomerController::class);
Route::resource('payments', PaymentController::class);
Route::resource('complains', ComplainController::class);
Route::get('/bill/users',[BillController::class,'billingHistory'])->name('billinghistory');
Route::resource('bills',BillController::class);
Route::resource('cancel_flat',CancelFlatController::class);


Route::resource('propertys', PropertyController::class);
Route::resource('contacts', ContactController::class);
Route::resource('services', ServiceController::class);
Route::resource('abouts', AboutController::class);

Route::get('/dashboard', function () {
    return view('backend.dashboard.dashboard');
})->name('dashboard');


});

Route::group(['middleware' => 'auth'], function () {

    Route::get('complain', [ComplainController::class, 'index2'])->name('complain.front');
    Route::get('contact', [ContactController::class, 'index_front'])->name('contact.front');
    Route::get('payment', [PaymentController::class, 'index2'])->name('payment.front');


 });