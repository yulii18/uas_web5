<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login') — Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- kalau ada app.css tambahkan di sini, kalau tidak ada skip dulu --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center min-vh-100 align-items-center">
            <div class="col-md-6 col-lg-5">

                {{-- Logo / header sistem --}}
                <div class="text-center mb-4">
                    <h4 class="fw-bold text-primary">📚 Perpustakaan Digital</h4>
                </div>

                {{-- Section title (judul form) --}}
                @hasSection('section_title')
                <div class="text-center mb-3">
                    <h5 class="fw-semibold">@yield('section_title')</h5>
                    <p class="text-muted small">@yield('section_description')</p>
                </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>