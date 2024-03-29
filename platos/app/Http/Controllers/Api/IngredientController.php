<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return response()->json($ingredients);
    }

    public function show($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return response()->json($ingredient);
    }

    public function store(Request $request)
    {
        $ingredient = Ingredient::create($request->all());
        return response()->json($ingredient, 201);
    }

    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($request->all());
        return response()->json($ingredient, 200);
    }

    public function delete($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return response()->json(null, 204);
    }
}
