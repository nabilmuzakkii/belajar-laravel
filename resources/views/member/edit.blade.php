@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
    <h2>Edit Member</h2>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nama Member</label><br>
            <input type="text" name="name"
                   value="{{ old('name', $member->name) }}" required>
        </div>

        <br>

        <div>
            <label>Email</label><br>
            <input type="email" name="email"
                   value="{{ old('email', $member->email) }}" required>
        </div>

        <br>

        <div>
            <label>Nomor Telepon</label><br>
            <input type="text" name="phone"
                   value="{{ old('phone', $member->phone) }}">
        </div>

        <br>

        <div>
            <label>Alamat</label><br>
            <textarea name="address" rows="4">{{ old('address', $member->address) }}</textarea>
        </div>

        <br>

        <button type="submit">Update Member</button>
        <a href="{{ route('members.index') }}">Kembali</a>
    </form>
@endsection
