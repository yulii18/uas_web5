<?php
namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Buku — admin bisa semua, petugas hanya lihat
        Gate::define('view-buku', fn(User $u) =>
            in_array($u->role, ['admin','petugas']));
        Gate::define('store-buku',   fn(User $u) => $u->role === 'admin');
        Gate::define('edit-buku',    fn(User $u) => $u->role === 'admin');
        Gate::define('destroy-buku', fn(User $u) => $u->role === 'admin');

        // Peminjaman
        Gate::define('view-peminjaman',  fn(User $u) =>
            in_array($u->role, ['admin','petugas']));
        Gate::define('store-peminjaman', fn(User $u) =>
            in_array($u->role, ['admin','petugas']));
        Gate::define('kembalikan-buku',  fn(User $u) => $u->role === 'admin');

        // Anggota
        Gate::define('view-anggota',    fn(User $u) =>
            in_array($u->role, ['admin','petugas']));
        Gate::define('store-anggota',   fn(User $u) => $u->role === 'admin');
        Gate::define('edit-anggota',    fn(User $u) => $u->role === 'admin');
        Gate::define('destroy-anggota', fn(User $u) => $u->role === 'admin');
    }
}