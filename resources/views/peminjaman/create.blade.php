@extends('components.default-layout')

@section('title', 'Tambah Peminjaman')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Peminjaman</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ url('/peminjaman') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Anggota</label>
                        <select name="id_anggota" class="form-control" required>
                            <option value="">Pilih Anggota</option>
                            @foreach($anggota as $ang)
                            <option value="{{ $ang->id_anggota }}">{{ $ang->nama }} ({{ $ang->no_anggota }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Buku</label>
                        <select name="id_buku" class="form-control" required>
                            <option value="">Pilih Buku</option>
                            @foreach($buku as $bk)
                            <option value="{{ $bk->id_buku }}">{{ $bk->judul }} (Stok: {{ $bk->stok }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Kembali (Rencana)</label>
                        <input type="date" name="tgl_kembali" class="form-control" value="{{ date('Y-m-d', strtotime('+7 days')) }}" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ url('/peminjaman') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Peminjaman</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection