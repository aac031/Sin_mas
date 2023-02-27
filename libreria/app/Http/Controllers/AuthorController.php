<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $author = new Author;
        $author->name = $request->name;
        $author->email = $request->email;
        $author->save();

        return response()->json($author, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        return response()->json($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        $author->name = $request->name ?? $author->name;
        $author->email = $request->email ?? $author->email;
        $author->save();

        return response()->json($author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        $author->delete();

        return response()->json(['message' => 'Author deleted']);
    }
}
