<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // $books = [
        //     [
        //         'title' => 'Pemrograman PHP',
        //         'author' => 'Rizqi',
        //         'year' => 2022
        //     ],
        //     [
        //         'title' => 'Laravel untuk Pemula',
        //         'author' => 'Jeki',
        //         'year' => 2023
        //     ],
        //     [
        //         'title' => 'Basis Data',
        //         'author' => 'Zhilan',
        //         'year' => 2021
        //     ],
        //     [
        //         'title' => 'Algoritma dan Pemrograman',
        //         'author' => 'Dadang',
        //         'year' => 2022
        //     ],
        //     [
        //         'title' => 'Pemrograman Berorientasi Objek',
        //         'author' => 'Lukman',
        //         'year' => 2024
        //     ]
        // ];

        $books = Book::all();

        return view('Books.index', compact('books'));
    }

    public function show($id)
    {
        return view('Books.show', compact('id'));
    }
}