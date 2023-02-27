<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredient::with('user', 'type')->paginate(10);

        return view('ingredients.index', compact('ingredients'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('ingredients.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'type_id' => 'required|exists:types,id',
        ]);

        $ingredient = new Ingredient([
            'name' => $request->input('name'),
            'user_id' => Auth::id(),
            'type_id' => $request->input('type_id'),
        ]);
        $ingredient->save();

        return redirect()->route('ingredients.index')->with('success', 'El ingrediente se ha creado correctamente.');
    }

    public function saveIngredient($id)
    {
        $ingredient = Ingredient::find($id);

        if ($ingredient) {
            $ingredients = session()->get('ingredients', []);
            $ingredients[$id] = $ingredient;
            session()->put('ingredients', $ingredients);
        }

        return redirect()->route('ingredients.index');
    }

    public function listIngredients()
    {
        $ingredients = session()->get('ingredients', []);

        return view('ingredients.list', compact('ingredients'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
