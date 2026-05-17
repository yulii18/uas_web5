@props(['title' => 'Login'])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>{{ $title }} — Perpustakaan</title>
</head>
<body class="auth-body">
    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="auth-logo">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                    <rect width="40" height="40" rx="10" fill="#013C58"/>
                    <path d="M10 12h12v2H10zm0 5h20v2H10zm0 5h16v2H10z" fill="#FFBA42"/>
                </svg>
                <span>Perpustakaan Digital</span>
            </div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>