@extends('layouts.app')

@section('content')
    <!-- HERO -->
    <section class="hero">
        <div class="hero-bg-text">DOUBLETAP</div>
        <div class="hero-container">
            <div class="hero-badge">📍 Melayani Banjarmasin & Banjarbaru</div>
            <h1 class="hero-title"><?= htmlspecialchars($heroTagline) ?></h1>
            <p class="hero-sub"><?= htmlspecialchars($heroSub) ?></p>
            <div class="hero-actions">
                <a href="<?= url('/contact') ?>" class="btn-primary">Konsultasi Gratis →</a>
                <a href="<?= url('/service') ?>" class="btn-secondary">Lihat Layanan</a>
            </div>
            <div class="hero-industries">
                <span class="industry-tag">☕ Food & Beverage</span>
                <span class="industry-tag">👗 Fashion & Thrift</span>
                <span class="industry-tag">📊 Data-Driven</span>
            </div>
        </div>
    </section>

    <!-- ABOUT STRIP -->
    <section class="about-section">
        <div class="about-container">
            <div class="about-text fade-in">
                <div class="section-label">Tentang Kami</div>
                <h2 class="section-title">Agensi Kreatif yang Bicara dengan Data</h2>
                <p>DoubleTap Agency adalah agensi kreatif mikro yang didirikan oleh tim mahasiswa Teknologi Informasi
                    Universitas Lambung Mangkurat. Kami fokus membantu UMKM lokal di sektor F&B dan Fashion naik kelas
                    secara digital.</p>
                <p>Kami tidak sekadar bikin konten yang cantik. Kami menggunakan prinsip <strong>UI/UX</strong> dan
                    <strong>analisis algoritma</strong> untuk memastikan setiap unggahan menjangkau orang yang tepat, pada
                    waktu yang tepat.</p>
                <div class="about-actions">
                    <a href="<?= url('/about') ?>" class="btn-primary">Kenali Tim Kami →</a>
                    <a href="<?= url('/service') ?>" class="btn-secondary">Lihat Cara Kerja Kami</a>
                </div>
            </div>
            <div class="about-visual fade-in">
                <div class="visual-card">
                    <div class="vc-icon">🎯</div>
                    <div>
                        <div class="vc-title">Target Pasar</div>
                        <div class="vc-desc">UMKM F&B dan Fashion di Banjarmasin & Banjarbaru</div>
                    </div>
                </div>
                <div class="visual-card">
                    <div class="vc-icon">💡</div>
                    <div>
                        <div class="vc-title">Pendekatan</div>
                        <div class="vc-desc">UI/UX Design + Data Analytics + Creative Content</div>
                    </div>
                </div>
                <div class="visual-card">
                    <div class="vc-icon">📈</div>
                    <div>
                        <div class="vc-title">Kapasitas</div>
                        <div class="vc-desc">6 klien bersamaan, tim 4 orang terstruktur</div>
                    </div>
                </div>
                <div class="visual-card">
                    <div class="vc-icon">🧩</div>
                    <div>
                        <div class="vc-title">Output Layanan</div>
                        <div class="vc-desc">Content calendar, desain feed, Reels/TikTok, caption, dan laporan insight</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PORTFOLIO -->
    <section class="portfolio-section" id="portfolio">
        <div class="portfolio-container">
            <div class="section-label text-center">Portfolio</div>
            <h2 class="section-title text-center">Contoh Mockup Konten untuk UMKM</h2>
            <p class="section-sub text-center">Simulasi karya awal DoubleTap Agency untuk menunjukkan arah visual,
                copywriting, dan laporan insight yang bisa diterima klien.</p>
            <div class="portfolio-grid">
                <?php foreach ($portfolio as $item): ?>
                <div class="portfolio-card fade-in">
                    <div class="portfolio-preview <?= htmlspecialchars($item['theme']) ?>">
                        <div class="portfolio-phone">
                            <div class="phone-top"></div>
                            <div class="phone-post">
                                <div class="post-visual portfolio-real-photo">
                                    <img src="{{ asset('images/portfolio/' . $item['image']) }}"
                                        alt="<?= htmlspecialchars($item['title']) ?>" class="portfolio-photo-img">
                                </div>
                                <div class="post-line wide"></div>
                                <div class="post-line"></div>
                                <div class="post-metrics">
                                    <span>♡ <?= htmlspecialchars($item['likes']) ?></span>
                                    <span>↗ <?= htmlspecialchars($item['reach']) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <div class="portfolio-type"><?= htmlspecialchars($item['type']) ?></div>
                        <h3><?= htmlspecialchars($item['title']) ?></h3>
                        <p><?= htmlspecialchars($item['desc']) ?></p>
                        <div class="portfolio-tags">
                            <?php foreach ($item['tags'] as $tag): ?>
                            <span><?= htmlspecialchars($tag) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <p class="portfolio-note text-center">Catatan: portfolio ini berupa mockup/simulasi untuk kebutuhan presentasi
                awal. Hasil aktual bergantung pada kondisi akun dan konsistensi konten setiap klien.</p>
        </div>
    </section>

    <!-- PRICING -->
    <section class="pricing-section" id="packages">
        <div class="pricing-container">
            <div class="section-label text-center">Harga Paket</div>
            <h2 class="section-title text-center">Pilih Paket yang Sesuai Bisnis Kamu</h2>
            <p class="section-sub text-center">Semua paket sudah termasuk konsultasi awal dan audit profil gratis</p>
            <div class="pricing-grid">
                <?php foreach ($services as $svc): ?>
                <div class="pricing-card <?= $svc['highlight'] ? 'pricing-highlight' : '' ?> fade-in">
                    <?php if ($svc['highlight']): ?>
                    <div class="badge-popular">⭐ Paling Populer</div>
                    <?php endif; ?>
                    <div class="pc-icon"><?= $svc['icon'] ?></div>
                    <div class="pc-title"><?= htmlspecialchars($svc['title']) ?></div>
                    <div class="pc-price">
                        <?= htmlspecialchars($svc['price']) ?><span><?= htmlspecialchars($svc['period']) ?></span></div>
                    <ul class="pc-features">
                        <?php foreach ($svc['features'] as $f): ?>
                        <li>✓ <?= htmlspecialchars($f) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?= url('/contact') ?>?package=<?= $svc['highlight'] ? 'growth' : 'starter' ?>"
                        class="<?= $svc['highlight'] ? 'btn-primary' : 'btn-secondary' ?> btn-full"><?= htmlspecialchars($svc['cta']) ?></a>
                </div>
                <?php endforeach; ?>
            </div>
            <p class="pricing-note text-center">Tidak yakin pilih paket apa? <a
                    href="<?= url('/contact') ?>?package=audit">Minta audit profil gratis dulu →</a></p>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="testi-section">
        <div class="testi-container">
            <div class="section-label text-center">KATA KLIEN KAMI</div>
            <h2 class="section-title text-center">Hasil Nyata untuk Bisnis Nyata</h2>
            <div class="testi-grid">
                <?php foreach ($testimonials as $t): ?>
                <div class="testi-card fade-in">
                    <div class="testi-quote">"</div>
                    <p class="testi-text"><?= htmlspecialchars($t['text']) ?></p>
                    <div class="testi-footer">
                        <div class="testi-avatar"><?= strtoupper(substr($t['name'], 0, 1)) ?></div>
                        <div>
                            <div class="testi-name"><?= htmlspecialchars($t['name']) ?></div>
                            <div class="testi-biz"><?= htmlspecialchars($t['biz']) ?></div>
                        </div>
                        <div class="testi-package"><?= htmlspecialchars($t['package']) ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA BAND -->
    <section class="cta-band">
        <div class="cta-inner">
            <h2>Siap Bikin Akun Bisnismu Aktif & Menghasilkan?</h2>
            <p>Dapatkan Audit Profil Media Sosial GRATIS — kami tunjukkan apa yang perlu diperbaiki, tanpa biaya apapun.</p>
            <div class="cta-actions">
                <a href="<?= url('/contact') ?>" class="btn-primary btn-large">Minta Audit Gratis →</a>
                <a href="https://wa.me/6285349362225?text=Halo%20DoubleTap%20Agency%2C%20saya%20ingin%20konsultasi%20gratis"
                    target="_blank" class="btn-secondary btn-large">💬 Chat WhatsApp</a>
            </div>
        </div>
    </section>
@endsection
