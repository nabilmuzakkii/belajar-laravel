@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <h2>Tambah Kategori</h2>

    @if($errors->any())
        <div style="color: red;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <label for="name">Nama Kategori:</label>
        <br>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            placeholder="Masukkan nama kategori"
            required
        >

        <br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('categories.index') }}">Kembali</a>
    </form>
@endsection
