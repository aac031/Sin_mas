<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return response()->json($pizzas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizza = new Pizza;
        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->price = $request->price;
        $pizza->save();
        return response()->json($pizza, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pizza = Pizza::find($id);
        if (!$pizza) {
            return response()->json(['message' => 'Pizza no encontrada'], 404);
        }
        return response()->json($pizza);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pizza = Pizza::find($id);
        if (!$pizza) {
            return response()->json(['message' => 'Pizza no encontrada'], 404);
        }
        $pizza->name = $request->name ?? $pizza->name;
        $pizza->description = $request->description ?? $pizza->description;
        $pizza->price = $request->price ?? $pizza->price;
        $pizza->save();
        return response()->json($pizza);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pizza = Pizza::find($id);
        if (!$pizza) {
            return response()->json(['message' => 'Pizza no encontrada'], 404);
        }
        $pizza->delete();
        return response()->json(['message' => 'Pizza eliminada']);
    }
}
