@extends('layouts.app')

@section('content')

<section class="client-dashboard">
    <div class="dashboard-container">

        <div class="dashboard-hero fade-in">
            <div>
                <div class="dashboard-greeting">Selamat datang kembali 👋</div>

                <h1><?= htmlspecialchars($clientName) ?></h1>

                <p>
                    <?= htmlspecialchars($clientBusinessType) ?> —
                    Laporan media sosial periode <?= htmlspecialchars($period) ?>
                </p>

                <div class="package-row">
                    <span class="dashboard-demo-badge">
                        Laporan performa bulanan klien
                    </span>

                    <span class="package-badge <?= $isGrowth ? 'package-growth' : 'package-starter' ?>">
                        <?= $isGrowth ? 'Growth Plan' : 'Starter Plan' ?>
                    </span>
                </div>
            </div>

            <a
                href="https://wa.me/6285349362225?text=Halo%20DoubleTap%20Agency%2C%20saya%20ingin%20membahas%20laporan%20dashboard%20klien"
                target="_blank"
                class="dashboard-wa"
            >
                💬 Hubungi Tim
            </a>
        </div>

        <div class="dashboard-stats-grid">
            <?php foreach ($stats as $stat): ?>
                <div class="dashboard-stat-card fade-in">
                    <div class="stat-topline">
                        <span class="stat-icon-box"><?= htmlspecialchars($stat['icon']) ?></span>

                        <span class="stat-trend <?= $stat['trendType'] === 'down' ? 'trend-down' : 'trend-up' ?>">
                            <?= $stat['trendType'] === 'down' ? '▼' : '▲' ?>
                            <?= htmlspecialchars($stat['trend']) ?>
                        </span>
                    </div>

                    <div class="dashboard-stat-value"><?= htmlspecialchars($stat['value']) ?></div>
                    <div class="dashboard-stat-label"><?= htmlspecialchars($stat['label']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="dashboard-panel fade-in">
            <div class="panel-header">
                <div>
                    <h2>Tren Reach Bulanan</h2>
                    <p>Jan — Jun 2025</p>
                </div>

                <span class="panel-pill">
                    <?= $isGrowth ? 'Growth Report' : 'Starter Report' ?>
                </span>
            </div>

            <div class="bar-chart">
                <?php
                    $heights = $isGrowth
                        ? [45, 55, 66, 76, 86, 98]
                        : [38, 46, 55, 63, 72, 82];
                ?>

                <?php foreach ($reachTrend as $i => $bar): ?>
                    <div class="bar-item">
                        <span class="bar-value"><?= htmlspecialchars($bar['value']) ?></span>

                        <div class="bar-track">
                            <div class="bar-fill" style="height: <?= $heights[$i] ?>%;"></div>
                        </div>

                        <span class="bar-month"><?= htmlspecialchars($bar['month']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="dashboard-panel fade-in">
            <div class="panel-header">
                <div>
                    <h2>Ringkasan Performa</h2>
                    <p>
                        <?= $isGrowth
                            ? 'Insight tambahan dari performa konten video, copywriting, dan kompetitor.'
                            : 'Ringkasan dasar dari performa konten feed dan story.'
                        ?>
                    </p>
                </div>
            </div>

            <div class="summary-grid">
                <div class="summary-card">
                    <h3>Konten Terbaik</h3>
                    <p>
                        <?= $isGrowth
                            ? 'Reels Thrift Haul Mingguan menjadi konten terbaik bulan ini.'
                            : 'Promo Kopi Susu Aren menjadi konten dengan performa terbaik.'
                        ?>
                    </p>
                </div>

                <div class="summary-card">
                    <h3>Format Efektif</h3>
                    <p>
                        <?= $isGrowth
                            ? 'Reels/TikTok dan carousel outfit memberi kontribusi paling tinggi.'
                            : 'Feed promo dan story interaktif membantu menjaga engagement.'
                        ?>
                    </p>
                </div>

                <div class="summary-card">
                    <h3>Catatan Evaluasi</h3>
                    <p>
                        <?= $isGrowth
                            ? 'Konten video pendek terbukti meningkatkan reach dan follower baru.'
                            : 'Konsistensi visual feed membantu memperkuat pengenalan brand.'
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <?php if ($isGrowth): ?>
            <div class="growth-section fade-in">
                <div class="growth-header">
                    <div>
                        <div class="section-label">Growth Insight</div>
                        <h2>Analisis Tambahan Paket Growth</h2>
                        <p>
                            Bagian ini hanya muncul untuk klien Paket Growth karena paket ini mencakup
                            Reels/TikTok, copywriting, dan analisis kompetitor.
                        </p>
                    </div>
                </div>

                <div class="growth-grid">
                    <?php foreach ($growthInsights as $insight): ?>
                        <div class="growth-card">
                            <div class="growth-icon"><?= htmlspecialchars($insight['icon']) ?></div>
                            <h3><?= htmlspecialchars($insight['title']) ?></h3>
                            <p><?= htmlspecialchars($insight['desc']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="growth-panel">
                    <div>
                        <h3>Rekomendasi Konten Bulan Depan</h3>

                        <ul>
                            <?php foreach ($recommendations as $recommendation): ?>
                                <li><?= htmlspecialchars($recommendation) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div>
                        <h3>Keyword & Hashtag Disarankan</h3>

                        <div class="hashtag-list">
                            <?php foreach ($hashtags as $hashtag): ?>
                                <span><?= htmlspecialchars($hashtag) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="dashboard-panel fade-in">
            <div class="panel-header">
                <div>
                    <h2>Konten Bulan Ini</h2>
                    <p>
                        <?= count($contents) ?> konten dipublikasikan —
                        <?= htmlspecialchars($period) ?>
                    </p>
                </div>
            </div>

            <div class="content-table-wrap">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Judul Konten</th>
                            <th>Jenis</th>
                            <th>Reach</th>
                            <th>Like</th>
                            <th>Komen</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($contents as $content): ?>
                            <tr>
                                <td><?= htmlspecialchars($content['date']) ?></td>

                                <td class="content-title-cell">
                                    <?= htmlspecialchars($content['title']) ?>
                                </td>

                                <td>
                                    <span class="content-type-pill">
                                        <?= htmlspecialchars($content['type']) ?>
                                    </span>
                                </td>

                                <td class="content-number">
                                    <?= htmlspecialchars($content['reach']) ?>
                                </td>

                                <td><?= htmlspecialchars($content['likes']) ?></td>
                                <td><?= htmlspecialchars($content['comments']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="dashboard-note text-center">
            Data statistik diperbarui setiap awal bulan oleh tim DoubleTap Agency.
        </p>
    </div>
</section>
@endsection
