<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Gender;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with(['gender', 'authors', 'user'])->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = Gender::all(); // Obtener todos los géneros
        $authors = Author::all(); // Obtener todos los autores

        return view('books.create', compact('genders', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // En el controlador
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'isbn' => 'required|unique:books|max:255',
            'published_at' => 'nullable|date',
            'gender_id' => 'required',
            'author_id' => 'required'
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->published_at = $request->published_at;
        $book->gender_id = $request->gender_id;
        $book->user_id = auth()->user()->id;
        $book->save();

        $book->authors()->attach($request->author_id);

        return redirect()->route('books.index')->with('success', 'Libro agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $authors = $book->authors;
        return view('books.show', compact('book', 'authors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book, $id)
    {
        $this->authorize('delete', $book);

        $book = Book::findOrFail($id);
        $book->authors()->detach(); // eliminar los registros relacionados en author_book
        $book->delete(); // eliminar el registro de la tabla books
        return redirect()->route('books.index');
    }
}
