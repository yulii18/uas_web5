@extends('components.default-layout')

@section('title', 'Detail Peminjaman')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Peminjaman</h1>

    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Anggota:</label>
                    <p>{{ $peminjaman->anggota->nama ?? '-' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">No. Anggota:</label>
                    <p>{{ $peminjaman->anggota->no_anggota ?? '-' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Buku:</label>
                    <p>{{ $peminjaman->buku->judul ?? '-' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Tanggal Pinjam:</label>
                    <p>{{ $peminjaman->tgl_pinjam }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Tanggal Kembali Rencana:</label>
                    <p>{{ $peminjaman->tgl_kembali }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Status:</label>
                    <p><span class="badge {{ $peminjaman->status == 'dipinjam' ? 'bg-warning' : 'bg-success' }}">{{ $peminjaman->status }}</span></p>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ url('/peminjaman') }}" class="btn btn-secondary">Kembali</a>
                @if($peminjaman->status == 'dipinjam')
                <a href="{{ url('/pengembalian/create/'.$peminjaman->id_peminjaman) }}" class="btn btn-success">
                    <i class="fas fa-undo me-2"></i> Proses Pengembalian
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection