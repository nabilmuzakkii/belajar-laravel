@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
    <h2>Form Peminjaman Buku</h2>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf

        <div>
            <label>Nama Member</label><br>
            <select name="member_id" required>
                <option value="">-- Pilih Member --</option>

                @foreach($members as $member)
                    <option value="{{ $member->id }}"
                        {{ old('member_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            <label>Judul Buku</label><br>
            <select name="book_id" required>
                <option value="">-- Pilih Buku --</option>

                @foreach($books as $book)
                    <option value="{{ $book->id }}"
                        {{ old('book_id') == $book->id ? 'selected' : '' }}>
                        {{ $book->title }} (Stok: {{ $book->stock }})
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            <label>Tanggal Peminjaman</label><br>
            <input type="date"
                   name="borrowed_at"
                   value="{{ old('borrowed_at', date('Y-m-d')) }}"
                   required>
        </div>

        <br>

        <div>
            <label>Tanggal Jatuh Tempo</label><br>
            <input type="date"
                   name="due_date"
                   value="{{ old('due_date') }}">
        </div>

        <br>

        <button type="submit">Simpan Peminjaman</button>

        <a href="{{ route('borrowings.index') }}">Kembali</a>
    </form>
@endsection
