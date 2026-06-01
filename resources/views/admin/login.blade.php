@extends('admin.layout', ['pageTitle' => 'Login Admin'])

@section('content')

<div class="admin-card" style="max-width: 520px;">
    @if($errors->has('login'))
        <div class="admin-alert-error">
            {{ $errors->first('login') }}
        </div>
    @endif

    <form action="{{ route('admin.login.process') }}" method="POST" class="admin-form">
        @csrf

        <div>
            <label>Username Admin</label>
            <input type="text" name="username" value="{{ old('username') }}" placeholder="Masukkan username admin">
        </div>

        <div>
            <label>Password Admin</label>
            <input type="password" name="password" placeholder="Masukkan password admin">
        </div>

        <button type="submit" class="admin-btn admin-btn-primary">
            Login Admin
        </button>
    </form>

    <div style="margin-top:20px;color:#9ca3af;">
        <p><strong>Contoh login:</strong></p>
        <p>Username: admin</p>
        <p>Password: admin123</p>
    </div>
</div>

@endsection