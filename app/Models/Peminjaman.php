<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model {
    protected $fillable = [
        'anggota_id','buku_id','user_id',
        'tgl_pinjam','tgl_kembali_rencana','status'
    ];
    protected $casts = [
        'tgl_pinjam'          => 'date',
        'tgl_kembali_rencana' => 'date',
    ];

    public function anggota()     { return $this->belongsTo(Anggota::class); }
    public function buku()        { return $this->belongsTo(Buku::class); }
    public function user()        { return $this->belongsTo(User::class); }

    // One-to-One: 1 Peminjaman punya 1 Pengembalian
    public function pengembalian(){ return $this->hasOne(Pengembalian::class); }
}