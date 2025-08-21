<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::apiResource('authors', AuthorController::class);
Route::apiResource('books', BookController::class);
Route::get('books/author/{authorId}', [BookController::class, 'byAuthor']);
