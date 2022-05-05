<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', [FoodController::class, 'index']);
Route::get('/lunch', [FoodController::class, 'lunch']);
Route::get('/breakfast', [FoodController::class, 'breakfast']);
Route::get('/dinner', [FoodController::class, 'dinner']);
Route::get('/categories', [FoodController::class, 'getCategories']);
Route::get('/menu/{id}', [FoodController::class, 'filterMenu']);
Route::get('/cardshop/{id}', [CardController::class, 'getCard']);
Route::delete('/cardshop/{id}', [CardController::class, 'delete']);
Route::post('/food', [CardController::class, 'store']);
Route::get('/food/{slug}', [MenuController::class, 'showItem']);
Route::get('/addToCard', [CardController::class, 'addTocard']);

Route::post('/order',[OrderController::class,'store']);
Route::post('/reservation',[ReservationController::class,'store']);
