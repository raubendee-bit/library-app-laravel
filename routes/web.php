<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; // Step 1: Import the Controller

// 1. Home Page: Shows the list of books (Lookup)
Route::get('/', [BookController::class, 'index'])->name('books.index');

// 2. Action: Create a new book (Insert)
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// 3. Action: Update a book status (Borrow)
Route::patch('/books/{id}/borrow', [BookController::class, 'borrow'])->name('books.borrow');

// 4. Action: Update a book status (Return)
Route::patch('/books/{id}/return', [BookController::class, 'returnBook'])->name('books.return');