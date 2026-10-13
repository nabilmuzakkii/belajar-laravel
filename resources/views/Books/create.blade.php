
@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')

    <h2>Tambah Buku</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label>Judul Buku:</label>
            <input type="text" name="title" required>
        </div>

        <div>
            <label>Penulis:</label>
            <input type="text" name="author" required>
        </div>

        <div>
            <label>Tahun:</label>
            <input type="number" name="year" required>
        </div>

        <div>
            <label>Stok:</label>
            <input type="number" name="stock" min="0" required>
        </div>

        <button type="submit">Simpan</button>
    </form>

    <p>
        <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
    </p>

@endsection
