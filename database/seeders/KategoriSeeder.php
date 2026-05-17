<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder {
    public function run(): void {
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Fiksi',     'deskripsi' => 'Novel dan cerpen fiksi'],
            ['nama_kategori' => 'Non-Fiksi', 'deskripsi' => 'Buku pengetahuan umum'],
            ['nama_kategori' => 'Sains',     'deskripsi' => 'Ilmu pengetahuan alam'],
            ['nama_kategori' => 'Teknologi', 'deskripsi' => 'Komputer dan teknologi'],
            ['nama_kategori' => 'Sejarah',   'deskripsi' => 'Buku sejarah dan budaya'],
        ]);
    }
}