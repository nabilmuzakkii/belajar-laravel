@extends('layouts.app')

@section('title', 'Daftar Member')

@section('content')

    <h2>Daftar Member</h2>

    <ul>
        @foreach($members as $member)
            <li>
                <strong>{{ $member['name'] }}</strong>
                - {{ $member['email'] }}
            </li>
        @endforeach
    </ul>

@endsection