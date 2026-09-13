<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     //return 'Daftar Buku';
//     return view('book.index');
// });

Route::get('/books', [BookController::class, 'index']);
