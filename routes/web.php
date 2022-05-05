<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('card/',[CardController::class,'index'])->name('card')->middleware('auth');
Route::get('menu/{slug}',[MenuController::class,'show'])->name('show')->middleware('auth');
Route::get('/orders',[OrderController::class,'index'])->name('orders')->middleware('auth');
Route::get('/reservation',[ReservationController::class,'index'])->name('reservation')->middleware('auth');
Route::delete('/reservation/{id}',[ReservationController::class,'destroy'])->name('reservation.destroy')->middleware('auth');

Route::get('admin/dashboard',[AdminController::class,'index'])->middleware(['admin'])->name('dashboard');
Route::resource('admin/menu',MenuController::class)->middleware(['admin']);
Route::resource('admin/categories',CategoryController::class)->middleware(['admin']);
Route::get('admin/reservations',[ReservationController::class,'getAll'])->middleware(['admin'])->name('admin.reservations');
Route::delete('admin/reservations/{id}',[ReservationController::class,'admin_delete'])->middleware(['admin'])->name('admin.reservations.destroy');
Route::get('admin/orders',[OrderController::class,'getAll'])->name('admin.orders')->middleware(['admin']);
Route::delete('admin/orders/{id}',[OrderController::class,'admin_delete'])->middleware(['admin'])->name('admin.orders.destroy');
Route::put('admin/dashboard/{id}',[AdminController::class,'setAdmin'])->middleware(['admin'])->name('setAdmin');