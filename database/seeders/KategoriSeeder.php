<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::create([
            'nama_kategori' => 'Fiksi',
            'deskripsi' => 'Novel dan cerpen fiksi'
        ]);

        Kategori::create([
            'nama_kategori' => 'Teknologi',
            'deskripsi' => 'Komputer dan teknologi'
        ]);
    }
}