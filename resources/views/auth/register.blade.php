@extends('components.auth-layout')

@section('title', 'Register')
@section('section_title', 'Daftar Akun Baru')
@section('section_description', 'Buat akun untuk mengakses sistem perpustakaan')

@section('content')
<div class="card shadow">
    <div class="card-header text-white text-center"
         style="background:#013C58">
        <h5 class="mb-0">Register</h5>
    </div>
    <div class="card-body">

        {{-- Tampilkan error validasi --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}"
                       placeholder="Nama lengkap Anda" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       placeholder="email@contoh.com" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Minimal 6 karakter" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                       class="form-control"
                       placeholder="Ulangi password" required>
            </div>

            <button type="submit" class="btn w-100 text-white fw-bold"
                    style="background:#F5A201">
                Daftar
            </button>
        </form>

        <div class="text-center mt-3">
            <small>Sudah punya akun?
                <a href="{{ route('auth.login') }}" class="fw-semibold">Login</a>
            </small>
        </div>
    </div>
</div>
@endsection