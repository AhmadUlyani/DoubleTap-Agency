@extends('admin.layout', ['pageTitle' => 'Edit Klien'])

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

    <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" class="admin-form">
        @csrf
        @method('PUT')

        <div>
            <label>Nama Bisnis</label>
            <input type="text" name="business_name" value="{{ old('business_name', $client->business_name) }}">
        </div>

        <div>
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username', $client->username) }}">
        </div>

        <div>
            <label>Password Baru</label>
            <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti password">
        </div>

        <div>
            <label>Jenis Bisnis</label>
            <input type="text" name="business_type" value="{{ old('business_type', $client->business_type) }}">
        </div>

        <div>
            <label>Paket Layanan</label>
            <select name="service_package_id">
                <option value="">Pilih paket</option>
                @foreach($packages as $package)
                    <option value="{{ $package->id }}" @selected(old('service_package_id', $client->service_package_id) == $package->id)>
                        {{ $package->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="admin-btn admin-btn-primary">
            Update Klien
        </button>
    </form>
</div>

@endsection