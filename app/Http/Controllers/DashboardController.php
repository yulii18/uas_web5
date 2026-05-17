<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;

class DashboardController extends Controller {
    public function index() {
        return view('dashboard', [
            'totalBuku'         => Buku::count(),
            'totalAnggota'      => Anggota::where('status','aktif')->count(),
            'totalDipinjam'     => Peminjaman::where('status','dipinjam')->count(),
            'totalTerlambat'    => Peminjaman::where('status','terlambat')->count(),
            'peminjamanTerbaru' => Peminjaman::with(['anggota','buku'])
                                    ->latest()->take(5)->get(),
        ]);
    }
}
      