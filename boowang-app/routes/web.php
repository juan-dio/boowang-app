<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth::routes();

Route::get('/', [CustomerController::class, 'index'])->name('home');
Route::get('/wisata', [CustomerController::class, 'show'])->name('wisata');
Route::get('/wisata/{place}', [CustomerController::class, 'detail']);
Route::get('/pesan/{place}', [CustomerController::class, 'pesan'])->middleware('auth');
Route::post('/pesan/{place}', [CustomerController::class, 'makePesan'])->middleware('auth');
Route::get('/bayar/{transaction}', [CustomerController::class, 'bayar'])->middleware('auth');
Route::post('/bayar/{transaction}', [CustomerController::class, 'payBayar'])->middleware('auth');
Route::post('/bayar/{transaction}/cancel', [CustomerController::class, 'cancelBayar'])->middleware('auth');
Route::get('/tiket', [CustomerController::class, 'showTiket'])->name('tiket')->middleware('auth');
Route::get('/riwayat', [CustomerController::class, 'showRiwayat'])->name('riwayat')->middleware('auth');
Route::get('/profil', [CustomerController::class, 'showProfil'])->name('profil')->middleware('auth');
Route::get('/cektiket', [CustomerController::class, 'cekTiket'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'autenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/changepassword', [ChangePasswordController::class, 'index'])->name('password')->middleware('auth');
Route::post('/changepassword', [ChangePasswordController::class, 'change'])->name('password')->middleware('auth');

Route::get('/register', [RegisterController::class, 'customer'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'createCustomer']);

Route::get('/register/admin', [RegisterController::class, 'admin'])->name('register_admin')->middleware('guest');
Route::post('/register/admin', [RegisterController::class, 'createAdmin']);

Route::middleware('admin')->group(function () {
  Route::resource('/manage/categories', CategoryController::class);
  Route::resource('/manage/places', PlaceController::class);
  Route::get('/manage/transactions', [AdminController::class, 'transactions'])->name('transactions');
  Route::get('/manage/customers', [AdminController::class, 'customers'])->name('customers');
});