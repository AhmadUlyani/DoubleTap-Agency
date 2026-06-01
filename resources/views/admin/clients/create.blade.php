@extends('admin.layout', ['pageTitle' => 'Tambah Klien'])

@section('content')

<div class="admin-card" style="max-width: 720px;">
    @if($errors->any())
        <div class="admin-alert-error">
            <ul style="margin:0;padding-left:20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.clients.store') }}" method="POST" class="admin-form">
        @csrf

        <div>
            <label>Nama Bisnis</label>
            <input type="text" name="business_name" value="{{ old('business_name') }}" placeholder="Contoh: Kopi Nusantara">
        </div>

        <div>
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username') }}" placeholder="Contoh: kopi_nusantara">
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" placeholder="Minimal 6 karakter">
        </div>

        <div>
            <label>Jenis Bisnis</label>
            <input type="text" name="business_type" value="{{ old('business_type') }}" placeholder="Contoh: F&B / Kedai Kopi">
        </div>

        <div>
            <label>Paket Layanan</label>
            <select name="service_package_id">
                <option value="">Pilih paket</option>
                @foreach($packages as $package)
                    <option value="{{ $package->id }}" @selected(old('service_package_id') == $package->id)>
                        {{ $package->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="admin-btn admin-btn-primary">
            Simpan Klien
        </button>
    </form>
</div>

@endsection