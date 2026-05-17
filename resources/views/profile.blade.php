@extends('components.default-layout')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header text-white fw-bold"
                     style="background:#013C58">
                    👤 Profile Saya
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-muted small">NAMA</label>
                        <div class="form-control bg-light">{{ $user->name }}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-muted small">EMAIL</label>
                        <div class="form-control bg-light">{{ $user->email }}</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-muted small">ROLE</label>
                        <div>
                            <span class="badge"
                                  style="background:{{ $user->role === 'admin' ? '#013C58' : '#F5A201' }};
                                         color:{{ $user->role === 'admin' ? '#A8E8F9' : '#013C58' }};
                                         font-size:13px;padding:6px 14px">
                                {{ ucfirst($user->role) }}
                            </span>
                        </div>
                    </div>

                    <!-- Tombol Logout -->
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn btn-danger w-100"
                                onclick="return confirm('Yakin ingin logout?')">
                            Logout
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection