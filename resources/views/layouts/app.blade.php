<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library System')</title>
</head>
<body>

    <header>
        <h1>Library System</h1>

        <nav>
            <a href="/dashboard">Dashboard</a> |
            <a href="{{ route('books.index') }}">Books</a> |
            <a href="/categories">Categories</a> |
            <a href="{{ route('members.index') }}">Members</a> |
            <a href="{{ route('borrowings.index') }}">Peminjaman</a>

            @can('manage-users')
                | <a href="{{ route('users.index') }}">Kelola Pengguna</a>
            @endcan

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>

        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>Library System</p>
    </footer>

</body>
</html>
