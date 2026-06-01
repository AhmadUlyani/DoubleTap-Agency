<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'DoubleTap Agency' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Syne:wght@700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ url('/') }}" class="nav-logo">
                <span class="logo-icon">❤️‍🔥</span>
                <span class="logo-text">DoubleTap<span class="logo-accent">Agency</span></span>
            </a>
            <ul class="nav-links" id="navLinks">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('/service') }}">Layanan</a></li>
                <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                @if (session('client_id'))
                    <li><a href="{{ url('/dashboard') }}">Dashboard Klien</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="nav-login" style="background:none;cursor:pointer;">
                                Keluar
                            </button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ url('/login') }}" class="nav-login">Login Klien</a></li>
                    <li><a href="{{ url('/contact') }}" class="nav-cta">Konsultasi Gratis</a></li>
                @endif
            </ul>
            <button class="hamburger" id="hamburger">☰</button>
        </div>
    </nav>
    @yield('content')
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-top">
                <div class="footer-brand">
                    <a href="{{ url('/') }}" class="footer-logo">❤️‍🔥 DoubleTap Agency</a>
                    <p class="footer-desc">Mitra pertumbuhan digital terdepan untuk UMKM Kalimantan Selatan. Kami tidak
                        sekadar buat konten — kami bantu bisnis kamu tumbuh.</p>
                    <div class="footer-social">
                        <a href="https://wa.me/6285349362225" target="_blank" class="social-btn">💬 WhatsApp</a>
                        <a href="{{ url('/#portfolio') }}" class="social-btn">📸 Portfolio</a>
                        <a href="{{ url('/contact') }}" class="social-btn">🎵 Audit Gratis</a>
                    </div>
                </div>
                <div class="footer-links">
                    <div class="footer-col">
                        <h4>Navigasi</h4>
                        <ul>
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li><a href="{{ url('/service') }}">Layanan</a></li>
                            <li><a href="{{ url('/#portfolio') }}">Portfolio</a></li>
                            <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                            <li><a href="{{ url('/contact') }}">Konsultasi Gratis</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Layanan</h4>
                        <ul>
                            <li><a href="{{ url('/service#packages') }}">Paket Starter</a></li>
                            <li><a href="{{ url('/service#packages') }}">Paket Growth</a></li>
                            <li><a href="{{ url('/service#process') }}">Cara Kerja</a></li>
                            <li><a href="{{ url('/service#faq') }}">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Kontak</h4>
                        <ul>
                            <li>📍 Kayutangi, Banjarmasin</li>
                            <li>📞 085349362225</li>
                            <li>🗺️ Area: Banjarmasin & Banjarbaru</li>
                            <li>⏰ Senin–Sabtu, 09.00–21.00 WITA</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 DoubleTap Agency.</p>
            </div>
        </div>
    </footer>
    <script>
        document.getElementById('hamburger').addEventListener('click', function() {
            document.getElementById('navLinks').classList.toggle('active');
        });
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) e.target.classList.add('visible');
            });
        }, {
            threshold: 0.1
        });
        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
    </script>
</body>

</html>
