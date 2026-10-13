
@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')

    <h2>Edit Buku</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Judul Buku:</label>
            <input type="text" name="title"
                   value="{{ $book->title }}" required>
        </div>

        <div>
            <label>Penulis:</label>
            <input type="text" name="author"
                   value="{{ $book->author }}" required>
        </div>

        <div>
            <label>Tahun:</label>
            <input type="number" name="year"
                   value="{{ $book->year }}" required>
        </div>

        <div>
            <label>Stok:</label>
            <input type="number" name="stock"
                   value="{{ $book->stock }}" min="0" required>
        </div>

        <button type="submit">Update</button>
    </form>

    <p>
        <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
    </p>

@endsection
