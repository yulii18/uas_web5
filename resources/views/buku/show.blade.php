@extends('components.default-layout')

@section('title', 'Detail Buku')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Buku</h1>

    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Judul Buku:</label>
                    <p>{{ $buku->judul }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Penulis:</label>
                    <p>{{ $buku->penulis }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Penerbit:</label>
                    <p>{{ $buku->penerbit }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Tahun Terbit:</label>
                    <p>{{ $buku->tahun_terbit }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Kategori:</label>
                    <p>{{ $buku->kategori->nama_kategori ?? '-' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Stok:</label>
                    <p>{{ $buku->stok }}</p>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="fw-bold">Lokasi Rak:</label>
                    <p>{{ $buku->lokasi_rak ?? '-' }}</p>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ url('/buku') }}" class="btn btn-secondary">Kembali</a>
                <div>
                    <a href="{{ url('/buku/'.$buku->id_buku.'/edit') }}" class="btn btn-warning">Edit</a>
                    <form action="{{ url('/buku/'.$buku->id_buku) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection