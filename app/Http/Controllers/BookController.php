<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'year' => 'required|integer',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book = Book::create($validated);
        return response()->json($book, 201);
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->only(['title', 'year', 'author_id']));
        return response()->json(['message' => 'Book updated']);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(['message' => 'Book deleted']);
    }

    public function byAuthor($authorId)
    {
        return Book::where('author_id', $authorId)->get();
    }
}
