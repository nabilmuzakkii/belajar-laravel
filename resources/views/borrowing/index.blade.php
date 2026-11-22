@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
    <h2>Daftar Peminjaman Buku</h2>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if(session('error'))
        <p style="color: red;">
            {{ session('error') }}
        </p>
    @endif

    <a href="{{ route('borrowings.create') }}">+ Tambah Peminjaman</a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Member</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($borrowings as $borrowing)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $borrowing->member->name }}</td>
                    <td>{{ $borrowing->book->title }}</td>
                    <td>{{ $borrowing->borrowed_at->format('d-m-Y') }}</td>
                    <td>
                        {{ $borrowing->due_date?->format('d-m-Y') ?? '-' }}
                    </td>
                    <td>
                        {{ $borrowing->returned_at?->format('d-m-Y') ?? '-' }}
                    </td>
                    <td>{{ ucfirst($borrowing->status) }}</td>
                    <td>
                        @if($borrowing->status === 'dipinjam')
                            <form action="{{ route('borrowings.return', $borrowing->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Proses pengembalian buku ini?')">
                                @csrf
                                @method('PATCH')

                                <button type="submit">Kembalikan</button>
                            </form>
                        @else
                            Selesai
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" align="center">
                        Belum ada transaksi peminjaman.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
