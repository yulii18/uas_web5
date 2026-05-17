<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model {
    protected $fillable = ['nama_kategori', 'deskripsi'];

    // One-to-Many: 1 Kategori punya banyak Buku
    public function buku() {
        return $this->hasMany(Buku::class);
    }
}