@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="ph-container">
        <div class="section-label">Layanan Kami</div>
        <h1 class="page-title">Semua yang Kamu Butuhkan untuk Tumbuh di Media Sosial</h1>
        <p>Dari desain feed hingga analitik data — kami tangani semuanya, kamu fokus jalankan bisnismu.</p>
        <div class="ph-actions">
            <a href="<?= url('/contact') ?>" class="btn-primary">Mulai Sekarang →</a>
            <a href="#faq" class="btn-secondary">Lihat FAQ</a>
        </div>
    </div>
</section>

<!-- PACKAGES -->
<section class="pricing-section" id="packages">
    <div class="pricing-container">
        <div class="section-label text-center">Paket Layanan</div>
        <h2 class="section-title text-center">Transparan, Tanpa Biaya Tersembunyi</h2>
        <div class="pricing-grid pricing-grid-detail">
            <?php foreach ($packages as $pkg): ?>
            <div class="pricing-card <?= $pkg['highlight'] ? 'pricing-highlight' : '' ?> fade-in">
                <?php if ($pkg['highlight']): ?>
                <div class="badge-popular">⭐ Paling Populer</div>
                <?php endif; ?>
                <div class="pc-icon"><?= $pkg['icon'] ?></div>
                <div class="pc-title"><?= htmlspecialchars($pkg['title']) ?></div>
                <div class="pc-price"><?= htmlspecialchars($pkg['price']) ?><span><?= htmlspecialchars($pkg['period']) ?></span></div>
                <p class="pc-desc"><?= htmlspecialchars($pkg['desc']) ?></p>
                <div class="pc-divider"></div>
                <p class="pc-include-label">✅ Termasuk:</p>
                <ul class="pc-features">
                    <?php foreach ($pkg['features'] as $f): ?>
                    <li>✓ <?= htmlspecialchars($f) ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php if (!empty($pkg['not_include'])): ?>
                <p class="pc-include-label pc-not-label">❌ Tidak termasuk:</p>
                <ul class="pc-features pc-not">
                    <?php foreach ($pkg['not_include'] as $f): ?>
                    <li>✗ <?= htmlspecialchars($f) ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <a href="<?= url('/contact') ?>?package=<?= $pkg['highlight'] ? 'growth' : 'starter' ?>" class="<?= $pkg['highlight'] ? 'btn-primary' : 'btn-secondary' ?> btn-full" style="margin-top:auto">Pilih Paket Ini →</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- PROCESS -->
<section class="process-section" id="process">
    <div class="process-container">
        <div class="section-label text-center">Cara Kerja</div>
        <h2 class="section-title text-center">6 Tahap yang Kami Jalankan Setiap Bulan</h2>
        <p class="section-sub text-center">Proses ini berjalan setiap bulan secara konsisten untuk setiap klien</p>
        <div class="process-grid">
            <?php foreach ($process as $p): ?>
            <div class="process-card fade-in">
                <div class="proc-header">
                    <div class="proc-step"><?= $p['step'] ?></div>
                    <div class="proc-icon"><?= $p['icon'] ?></div>
                </div>
                <div class="proc-title"><?= htmlspecialchars($p['title']) ?></div>
                <div class="proc-desc"><?= htmlspecialchars($p['desc']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- TOOLS -->
<section class="tools-section">
    <div class="tools-container">
        <div class="section-label text-center">Tech Stack</div>
        <h2 class="section-title text-center">Tools yang Kami Gunakan</h2>
        <div class="tools-grid">
            <?php foreach ($tools as $t): ?>
            <div class="tool-card fade-in">
                <div class="tool-icon"><?= $t['icon'] ?></div>
                <div class="tool-name"><?= htmlspecialchars($t['name']) ?></div>
                <div class="tool-cat"><?= htmlspecialchars($t['category']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq-section" id="faq">
    <div class="faq-container">
        <div class="section-label text-center">FAQ</div>
        <h2 class="section-title text-center">Pertanyaan yang Sering Ditanyakan</h2>
        <div class="faq-list">
            <?php foreach ($faqs as $i => $faq): ?>
            <div class="faq-item" id="faq-<?= $i ?>">
                <button class="faq-q" onclick="toggleFaq(<?= $i ?>)">
                    <span><?= htmlspecialchars($faq['q']) ?></span>
                    <span class="faq-arrow" id="arrow-<?= $i ?>">↓</span>
                </button>
                <div class="faq-a" id="ans-<?= $i ?>" style="display:none">
                    <p><?= htmlspecialchars($faq['a']) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta-band">
    <div class="cta-inner">
        <h2>Masih Ragu? Coba Audit Gratis Dulu</h2>
        <p>Kami akan review akun media sosial bisnis kamu dan kasih rekomendasi konkret — gratis, tanpa kewajiban apapun.</p>
        <div class="cta-actions">
            <a href="<?= url('/contact') ?>?package=audit" class="btn-primary btn-large">Minta Audit Gratis →</a>
            <a href="https://wa.me/6285349362225?text=Halo%20DoubleTap%2C%20saya%20mau%20tanya%20soal%20layanan" target="_blank" class="btn-secondary btn-large">💬 Tanya via WhatsApp</a>
        </div>
    </div>
</section>

<script>
function toggleFaq(i) {
    const ans   = document.getElementById('ans-' + i);
    const arrow = document.getElementById('arrow-' + i);
    const isOpen = ans.style.display === 'block';
    document.querySelectorAll('.faq-a').forEach(el => el.style.display = 'none');
    document.querySelectorAll('.faq-arrow').forEach(el => el.textContent = '↓');
    if (!isOpen) { ans.style.display = 'block'; arrow.textContent = '↑'; }
}
</script>
@endsection
