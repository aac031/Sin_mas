<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pizzas', [PizzaController::class, 'index'])->name('pizzas.index');
Route::get('/pizzas/{id}', [PizzaController::class, 'show'])->name('pizzas.show');
Route::post('/pizzas', [PizzaController::class, 'store'])->name('pizzas.store');
Route::put('/pizzas/{id}', [PizzaController::class, 'update'])->name('pizzas.update');
Route::delete('/pizzas/{id}', [PizzaController::class, 'delete'])->name('pizzas.delete');
