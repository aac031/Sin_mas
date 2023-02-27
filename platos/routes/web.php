<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Rutas para autenticación
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');
Route::get('/dishes/create', [DishController::class, 'create'])->name('dishes.create');
Route::post('/dishes', [DishController::class, 'store'])->name('dishes.store');
Route::get('/dishes/{dish}', [DishController::class, 'show'])->name('dishes.show');
Route::delete('/dishes/{dish}', [DishController::class, 'destroy'])->name('dishes.destroy');
