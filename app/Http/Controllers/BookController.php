<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with(['author', 'genre', 'user'])->get();
        return Inertia::render('Books', [
            'books' => $books
        ]);
    }

    public function searchBook(Request $request)
    {
        $search = $request->input('search');
        $books = Book::with(['author', 'genre', 'user'])
            ->where('title', 'like', '%' . $search . '%')
            ->get();

        return response()->json(['books' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::with(['author', 'genre'])->findOrFail($id);
        $authors = Author::all();
        $genres = Genre::all();
        return Inertia::render('EditBook', [ // vista
            'book' => $book,
            'authors' => $authors,
            'genres' => $genres,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'published_date' => 'required|integer',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validated);
        return redirect()->route('books');// name de la ruta
    }

    /**
     * Show the form for creating a new resource.  
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return Redirect::to('/books');
    }
}
