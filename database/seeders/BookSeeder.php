<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Pemrograman PHP',
            'author' => 'Rizqi',
            'year' => 2022,
            'stock' => 10
        ]);

        Book::create([
            'title' => 'Laravel untuk Pemula',
            'author' => 'Jeki',
            'year' => 2023,
            'stock' => 15
        ]);

        Book::create([
            'title' => 'Basis Data',
            'author' => 'Zhilan',
            'year' => 2021,
            'stock' => 8
        ]);

        Book::create([
            'title' => 'Algoritma dan Pemrograman',
            'author' => 'Dadang',
            'year' => 2022,
            'stock' => 12
        ]);

        Book::create([
            'title' => 'Pemrograman Berorientasi Objek',
            'author' => 'Lukman',
            'year' => 2024,
            'stock' => 5
        ]);
    }
}
