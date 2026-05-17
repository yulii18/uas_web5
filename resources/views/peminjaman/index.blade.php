@extends('components.default-layout')

@section('title', 'Data Peminjaman')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Peminjaman</h1>
        <a href="{{ url('/peminjaman/create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Peminjaman Baru
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjaman as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->anggota->nama ?? '-' }}</td>
                        <td>{{ $item->buku->judul ?? '-' }}</td>
                        <td>{{ $item->tgl_pinjam }}</td>
                        <td>{{ $item->tgl_kembali }}</td>
                        <td>
                            <span class="badge {{ $item->status == 'dipinjam' ? 'bg-warning' : 'bg-success' }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ url('/peminjaman/'.$item->id_peminjaman) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center">Belum ada data peminjaman</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection