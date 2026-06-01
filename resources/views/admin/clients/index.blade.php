@extends('admin.layout', ['pageTitle' => 'Kelola Klien'])

@section('content')

@if(session('success'))
    <div class="admin-alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="admin-card">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
        <h2 style="margin:0;">Daftar Pengguna Terdaftar</h2>
        <a href="{{ route('admin.clients.create') }}" class="admin-btn admin-btn-primary">
            + Tambah Klien
        </a>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Bisnis</th>
                <th>Username</th>
                <th>Jenis Bisnis</th>
                <th>Paket</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($clients as $index => $client)
                <tr>
                    <td>{{ $clients->firstItem() + $index }}</td>
                    <td>{{ $client->business_name }}</td>
                    <td>{{ $client->username }}</td>
                    <td>{{ $client->business_type }}</td>
                    <td>{{ $client->package->name ?? '-' }}</td>
                    <td>{{ $client->created_at->format('d M Y') }}</td>
                    <td>
                        <div class="admin-actions">
                            <a href="{{ route('admin.clients.edit', $client->id) }}"
                               class="admin-btn admin-btn-secondary">
                                Edit
                            </a>

                            <form action="{{ route('admin.clients.destroy', $client->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus klien ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="admin-btn admin-btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada pengguna terdaftar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:24px;">
        {{ $clients->links() }}
    </div>
</div>

@endsection