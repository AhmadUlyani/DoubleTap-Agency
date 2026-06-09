<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Administrator DoubleTap',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        DB::table('client_hashtags')->delete();
        DB::table('client_reach_trends')->delete();
        DB::table('client_recommendations')->delete();
        DB::table('client_insights')->delete();
        DB::table('client_contents')->delete();
        DB::table('client_stats')->delete();
        DB::table('clients')->delete();
        DB::table('contact_messages')->delete();
        DB::table('faqs')->delete();
        DB::table('tools')->delete();
        DB::table('process_steps')->delete();
        DB::table('team_members')->delete();
        DB::table('company_values')->delete();
        DB::table('testimonials')->delete();
        DB::table('portfolios')->delete();
        DB::table('home_package_features')->delete();
        DB::table('package_features')->delete();
        DB::table('service_packages')->delete();

        $now = now();

        $starterId = DB::table('service_packages')->insertGetId([
            'icon' => '📸',
            'name' => 'Paket Starter',
            'price' => 1000000,
            'period' => '/ bulan',
            'description' => 'Cocok untuk UMKM yang baru mau mulai serius di media sosial.',
            'is_highlight' => false,
            'sort_order' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $growthId = DB::table('service_packages')->insertGetId([
            'icon' => '🚀',
            'name' => 'Paket Growth',
            'price' => 2500000,
            'period' => '/ bulan',
            'description' => 'Solusi lengkap untuk UMKM yang ingin tumbuh agresif di Instagram & TikTok.',
            'is_highlight' => true,
            'sort_order' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);


        foreach (['12 Feed Instagram/bulan', '4 IG Story', 'Admin Posting Terjadwal', 'Laporan Analitik Bulanan'] as $i => $feature) {
            DB::table('home_package_features')->insert(['service_package_id' => $starterId, 'feature' => $feature, 'sort_order' => $i + 1, 'created_at' => $now, 'updated_at' => $now]);
        }
        foreach (['15 Feed Instagram', '4 Video Reels/TikTok', 'Copywriting Caption', 'Analisis Kompetitor', 'Semua fitur Starter'] as $i => $feature) {
            DB::table('home_package_features')->insert(['service_package_id' => $growthId, 'feature' => $feature, 'sort_order' => $i + 1, 'created_at' => $now, 'updated_at' => $now]);
        }

        foreach (['Produksi video Reels/TikTok', 'Analisis kompetitor', 'Copywriting caption'] as $i => $feature) {
            DB::table('package_features')->insert(['service_package_id' => $starterId, 'feature' => $feature, 'is_included' => false, 'sort_order' => $i + 100, 'created_at' => $now, 'updated_at' => $now]);
        }

        foreach (['15 Feed Instagram', '4 Video Reels/TikTok', 'Copywriting Caption', 'Analisis Kompetitor', 'Semua fitur Starter'] as $i => $feature) {
            DB::table('package_features')->insert(['service_package_id' => $growthId, 'feature' => $feature, 'is_included' => true, 'sort_order' => $i + 1, 'created_at' => $now, 'updated_at' => $now]);
        }

        $serviceDetailFeatures = [
            $starterId => [
                'features' => [
                    '12 desain Feed Instagram/bulan',
                    '4 IG Story per bulan',
                    'Postingan terjadwal',
                    'Laporan analitik bulanan (reach, impression, engagement)',
                    'Konsultasi via WhatsApp',
                ],
                'not' => ['Produksi video Reels/TikTok', 'Analisis kompetitor', 'Copywriting caption'],
            ],
            $growthId => [
                'features' => [
                    '15 desain Feed Instagram/bulan',
                    '4 Video Reels/TikTok (ide, shooting & editing)',
                    'Copywriting caption yang persuasif',
                    'Analisis kompetitor bulanan',
                    'Postingan terjadwal',
                    'Laporan analitik lengkap + rekomendasi',
                    'Konsultasi prioritas via WhatsApp & Zoom',
                ],
                'not' => [],
            ],
        ];

        // Supaya halaman Layanan sama persis, fitur detail menggantikan fitur ringkas setelah halaman Home tetap benar lewat controller.
        DB::table('package_features')->delete();
        foreach ($serviceDetailFeatures as $packageId => $set) {
            foreach ($set['features'] as $i => $feature) {
                DB::table('package_features')->insert(['service_package_id' => $packageId, 'feature' => $feature, 'is_included' => true, 'sort_order' => $i + 1, 'created_at' => $now, 'updated_at' => $now]);
            }
            foreach ($set['not'] as $i => $feature) {
                DB::table('package_features')->insert(['service_package_id' => $packageId, 'feature' => $feature, 'is_included' => false, 'sort_order' => $i + 100, 'created_at' => $now, 'updated_at' => $now]);
            }
        }

        DB::table('portfolios')->insert([
            ['icon' => '☕', 'image' => 'kopi-susu.jpg', 'theme' => 'theme-coffee', 'type' => 'F&B Content Mockup', 'title' => 'Kampanye Menu Kopi Susu Signature', 'description' => 'Mockup feed Instagram untuk kedai kopi lokal dengan fokus pada foto produk, promo bundling, dan caption ajakan kunjungan.', 'likes' => '428', 'reach' => '6.2K', 'tags' => json_encode(['Feed IG', 'Copywriting', 'Promo Menu']), 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => '👗', 'image' => 'thrift-ootd.jpg', 'theme' => 'theme-fashion', 'type' => 'Fashion Content Mockup', 'title' => 'Lookbook Thrift: Mix & Match OOTD', 'description' => 'Simulasi konten carousel dan Reels/TikTok untuk thrift shop, menonjolkan styling produk dan detail katalog yang lebih rapi.', 'likes' => '612', 'reach' => '8.5K', 'tags' => json_encode(['Carousel', 'Reels', 'OOTD']), 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => '📊', 'image' => 'report-insight.jpg', 'theme' => 'theme-report', 'type' => 'Monthly Report Mockup', 'title' => 'Laporan Insight dan Rekomendasi Konten', 'description' => 'Contoh format laporan bulanan berisi reach, impression, engagement, konten terbaik, dan rekomendasi strategi bulan berikutnya.', 'likes' => 'ER 7.4%', 'reach' => '+32%', 'tags' => json_encode(['Insight', 'Evaluasi', 'Strategi']), 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('testimonials')->insert([
            ['name' => 'Rina Marlina', 'business' => 'Kedai Kopi Nusantara, Banjarmasin', 'message' => 'Sejak pakai DoubleTap, followers Instagram kita naik 3x lipat dalam 2 bulan. Yang paling kerasa, pelanggan baru sering bilang "liat dari IG".', 'package_name' => 'Paket Growth', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dimas Prasetyo', 'business' => 'Thrift Outfit BDJ, Banjarbaru', 'message' => 'Tim mereka beneran ngerti algoritma TikTok. Video produk kita pernah tembus 50rb views organik. Worth it banget.', 'package_name' => 'Paket Growth', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sari Dewi', 'business' => 'Bakery Rumahan Sari, Banjarmasin', 'message' => 'Mulai dari Paket Starter dulu, desain feednya rapi banget dan laporan bulanannya jelas. Sekarang udah upgrade ke Growth.', 'package_name' => 'Paket Starter → Growth', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('company_values')->insert([
            ['icon' => '🔬', 'title' => 'Data-Driven', 'description' => 'Setiap keputusan konten — mulai dari jam posting hingga jenis visual — didasarkan pada data insight, bukan feeling.', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => '🔍', 'title' => 'Transparan', 'description' => 'Klien mendapat laporan lengkap setiap bulan. Tidak ada yang disembunyikan, baik saat performa bagus maupun kurang.', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => '⚡', 'title' => 'Adaptif', 'description' => 'Algoritma media sosial berubah terus. Tim kami selalu update dengan tren terbaru agar konten klien tetap relevan.', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => '🤝', 'title' => 'Kolaboratif', 'description' => 'Kami bukan vendor, kami mitra. Keberhasilan bisnis klien adalah keberhasilan kami juga.', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('team_members')->insert([
            ['icon' => '🤝', 'role' => 'Project Manager & Client Relations', 'focus' => 'Bisnis & Komunikasi', 'description' => 'Bertanggung jawab atas prospek klien, negosiasi, closing kontrak, dan menjadi jembatan antara keinginan klien dengan tim produksi.', 'skills' => json_encode(['Negosiasi', 'Project Management', 'Client Communication']), 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => '🎨', 'role' => 'Creative Director & UI Designer', 'focus' => 'Desain & Branding', 'description' => 'Merancang Visual Identity dan brand guideline klien. Membuat desain feed Instagram dengan prinsip UI/UX agar informasi produk mudah dicerna audiens.', 'skills' => json_encode(['Figma', 'Canva Pro', 'UI/UX Principles']), 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => '🎬', 'role' => 'Content Creator & Videographer', 'focus' => 'Produksi & Visual', 'description' => 'Turun langsung ke lokasi klien untuk dokumentasi foto & video produk. Mengedit Reels/TikTok dengan transisi dan audio yang sedang trending.', 'skills' => json_encode(['CapCut Pro', 'Adobe Premiere', 'Fotografi Produk']), 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => '📊', 'role' => 'Social Media Strategist & Data Analyst', 'focus' => 'Data & Strategi', 'description' => 'Riset hashtag dan kompetitor, menulis copywriting persuasif, menjadwalkan konten otomatis, dan menyusun laporan analitik bulanan untuk klien.', 'skills' => json_encode(['Meta Business Suite', 'Copywriting', 'Data Analytics']), 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('process_steps')->insert([
            ['step_number' => '01', 'title' => 'Briefing & Audit Akun', 'description' => 'Kami mengaudit kondisi akun media sosial kamu saat ini — mulai dari konsistensi visual, engagement rate, hingga kualitas caption. Hasilnya jadi dasar strategi bulan pertama.', 'icon' => '🔍', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['step_number' => '02', 'title' => 'Perumusan Content Pillar', 'description' => 'Kami merancang Content Pillar yang spesifik untuk bisnis kamu. F&B: menu highlight, behind the scene, promo. Fashion: OOTD mix, product detail, gaya hidup. Semua disesuaikan dengan target audiens.', 'icon' => '🗂️', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['step_number' => '03', 'title' => 'Produksi Konten', 'description' => 'Tim desainer membuat feed Instagram (Figma/Canva), videografer turun ke lokasi kamu untuk shooting produk, lalu diedit dengan transisi dan audio trending (CapCut/Premiere).', 'icon' => '🎬', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['step_number' => '04', 'title' => 'Revisi & Approval', 'description' => 'Semua konten dikirim ke kamu via Google Drive untuk direview. Kamu punya 2x hak revisi per konten sebelum diunggah. Tidak ada yang tayang tanpa persetujuan kamu.', 'icon' => '✅', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['step_number' => '05', 'title' => 'Auto-Scheduling & Posting', 'description' => 'Konten dijadwalkan otomatis via Meta Business Suite pada jam tayang optimal — berdasarkan data insight kapan followers kamu paling aktif.', 'icon' => '⏰', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['step_number' => '06', 'title' => 'Evaluasi & Laporan Bulanan', 'description' => 'Di akhir bulan, kamu menerima laporan lengkap: reach, impression, engagement rate, pertumbuhan followers, dan rekomendasi strategi bulan berikutnya. Transparan, no BS.', 'icon' => '📊', 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('tools')->insert([
            ['icon' => 'figma.png', 'name' => 'Figma', 'category' => 'UI/UX Design', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => 'canva.png', 'name' => 'Canva Pro', 'category' => 'Desain Grafis', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => 'capcut.png', 'name' => 'CapCut Pro', 'category' => 'Editing Video', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => 'meta-business.png', 'name' => 'Meta Business Suite', 'category' => 'Scheduling', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => 'google-analytics.png', 'name' => 'Google Analytics', 'category' => 'Analitik Data', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['icon' => 'google-workspace.png', 'name' => 'Google Workspace', 'category' => 'Kolaborasi Tim', 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
        ]);

        DB::table('faqs')->insert([
            ['question' => 'Apakah saya bisa minta revisi desain?', 'answer' => 'Bisa. Setiap konten mendapat 2x revisi sebelum diposting. Kami memastikan kamu puas sebelum konten tayang.', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['question' => 'Bagaimana proses liputan video di lokasi?', 'answer' => 'Tim kami akan datang ke lokasi bisnis kamu (kafe, restoran, atau toko) 1–2 kali per bulan untuk shooting produk dan footage video. Jadwal disesuaikan dengan operasional bisnis kamu.', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['question' => 'Apakah saya tetap punya akses ke akun Instagram saya?', 'answer' => 'Tentu. Kami tidak mengambil alih akun. Kami bekerja sebagai admin yang kamu percayakan. Semua password dan akses tetap di tangan kamu.', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['question' => 'Berapa lama kontrak minimal?', 'answer' => 'Minimal 1 bulan. Tapi kami menyarankan minimal 3 bulan agar hasil pertumbuhan organik bisa terasa signifikan karena algoritma media sosial butuh waktu untuk "belajar" konten kamu.', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['question' => 'Apakah ada tambahan biaya untuk iklan berbayar (paid ads)?', 'answer' => 'Paket kami mencakup konten organik. Jika kamu ingin menjalankan iklan berbayar (Meta Ads/TikTok Ads), budget iklan ditanggung terpisah oleh klien. Kami bisa bantu setup dan optimasi dengan biaya tambahan.', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['question' => 'Area mana saja yang dilayani untuk liputan video?', 'answer' => 'Saat ini kami melayani area Banjarmasin dan Banjarbaru. Untuk di luar area tersebut, bisa didiskusikan dengan tambahan biaya transportasi.', 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
        ]);

        $kopiId = DB::table('clients')->insertGetId(['business_name' => 'Kopi Nusantara', 'username' => 'kopi_nusantara', 'password' => Hash::make('starter123'), 'business_type' => 'F&B / Kedai Kopi', 'service_package_id' => $starterId, 'created_at' => $now, 'updated_at' => $now]);
        $thriftId = DB::table('clients')->insertGetId(['business_name' => 'Thrift Borneo', 'username' => 'thrift_borneo', 'password' => Hash::make('growth123'), 'business_type' => 'Fashion / Thrift Shop', 'service_package_id' => $growthId, 'created_at' => $now, 'updated_at' => $now]);

        $this->seedClientDashboard($kopiId, false, $now);
        $this->seedClientDashboard($thriftId, true, $now);
    }

    private function seedClientDashboard(int $clientId, bool $growth, $now): void
    {
        $stats = $growth
            ? [['👁️', '48.700', 'Total Reach', '+22%', 'up'], ['♡', '8,9%', 'Engagement Rate', '+2,1%', 'up'], ['🎬', '19', 'Konten Dipublikasi', '+4', 'up'], ['👥', '+1.240', 'Follower Baru', '+31%', 'up'], ['📊', '76.300', 'Total Impresi', '+18%', 'up'], ['🔖', '1.580', 'Total Saves', '+14%', 'up']]
            : [['👁️', '18.500', 'Total Reach', '+12%', 'up'], ['♡', '5,4%', 'Engagement Rate', '+1,2%', 'up'], ['🖼️', '16', 'Konten Dipublikasi', '+4', 'up'], ['👥', '+320', 'Follower Baru', '+18%', 'up'], ['📊', '27.800', 'Total Impresi', '+9%', 'up'], ['🔖', '430', 'Total Saves', '-3%', 'down']];
        foreach ($stats as $i => $s) DB::table('client_stats')->insert(['client_id' => $clientId, 'icon' => $s[0], 'value' => $s[1], 'label' => $s[2], 'trend' => $s[3], 'trend_type' => $s[4], 'sort_order' => $i + 1, 'created_at' => $now, 'updated_at' => $now]);

        $trends = $growth ? [['Jan', '24K'], ['Feb', '29K'], ['Mar', '34K'], ['Apr', '39K'], ['Mei', '43K'], ['Jun', '49K']] : [['Jan', '8K'], ['Feb', '10K'], ['Mar', '12K'], ['Apr', '14K'], ['Mei', '16K'], ['Jun', '18K']];
        foreach ($trends as $i => $t) DB::table('client_reach_trends')->insert(['client_id' => $clientId, 'month' => $t[0], 'value' => $t[1], 'sort_order' => $i + 1, 'created_at' => $now, 'updated_at' => $now]);

        $contents = $growth
            ? [['2025-06-01', '1 Jun 2025', 'Reels Thrift Haul Mingguan', 'Reels/TikTok', '12.400', '1.240', '96'], ['2025-06-04', '4 Jun 2025', 'Mix & Match Outfit Kampus', 'Carousel', '8.950', '830', '74'], ['2025-06-07', '7 Jun 2025', 'Promo Bundling Jaket Vintage', 'Story + Feed', '5.730', '421', '38'], ['2025-06-11', '11 Jun 2025', 'Behind The Scene Photoshoot', 'Reels/TikTok', '10.820', '1.010', '82'], ['2025-06-15', '15 Jun 2025', 'Katalog Celana Cargo Lokal', 'Feed IG', '4.950', '350', '24'], ['2025-06-18', '18 Jun 2025', 'Tips Styling Oversized Shirt', 'Reels/TikTok', '9.700', '905', '77'], ['2025-06-22', '22 Jun 2025', 'Drop Baru: Outer Vintage', 'Carousel', '6.400', '602', '43'], ['2025-06-26', '26 Jun 2025', 'Konten Try-On Pelanggan', 'Reels/TikTok', '11.200', '1.140', '91']]
            : [['2025-06-01', '1 Jun 2025', 'Promo Kopi Susu Aren', 'Feed IG', '3.400', '312', '28'], ['2025-06-03', '3 Jun 2025', 'Menu Best Seller Minggu Ini', 'Feed IG', '2.950', '201', '12'], ['2025-06-06', '6 Jun 2025', 'Story Promo Weekend', 'Story IG', '1.870', '167', '10'], ['2025-06-10', '10 Jun 2025', 'Tips Pilih Kopi Sesuai Mood', 'Carousel', '2.600', '219', '18'], ['2025-06-14', '14 Jun 2025', 'Customer Spotlight', 'Feed IG', '2.300', '189', '14'], ['2025-06-18', '18 Jun 2025', 'Promo Paket Nongkrong', 'Story IG', '1.950', '143', '9']];
        foreach ($contents as $i => $c) DB::table('client_contents')->insert(['client_id' => $clientId, 'publish_date' => $c[0], 'display_date' => $c[1], 'title' => $c[2], 'type' => $c[3], 'reach' => $c[4], 'likes' => $c[5], 'comments' => $c[6], 'sort_order' => $i + 1, 'created_at' => $now, 'updated_at' => $now]);

        if ($growth) {
            $insights = [['🎬', 'Reels/TikTok Terbaik', 'Konten “Reels Thrift Haul Mingguan” menjadi video terbaik dengan reach 12.400 dan engagement tinggi.'], ['⏰', 'Jam Posting Terbaik', 'Audiens paling aktif pada pukul 19.00 - 21.00, terutama hari Jumat dan Sabtu.'], ['🔎', 'Analisis Kompetitor', 'Kompetitor lokal aktif memakai konten try-on, harga diskon, dan video pendek dengan audio trending.'], ['✍️', 'Evaluasi Copywriting', 'Caption dengan CTA langsung seperti “DM untuk booking item” menghasilkan respons lebih tinggi.']];
            foreach ($insights as $i => $x) DB::table('client_insights')->insert(['client_id' => $clientId, 'icon' => $x[0], 'title' => $x[1], 'description' => $x[2], 'sort_order' => $i + 1, 'created_at' => $now, 'updated_at' => $now]);
            foreach (['Tambah 4 konten Reels/TikTok berbasis tren audio.', 'Buat konten try-on outfit untuk meningkatkan kepercayaan pembeli.', 'Gunakan CTA yang lebih jelas pada caption, seperti “DM untuk booking item”.', 'Bandingkan performa konten dengan 2-3 kompetitor lokal.'] as $i => $r) DB::table('client_recommendations')->insert(['client_id' => $clientId, 'recommendation' => $r, 'sort_order' => $i + 1, 'created_at' => $now, 'updated_at' => $now]);
            foreach (['#ThriftBanjarmasin', '#OOTDBanjarmasin', '#ThriftHaul', '#FashionLokal', '#OutfitKampus'] as $i => $h) DB::table('client_hashtags')->insert(['client_id' => $clientId, 'hashtag' => $h, 'sort_order' => $i + 1, 'created_at' => $now, 'updated_at' => $now]);
        }
    }
}
