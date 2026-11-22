@extends('layouts.app')

@section('title', 'Tambah Member')

@section('content')
    <h2>Tambah Member</h2>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div>
            <label>Nama Member</label><br>
            <input type="text" name="name"
                   value="{{ old('name') }}" required>
        </div>

        <br>

        <div>
            <label>Email</label><br>
            <input type="email" name="email"
                   value="{{ old('email') }}" required>
        </div>

        <br>

        <div>
            <label>Nomor Telepon</label><br>
            <input type="text" name="phone"
                   value="{{ old('phone') }}">
        </div>

        <br>

        <div>
            <label>Alamat</label><br>
            <textarea name="address" rows="4">{{ old('address') }}</textarea>
        </div>

        <br>

        <button type="submit">Simpan Member</button>
        <a href="{{ route('members.index') }}">Kembali</a>
    </form>
@endsection
