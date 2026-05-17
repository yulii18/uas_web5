@props(['title' => 'Perpustakaan', 'pageTitle' => ''])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>{{ $title }} — Perpustakaan</title>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="navbar-brand">
        <svg width="32" height="32" viewBox="0 0 40 40" fill="none">
            <rect width="40" height="40" rx="8" fill="#013C58"/>
            <path d="M10 12h12v2H10zm0 5h20v2H10zm0 5h16v2H10z" fill="#FFBA42"/>
        </svg>
        <span>Perpustakaan</span>
    </div>
    <div class="navbar-right">
        <span class="navbar-user">{{ Auth::user()->name }}</span>
        <span class="badge-role">{{ Auth::user()->role }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Keluar</button>
        </form>
    </div>
</nav>

<div class="layout">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                📊 Dashboard</a></li>
            <li><a href="{{ route('buku.index') }}"
                class="{{ request()->routeIs('buku.*') ? 'active' : '' }}">
                📚 Data Buku</a></li>
            <li><a href="{{ route('anggota.index') }}"
                class="{{ request()->routeIs('anggota.*') ? 'active' : '' }}">
                👤 Data Anggota</a></li>
            <li><a href="{{ route('peminjaman.index') }}"
                class="{{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">
                📋 Peminjaman</a></li>
        </ul>
    </aside>

    <main class="main-content">
        {{-- Alert session --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-error">
                <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif

        <div class="page-header">
            <h1>{{ $pageTitle }}</h1>
            {{ $pageAction ?? '' }}
        </div>

        {{ $slot }}
    </main>
</div>
</body>
</html>