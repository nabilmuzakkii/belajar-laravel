@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h2>{{ $title }}</h2>

    <p>{{ $description }}</p>

    <h3>Ringkasan Data Perpustakaan</h3>

    <table border="1" cellpadding="15" cellspacing="0" width="100%">
        <tr>
            <th>Total Buku</th>
            <th>Total Member</th>
            <th>Total Kategori</th>
        </tr>
        <tr align="center">
            <td>{{ $bookCount }}</td>
            <td>{{ $memberCount }}</td>
            <td>{{ $categoryCount }}</td>
        </tr>
    </table>

    <br>

    <h3>Ringkasan Transaksi</h3>

    <table border="1" cellpadding="15" cellspacing="0" width="100%">
        <tr>
            <th>Total Peminjaman</th>
            <th>Sedang Dipinjam</th>
            <th>Sudah Dikembalikan</th>
        </tr>
        <tr align="center">
            <td>{{ $borrowingCount }}</td>
            <td>{{ $activeBorrowingCount }}</td>
            <td>{{ $returnedCount }}</td>
        </tr>
    </table>

    <br>

    <h3>Menu Pengelolaan</h3>

    <ul>
        <li><a href="{{ route('books.index') }}">Kelola Buku</a></li>
        <li><a href="{{ route('members.index') }}">Kelola Member</a></li>
        <li><a href="{{ route('borrowings.index') }}">Kelola Peminjaman</a></li>
    </ul>

@endsection
