<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder {
    public function run(): void {
        User::create([
            'name'     => 'Admin Perpustakaan',
            'email'    => 'admin@perpus.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);
        User::create([
            'name'     => 'Petugas Satu',
            'email'    => 'petugas@perpus.com',
            'password' => Hash::make('password'),
            'role'     => 'petugas',
        ]);
    }
}