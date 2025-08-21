<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        $author = Author::create($validated);
        return response()->json($author, 201);
    }

    public function show(Author $author)
    {
        return $author;
    }

    public function update(Request $request, Author $author)
    {
        $author->update($request->only(['first_name', 'last_name']));
        return response()->json(['message' => 'Author updated']);
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return response()->json(['message' => 'Author deleted']);
    }
}
