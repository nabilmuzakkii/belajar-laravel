
@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

    <h2>Daftar Buku</h2>

    <a href="{{ route('books.create') }}">+ Tambah Buku</a>

    <hr>

    @foreach($books as $book)
        <div>
            <h3>{{ $book->title }}</h3>
            <p>Penulis: {{ $book->author }}</p>
            <p>Tahun: {{ $book->year }}</p>
            <p>Stok: {{ $book->stock }}</p>

            <a href="{{ route('books.show', $book->id) }}">
                Detail
            </a>

            |

            <a href="{{ route('books.edit', $book->id) }}">
                Edit
            </a>

            |

            <form action="{{ route('books.destroy', $book->id) }}"
                  method="POST"
                  style="display: inline;">
                @csrf
                @method('DELETE')

                <button type="submit"
                        onclick="return confirm('Yakin ingin menghapus buku ini?')">
                    Hapus
                </button>
            </form>
        </div>

        <hr>
    @endforeach

@endsection
