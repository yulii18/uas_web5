@extends('components.auth-layout')

@section('title', 'Login')
@section('section_title', 'Selamat Datang Kembali')
@section('section_description', 'Login dengan akun Anda')

@section('content')
<div class="card shadow">
    <div class="card-header text-white text-center"
         style="background:#013C58">
        <h5 class="mb-0">Login</h5>
    </div>
    <div class="card-body">

        {{-- Pesan sukses setelah register --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Error login --}}
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('auth.authenticate') }}" method="POST">
            @csrf

            <!-- Email (bukan username!) -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       placeholder="Email Anda" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password"
                       class="form-control"
                       placeholder="Password Anda" required>
            </div>

            <button type="submit" class="btn w-100 text-white fw-bold"
                    style="background:#013C58">
                Login
            </button>
        </form>

        <div class="text-center mt-3">
            <small>Belum punya akun?
                <a href="{{ route('auth.register') }}" class="fw-semibold">Daftar</a>
            </small>
        </div>
    </div>
</div>
@endsection