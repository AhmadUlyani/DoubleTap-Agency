@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="ph-container">
        <div class="section-label">Tentang Kami</div>
        <h1 class="page-title">Tim di Balik DoubleTap Agency</h1>
        <p>Mahasiswa Teknologi Informasi yang memahami algoritma, desain, dan cara kerja bisnis digital.</p>
    </div>
</section>

<!-- STORY -->
<section class="story-section">
    <div class="story-container">
        <div class="story-text fade-in">
            <div class="section-label">Cerita Kami</div>
            <h2 class="section-title">Kenapa DoubleTap?</h2>
            <p>Nama "DoubleTap" terinspirasi dari gestur paling sederhana di media sosial — mengetuk layar dua kali untuk memberi <em>like</em>. Gestur kecil itu mewakili sesuatu yang besar: konten yang benar-benar menarik perhatian dan memicu respons.</p>
            <p>Kami melihat banyak UMKM lokal di Kalimantan Selatan — kedai kopi dengan kopi yang enak, thrift shop dengan kurasi yang unik — tapi tersembunyi di balik media sosial yang tidak terkelola. Produk bagus, tapi etalase digitalnya kurang bicara.</p>
            <p>Itu yang mendorong kami membuat DoubleTap Agency: menjadi tim kreatif digital yang bisa diakses oleh UMKM lokal dengan harga yang masuk akal, tapi kualitas yang sekelas agensi profesional.</p>
        </div>
        <div class="story-stats fade-in">
            <div class="sstats-grid">
                <div class="sstat"><div class="sstat-n">2</div><div class="sstat-l">Platform Utama<br>(IG & TikTok)</div></div>
                <div class="sstat"><div class="sstat-n">2</div><div class="sstat-l">Sektor Fokus<br>(F&B & Fashion)</div></div>
                <div class="sstat"><div class="sstat-n">6</div><div class="sstat-l">Kapasitas Klien<br>Bersamaan</div></div>
                <div class="sstat"><div class="sstat-n">4</div><div class="sstat-l">Anggota Tim<br>Terstruktur</div></div>
            </div>
        </div>
    </div>
</section>

<!-- VISION MISSION -->
<section class="vm-section">
    <div class="vm-container">
        <div class="vm-card fade-in">
            <div class="vm-icon">🔭</div>
            <h3>Visi</h3>
            <p>Menjadi mitra pertumbuhan digital terdepan bagi UMKM di Kalimantan Selatan melalui pendekatan kreatif yang digerakkan oleh data.</p>
        </div>
        <div class="vm-card fade-in">
            <div class="vm-icon">🎯</div>
            <h3>Misi</h3>
            <ul>
                <li>Menyediakan jasa Social Media Management berkualitas agensi dengan harga terjangkau untuk UMKM</li>
                <li>Mengaplikasikan prinsip UI/UX dan analisis data dalam setiap strategi konten</li>
                <li>Menjadi mitra transparan yang memberikan laporan nyata, bukan sekadar janji</li>
            </ul>
        </div>
    </div>
</section>

<!-- VALUES -->
<section class="values-section">
    <div class="values-container">
        <div class="section-label text-center">Nilai Kami</div>
        <h2 class="section-title text-center">Prinsip yang Kami Pegang</h2>
        <div class="values-grid">
            <?php foreach ($values as $v): ?>
            <div class="value-card fade-in">
                <div class="val-icon"><?= $v['icon'] ?></div>
                <div class="val-title"><?= htmlspecialchars($v['title']) ?></div>
                <div class="val-desc"><?= htmlspecialchars($v['desc']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- TEAM -->
<section class="team-section">
    <div class="team-container">
        <div class="section-label text-center">Struktur Tim</div>
        <h2 class="section-title text-center">Siapa yang Mengerjakan Kontenmu</h2>
        <div class="team-grid">
            <?php foreach ($team as $m): ?>
            <div class="team-card fade-in">
                <div class="team-icon"><?= $m['icon'] ?></div>
                <div class="team-focus"><?= htmlspecialchars($m['focus']) ?></div>
                <div class="team-role"><?= htmlspecialchars($m['role']) ?></div>
                <div class="team-desc"><?= htmlspecialchars($m['desc']) ?></div>
                <div class="team-skills">
                    <?php foreach ($m['skills'] as $s): ?>
                    <span class="skill-tag"><?= htmlspecialchars($s) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta-band">
    <div class="cta-inner">
        <h2>Tertarik Berkolaborasi dengan Tim Kami?</h2>
        <p>Konsultasi gratis, tanpa tekanan. Kami dengerin dulu kebutuhan bisnis kamu.</p>
        <div class="cta-actions">
            <a href="<?= url('/contact') ?>" class="btn-primary btn-large">Mulai Konsultasi →</a>
            <a href="<?= url('/service') ?>" class="btn-secondary btn-large">Lihat Layanan Kami</a>
        </div>
    </div>
</section>
@endsection
