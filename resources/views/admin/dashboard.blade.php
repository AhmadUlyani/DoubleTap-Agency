@extends('admin.layout', ['pageTitle' => 'Dashboard Admin'])

@section('content')

<div class="admin-grid">
    <div class="admin-stat">
        <h3>Total Klien Terdaftar</h3>
        <p>{{ $totalClients }}</p>
        <small>Klien yang memiliki akses dashboard</small>
    </div>

    <div class="admin-stat">
        <h3>Total Paket Layanan</h3>
        <p>{{ $totalPackages }}</p>
        <small>Paket aktif DoubleTap Agency</small>
    </div>

    <div class="admin-stat">
        <h3>Pesan Konsultasi Masuk</h3>
        <p>{{ $totalMessages }}</p>
        <small>Data dari form konsultasi website</small>
    </div>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <div>
            <h2>Klien Terbaru</h2>
            <p style="margin: 8px 0 0; color: #9ca3af;">
                Daftar klien terbaru yang terdaftar di sistem DoubleTap Agency.
            </p>
        </div>

        <a href="{{ route('admin.clients.index') }}" class="admin-btn admin-btn-primary">
            Kelola Semua Klien
        </a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nama Bisnis</th>
                    <th>Username</th>
                    <th>Jenis Bisnis</th>
                    <th>Paket</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestClients as $client)
                    <tr>
                        <td>{{ $client->business_name }}</td>
                        <td>{{ $client->username }}</td>
                        <td>{{ $client->business_type }}</td>
                        <td>{{ $client->package->name ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum ada klien terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection