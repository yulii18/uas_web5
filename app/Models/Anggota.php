<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model {
    protected $fillable = [
        'no_anggota','nama','email','telepon','alamat','tgl_daftar','status'
    ];

    // One-to-Many: 1 Anggota punya banyak Peminjaman
    public function peminjamans() {
        return $this->hasMany(Peminjaman::class);
    }
}