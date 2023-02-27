<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::with(['user', 'type'])->get();

        return view('dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $users = User::all();

        return view('dishes.create', compact('types', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type_id' => 'required',
            'user_id' => 'required',
        ]);

        $dish = Dish::create([
            'name' => $validatedData['name'],
            'type_id' => $validatedData['type_id'],
            'user_id' => $validatedData['user_id'],
        ]);

        return redirect()->route('dishes.index')->with('success', 'El plato ha sido creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return view('dishes.show', compact('dish'));
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
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect()->route('dishes.index')->with('success', 'El plato ha sido eliminado correctamente.');
    }
}
