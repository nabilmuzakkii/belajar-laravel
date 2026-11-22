@extends('layouts.app')

@section('title', 'Daftar Member')

@section('content')
    <h2>Daftar Member</h2>

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

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('members.create') }}">+ Tambah Member</a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($members as $member)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phone ?? '-' }}</td>
                    <td>{{ $member->address ?? '-' }}</td>
                    <td>
                        <a href="{{ route('members.edit', $member->id) }}">
                            Edit
                        </a>

                        <form action="{{ route('members.destroy', $member->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus member ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">
                        Belum ada data member.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
