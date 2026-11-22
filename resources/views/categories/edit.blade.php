@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    <h2>Edit Kategori</h2>

    @if($errors->any())
        <div style="color: red;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nama Kategori:</label>
        <br>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $category->name) }}"
            required
        >

        <br><br>

        <button type="submit">Update</button>
        <a href="{{ route('categories.index') }}">Kembali</a>
    </form>
@endsection
