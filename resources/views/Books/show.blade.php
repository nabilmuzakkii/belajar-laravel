
@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')

    <h2>Detail Buku</h2>

    <h3>{{ $book->title }}</h3>

    <p>Penulis: {{ $book->author }}</p>
    <p>Tahun: {{ $book->year }}</p>
    <p>Stok: {{ $book->stock }}</p>

    <p>
        <a href="{{ route('books.edit', $book->id) }}">Edit Buku</a>
        |
        <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
    </p>

@endsection
