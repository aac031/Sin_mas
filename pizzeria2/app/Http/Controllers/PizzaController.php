<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::with('user')->paginate(10);
        return view('pizzas.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
        ]);

        $pizza = new Pizza();
        $pizza->name = $request->input('name');
        $pizza->user_id = Auth::user()->id;
        $pizza->save();

        return redirect()->route('pizzas.index')->with('success', 'La pizza se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pizza = Pizza::with('ingredients')->find($id);
        $price = 0;
        foreach ($pizza->ingredients as $ingredient) {
            $price += $ingredient->price;
        }

        $ingredients = Ingredient::all(); // obtienes todos los ingredientes
        return view('pizzas.show', ['pizza' => $pizza, 'price' => $price, 'ingredients' => $ingredients]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pizza $pizza)
    {
        $pizza->delete();

        return redirect()->route('pizzas.index')
            ->with('success', 'Pizza deleted successfully');
    }

    public function addIngredients(Request $request, $id)
    {
        $pizza = Pizza::find($id);
        $ingredients = Ingredient::all();
        $selectedIngredients = $request->input('ingredients', []);
        $price = $pizza->price;

        // Actualizar la pizza con los ingredientes seleccionados
        foreach ($selectedIngredients as $ingredientId) {
            $ingredient = Ingredient::find($ingredientId);
            $pizza->ingredients()->attach($ingredient);
            $price += $ingredient->price;
        }

        // Redirigir de vuelta a la página de la pizza
        return redirect()->route('pizzas.show', ['id' => $pizza->id])
            ->with('success', 'Ingredientes añadidos correctamente.');
    }
}
