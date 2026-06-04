@extends('layouts.app')

@section('content')
<?php $selectedPackage = $_GET['package'] ?? ($post['package'] ?? ''); ?>

<section class="page-header">
    <div class="ph-container">
        <div class="section-label">Konsultasi Gratis</div>
        <h1 class="page-title">Mulai Perjalanan Digitalmu</h1>
        <p>Isi form di bawah — tim kami akan menghubungi kamu via WhatsApp dalam 1×24 jam untuk jadwal konsultasi.</p>
    </div>
</section>

<section class="contact-section">
    <div class="contact-container">

        <?php if (!empty($errors)): ?>
        <div class="alert alert-error">
            <?php foreach ($errors as $e): ?>
            <p>⚠️ <?= htmlspecialchars($e) ?></p>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ($success): ?>
        <div class="success-block">
            <div class="success-icon">🎉</div>
            <h2>Permintaan Terkirim!</h2>
            <p>Terima kasih sudah menghubungi DoubleTap Agency. Tim kami akan menghubungi kamu via WhatsApp <strong>dalam 1×24 jam</strong> untuk jadwal konsultasi.</p>
            <p>Kalau mau lebih cepat, langsung chat kami:</p>
            <a href="https://wa.me/6285349362225?text=Halo%20DoubleTap%20Agency%2C%20saya%20baru%20mengisi%20form%20konsultasi" target="_blank" class="btn-primary btn-large">💬 Chat WhatsApp Sekarang</a>
            <a href="<?= url('/') ?>" class="btn-secondary" style="margin-top:.75rem">← Kembali ke Beranda</a>
        </div>
        <?php else: ?>

        <div class="contact-grid">
            <div class="contact-info fade-in">
                <h3>Informasi Kontak</h3>

                <div class="ci-item">
                    <span class="ci-icon">📍</span>
                    <div>
                        <strong>Alamat</strong>
                        <p>Jl. Brigjen H. Hasan Basri, Kayutangi, Banjarmasin, Kalimantan Selatan</p>
                    </div>
                </div>

                <div class="ci-item">
                    <span class="ci-icon">📞</span>
                    <div>
                        <strong>WhatsApp</strong>
                        <p><a href="https://wa.me/6285349362225" target="_blank" style="color:var(--clr-accent)">085349362225</a></p>
                    </div>
                </div>

                <div class="ci-item">
                    <span class="ci-icon">🗺️</span>
                    <div>
                        <strong>Area Layanan</strong>
                        <p>Banjarmasin & Banjarbaru</p>
                    </div>
                </div>

                <div class="ci-item">
                    <span class="ci-icon">⏰</span>
                    <div>
                        <strong>Jam Respons</strong>
                        <p>Senin–Sabtu, 09.00–21.00 WITA</p>
                    </div>
                </div>
            </div>

            <form class="contact-form fade-in" method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Nama Lengkap *</label>
                        <input type="text" id="name" name="name" placeholder="Contoh: Budi Santoso" value="<?= htmlspecialchars($post['name'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor WhatsApp *</label>
                        <input type="text" id="phone" name="phone" placeholder="Contoh: 08123456789" value="<?= htmlspecialchars($post['phone'] ?? '') ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="business">Nama Bisnis *</label>
                        <input type="text" id="business" name="business" placeholder="Contoh: Kedai Kopi Semesta" value="<?= htmlspecialchars($post['business'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="ig">Akun Instagram/TikTok</label>
                        <input type="text" id="ig" name="ig" placeholder="@namaakunmu" value="<?= htmlspecialchars($post['ig'] ?? '') ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="sector">Sektor Bisnis *</label>
                        <select id="sector" name="sector" required>
                            <option value="">-- Pilih Sektor --</option>
                            <option value="fnb" <?= ($post['sector'] ?? '') === 'fnb' ? 'selected' : '' ?>>☕ Food & Beverage (Kafe, Resto, Bakery)</option>
                            <option value="fashion" <?= ($post['sector'] ?? '') === 'fashion' ? 'selected' : '' ?>>👗 Fashion (Thrift Shop, Brand Lokal, Distro)</option>
                            <option value="other" <?= ($post['sector'] ?? '') === 'other' ? 'selected' : '' ?>>🏪 Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="package">Paket yang Diminati *</label>
                        <select id="package" name="package" required>
                            <option value="">-- Pilih Paket --</option>
                            <option value="audit" <?= $selectedPackage === 'audit' ? 'selected' : '' ?>>🎁 Audit Profil Gratis Dulu</option>
                            <option value="starter" <?= $selectedPackage === 'starter' ? 'selected' : '' ?>>📸 Paket Starter — Rp 1.000.000/bulan</option>
                            <option value="growth" <?= $selectedPackage === 'growth' ? 'selected' : '' ?>>🚀 Paket Growth — Rp 2.500.000/bulan</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="message">Cerita Singkat Bisnis & Tantangan Kamu</label>
                    <textarea id="message" name="message" rows="4" placeholder="Contoh: Saya punya kedai kopi di Banjarmasin, sudah punya Instagram tapi engagementnya rendah. Mau coba tingkatkan penjualan lewat TikTok..."><?= htmlspecialchars($post['message'] ?? '') ?></textarea>
                </div>

                <button type="submit" class="btn-primary btn-full btn-large">Kirim & Jadwalkan Konsultasi →</button>
                <p class="form-note">Dengan mengirim form ini, kamu setuju untuk dihubungi oleh tim DoubleTap Agency via WhatsApp.</p>
            </form>
        </div>

        <div class="info-box contact-bonus-box fade-in">
            <h4>🎁 Yang kamu dapat dari konsultasi gratis:</h4>
            <ul>
                <li>✓ Audit profil Instagram/TikTok bisnismu</li>
                <li>✓ Identifikasi masalah utama akun</li>
                <li>✓ Rekomendasi strategi konten awal</li>
                <li>✓ Estimasi paket yang paling cocok</li>
            </ul>
        </div>

        <?php endif; ?>
    </div>
</section>
@endsection