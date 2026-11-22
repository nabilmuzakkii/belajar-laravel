<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Member;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Library System Dashboard';
        $description = 'Selamat datang di Sistem Informasi Perpustakaan.';

        $bookCount = Book::count();
        $memberCount = Member::count();
        $categoryCount = Category::count();

        $borrowingCount = Borrowing::count();

        $activeBorrowingCount = Borrowing::where('status', 'dipinjam')->count();

        $returnedCount = Borrowing::where('status', 'dikembalikan')->count();

        return view('dashboard.index', compact(
            'title',
            'description',
            'bookCount',
            'memberCount',
            'categoryCount',
            'borrowingCount',
            'activeBorrowingCount',
            'returnedCount'
        ));
    }
}
