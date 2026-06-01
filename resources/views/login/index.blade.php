@extends('layouts.app')

@section('content')
    <section class="login-section">
        <div class="login-container">
            <div class="login-copy fade-in">
                <div class="section-label">Login Klien</div>
                <h1 class="login-title">Masuk ke Dashboard Performa Bisnismu</h1>
                <p class="login-sub">
                    Dashboard ini disiapkan untuk klien DoubleTap Agency agar bisa melihat laporan performa media sosial
                    secara ringkas, transparan, dan mudah dipahami.
                </p>

                <div class="login-benefits">
                    <div class="login-benefit">
                        <span>📊</span>
                        <p>Melihat reach, impression, engagement, dan saves.</p>
                    </div>

                    <div class="login-benefit">
                        <span>🗓️</span>
                        <p>Memantau daftar konten yang sudah dipublikasikan.</p>
                    </div>

                    <div class="login-benefit">
                        <span>🚀</span>
                        <p>Klien Growth mendapat insight tambahan seperti Reels/TikTok dan analisis kompetitor.</p>
                    </div>
                </div>
            </div>

            <div class="login-card fade-in">
                <div class="login-card-head">
                    <div class="login-lock">🔐</div>
                    <div>
                        <h2>Client Area</h2>
                        <p>Gunakan akun yang diberikan oleh tim DoubleTap.</p>
                    </div>
                </div>

                @if ($errors->has('login'))
                    <div class="alert alert-error">
                        <p>{{ $errors->first('login') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.process') }}" class="contact-form">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="contoh: kopi_nusantara"
                            value="{{ old('username') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Masukkan password klien"
                            required>
                    </div>

                    <button type="submit" class="btn-primary btn-full">Masuk Dashboard</button>
                </form>

            </div>
        </div>
    </section>
@endsection
