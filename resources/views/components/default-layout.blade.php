<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Digital')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color: #00537A;">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="{{ url('/dashboard') }}">
                <i class="fas fa-book me-2"></i> Perpustakaan Digital
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-user me-1"></i> {{ auth()->user()->nama ?? 'User' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ url('/logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- SIDEBAR + MAIN CONTENT -->
    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
            <div class="col-md-2 p-0">
                <div class="bg-white border-end vh-100 p-3" style="width: 250px;">
                    <h5 class="text-center mb-3" style="color: #00537A;">Menu Utama</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a class="nav-link text-dark" href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
                        <li class="nav-item mb-2"><a class="nav-link text-dark" href="{{ url('/buku') }}"><i class="fas fa-book me-2"></i> Data Buku</a></li>
                        <li class="nav-item mb-2"><a class="nav-link text-dark" href="{{ url('/anggota') }}"><i class="fas fa-users me-2"></i> Data Anggota</a></li>
                        <li class="nav-item mb-2"><a class="nav-link text-dark" href="{{ url('/peminjaman') }}"><i class="fas fa-hand-holding-heart me-2"></i> Peminjaman</a></li>
                        <li class="nav-item mb-2"><a class="nav-link text-dark" href="{{ url('/pengembalian') }}"><i class="fas fa-undo-alt me-2"></i> Pengembalian</a></li>
                        @auth
                        @if(auth()->user()->role == 'admin')
                        <li class="nav-item mb-2"><a class="nav-link text-dark" href="{{ url('/laporan') }}"><i class="fas fa-chart-line me-2"></i> Laporan</a></li>
                        @endif
                        @endauth
                    </ul>
                </div>
            </div>

            <!-- MAIN CONTENT -->
            <div class="col-md-10 p-4">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-warning alert-dismissible fade show">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>