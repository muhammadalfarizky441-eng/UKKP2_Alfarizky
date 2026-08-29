<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Uji Kompetensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { width: 250px; min-height: 100vh; background-color: #0d6efd; color: #fff; }
        .sidebar a { color: #fff; text-decoration: none; padding: 10px 15px; display: block; border-radius: 8px; margin-bottom: 5px; }
        .sidebar a:hover { background-color: rgba(255,255,255,0.2); }
        .content { flex: 1; padding: 20px; }
    </style>
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar hanya muncul jika bukan halaman login/register --}}
        @if (!request()->routeIs('login') && !request()->routeIs('register'))
            <aside class="sidebar p-3">
                <h4 class="text-center mb-4">Uji Kompetensi</h4>
                <nav>
                    <a href="/dashboard">🏠 Dashboard</a>
                    <a href="/barang">📦 Barang</a>
                    
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link text-white text-decoration-none mt-3">🚪 Logout</button>
                    </form>
                </nav>
            </aside>
        @endif

        <main class="content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>