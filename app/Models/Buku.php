<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model {
    protected $table = 'buku';
    protected $fillable = [
        'kategori_id','judul','penulis','penerbit',
        'tahun_terbit','isbn','stok','deskripsi','cover'
    ];

    // Belongs to Kategori (Many-to-One)
    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }

    // One-to-Many: 1 Buku bisa dipinjam berkali-kali
    public function peminjamans() {
        return $this->hasMany(Peminjaman::class);
    }
}