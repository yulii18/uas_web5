<x-default-layout title="Dashboard" pageTitle="Dashboard">

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background:#A8E8F9">📚</div>
            <div>
                <div class="stat-value">{{ $totalBuku }}</div>
                <div class="stat-label">Total Buku</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#FFBA42">👤</div>
            <div>
                <div class="stat-value">{{ $totalAnggota }}</div>
                <div class="stat-label">Anggota Aktif</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#F5A201">📋</div>
            <div>
                <div class="stat-value">{{ $totalDipinjam }}</div>
                <div class="stat-label">Sedang Dipinjam</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#013C58;color:#FFD35B">⏱</div>
            <div>
                <div class="stat-value">{{ $totalTerlambat }}</div>
                <div class="stat-label">Terlambat</div>
            </div>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-header">Peminjaman Terbaru</div>
        <table class="table">
            <thead>
                <tr>
                    <th>Anggota</th><th>Buku</th>
                    <th>Tgl Pinjam</th><th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjamanTerbaru as $p)
                <tr>
                    <td>{{ $p->anggota->nama }}</td>
                    <td>{{ $p->buku->judul }}</td>
                    <td>{{ $p->tgl_pinjam->format('d M Y') }}</td>
                    <td><span class="badge badge-{{ $p->status }}">
                        {{ ucfirst($p->status) }}</span></td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-default-layout>