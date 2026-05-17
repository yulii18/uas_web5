@extends('components.default-layout')

@section('title', 'Edit Buku')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Buku</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ url('/buku/'.$buku->id_buku) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $kat)
                            <option value="{{ $kat->id_kategori }}" {{ $buku->kategori_id == $kat->id_kategori ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" value="{{ old('stok', $buku->stok) }}" class="form-control" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Lokasi Rak</label>
                        <input type="text" name="lokasi_rak" value="{{ old('lokasi_rak', $buku->lokasi_rak) }}" class="form-control">
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ url('/buku') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection