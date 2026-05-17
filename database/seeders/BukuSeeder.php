<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder {
    public function run(): void {
        DB::table('buku')->insert([
            [
                'kategori_id'  => 1,
                'judul'        => 'Laskar Pelangi',
                'penulis'      => 'Andrea Hirata',
                'penerbit'     => 'Bentang Pustaka',
                'tahun_terbit' => 2005,
                'isbn'         => '978-979-1227-00-1',
                'stok'         => 5,
                'deskripsi'    => 'Novel tentang semangat anak Belitung',
                'created_at'   => now(), 'updated_at' => now(),
            ],
            [
                'kategori_id'  => 4,
                'judul'        => 'Pemrograman Laravel',
                'penulis'      => 'Hidayat',
                'penerbit'     => 'Elex Media',
                'tahun_terbit' => 2023,
                'isbn'         => '978-602-04-0000-1',
                'stok'         => 8,
                'deskripsi'    => 'Panduan lengkap Laravel',
                'created_at'   => now(), 'updated_at' => now(),
            ],
            [
                'kategori_id'  => 1,
                'judul'        => 'Bumi Manusia',
                'penulis'      => 'Pramoedya Ananta Toer',
                'penerbit'     => 'Hasta Mitra',
                'tahun_terbit' => 1980,
                'isbn'         => '978-979-428-431-1',
                'stok'         => 3,
                'deskripsi'    => 'Tetralogi Buru pertama',
                'created_at'   => now(), 'updated_at' => now(),
            ],
        ]);
    }
}