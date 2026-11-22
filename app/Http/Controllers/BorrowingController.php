<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['member', 'book', 'user'])
            ->latest()
            ->get();

        return view('borrowing.index', compact('borrowings'));
    }

    public function create()
    {
        $members = Member::orderBy('name')->get();

        $books = Book::where('stock', '>', 0)
            ->orderBy('title')
            ->get();

        return view('borrowing.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
            'due_date' => 'nullable|date|after_or_equal:borrowed_at',
        ]);

        DB::transaction(function () use ($validated) {
            $book = Book::whereKey($validated['book_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($book->stock < 1) {
                throw new \RuntimeException('Stok buku sedang habis.');
            }

            Borrowing::create([
                'member_id' => $validated['member_id'],
                'book_id' => $book->id,
                'user_id' => Auth::id(),
                'borrowed_at' => $validated['borrowed_at'],
                'due_date' => $validated['due_date'] ?? null,
                'status' => 'dipinjam',
            ]);

            $book->decrement('stock');
        });

        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman buku berhasil dicatat.');
    }

    public function returnBook(Borrowing $borrowing)
    {
        DB::transaction(function () use ($borrowing) {
            $borrowing = Borrowing::whereKey($borrowing->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($borrowing->status !== 'dipinjam') {
                throw new \RuntimeException('Buku ini sudah dikembalikan.');
            }

            $book = Book::whereKey($borrowing->book_id)
                ->lockForUpdate()
                ->firstOrFail();

            $borrowing->update([
                'status' => 'dikembalikan',
                'returned_at' => now()->toDateString(),
            ]);

            $book->increment('stock');
        });

        return redirect()->route('borrowings.index')
            ->with('success', 'Buku berhasil dikembalikan.');
    }
}
