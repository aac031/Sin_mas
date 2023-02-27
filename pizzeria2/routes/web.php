<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

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

// routes/web.php

// Rutas para el controlador de login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/pizzas', [PizzaController::class, 'index'])->name('pizzas.index');
    Route::get('/pizzas/create', [PizzaController::class, 'create'])->name('pizzas.create');
    Route::post('/pizzas', [PizzaController::class, 'store'])->name('pizzas.store');
    Route::get('/pizzas/{id}', [PizzaController::class, 'show'])->name('pizzas.show');
    Route::delete('/pizzas/{pizza}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');
    Route::post('/pizzas/{id}/ingredients', [PizzaController::class, 'addIngredients'])->name('pizzas.addIngredients');

    Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
    Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
    Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
});

// Route::get('/ingredients/list', [IngredientController::class, 'listIngredients'])->name('ingredients.list');
Route::get('/session', [IngredientController::class, 'listIngredients'])->name('ingredients.list');
Route::get('/ingredients/{id}/save', [IngredientController::class, 'saveIngredient'])->name('ingredients.save');
