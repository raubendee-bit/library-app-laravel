<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Required for file deletion if needed

class BookController extends Controller
{
    // 1. LOOKUP: Show all books
    public function index()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }

    // 2. INSERT: Save a new book with an optional photo
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validate image
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            // Stores file in storage/app/public/books
            $path = $request->file('photo')->store('books', 'public');
        }

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'photo' => $path,
            'is_borrowed' => false,
        ]);

        return redirect()->back()->with('success', 'Book added successfully!');
    }

    // 3. BORROW: Set status to true
    public function borrow($id)
    {
        $book = Book::findOrFail($id);
        $book->update(['is_borrowed' => true]);

        return redirect()->back()->with('success', 'Book marked as borrowed.');
    }

    // 4. RETURN: Set status back to false
    public function returnBook($id)
    {
        $book = Book::findOrFail($id);
        $book->update(['is_borrowed' => false]);

        return redirect()->back()->with('success', 'Book returned to library.');
    }
}