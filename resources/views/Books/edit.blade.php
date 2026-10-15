
@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')

    <h2>Edit Buku</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Judul Buku:</label>
            <input
                type="text"
                name="title"
                value="{{ old('title', $book->title) }}"
            >
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Penulis Buku:</label>
            <input
                type="text"
                name="author"
                value="{{ old('author', $book->author) }}"
            >
            @error('author')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Tahun Terbit:</label>
            <input
                type="number"
                name="year"
                value="{{ old('year', $book->year) }}"
            >
            @error('year')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Stok Buku:</label>
            <input
                type="number"
                name="stock"
                value="{{ old('stock', $book->stock) }}"
            >
            @error('stock')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Update</button>
    </form>

    <p>
        <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
    </p>

@endsection
