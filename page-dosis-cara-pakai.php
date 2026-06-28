<?php
/**
 * Template Name: Dosis & Cara Pakai
 * Description: Custom page template untuk panduan dosis konsumsi Tahitian Noni Juice.
 * Upload to: wp-content/themes/noni-bali/page-dosis-cara-pakai.php
 */

get_header();

$wa1 = get_theme_mod('noni_wa_primary', '6281238162678');
// Fallback jika fungsi noni_wa_url belum terdefinisi di functions.php
if (!function_exists('noni_page_wa_url')) {
    function noni_page_wa_url($text, $num) {
        return 'https://wa.me/' . $num . '?text=' . urlencode($text);
    }
}
?>

<style>
.dosis-container {
    padding-top: 100px; /* Jarak aman dari fixed header */
    background: var(--cream);
    color: var(--td);
    font-family: 'DM Sans', sans-serif;
}

.dosis-hero {
    text-align: center;
    padding: 60px 24px 40px;
    max-width: 800px;
    margin: 0 auto;
}

.dosis-hero h1 {
    font-family: 'Playfair Display', serif;
    color: var(--g-deep);
    font-size: 2.5rem;
    margin-bottom: 16px;
    line-height: 1.2;
}

.dosis-hero p {
    color: var(--tm);
    font-size: 1.1rem;
    line-height: 1.6;
}

/* SECTION PANDUAN DOSIS (GRID CARDS) */
.dosis-section {
    max-width: 1100px;
    margin: 0 auto;
    padding: 20px 24px 60px;
}

.section-title {
    font-family: 'Playfair Display', serif;
    color: var(--g-deep);
    text-align: center;
    font-size: 1.8rem;
    margin-bottom: 32px;
    position: relative;
}

.section-title::after {
    content: '';
    display: block;
    width: 60px;
    height: 3px;
    background: var(--amber);
    margin: 12px auto 0;
    border-radius: 2px;
}

.dosis-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
    margin-bottom: 60px;
}

.dosis-card {
    background: var(--white);
    border: 1px solid rgba(26,61,43,0.06);
    border-radius: 16px;
    padding: 32px;
    box-shadow: 0 4px 20px rgba(26,61,43,0.02);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}

.dosis-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(26,61,43,0.06);
}

.card-badge {
    align-self: flex-start;
    background: var(--g-pale);
    color: var(--g-deep);
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 0.85rem;
    font-weight: 700;
    margin-bottom: 18px;
}

.dosis-card h3 {
    font-family: 'Playfair Display', serif;
    color: var(--g-deep);
    font-size: 1.4rem;
    margin-bottom: 12px;
}

.card-amount {
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--amber);
    margin-bottom: 16px;
}

.card-amount span {
    font-size: 0.9rem;
    color: var(--tl);
    font-weight: 400;
}

.dosis-card ul {
    margin-top: auto;
    padding-left: 18px;
    color: var(--tm);
    font-size: 0.95rem;
    line-height: 1.6;
}

.dosis-card ul li {
    margin-bottom: 8px;
}

/* SECTION CARA MINUM (STEPS) */
.steps-wrapper {
    background: var(--cream-dk);
    padding: 60px 24px;
    border-radius: 24px;
    max-width: 1050px;
    margin: 0 auto 60px;
}

.steps-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 24px;
    margin-top: 40px;
}

.step-item {
    text-align: center;
    padding: 16px;
}

.step-num {
    width: 50px;
    height: 50px;
    background: var(--g-mid);
    color: var(--white);
    font-size: 1.3rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin: 0 auto 16px;
    box-shadow: 0 4px 10px rgba(45,90,64,0.2);
}

.step-item h4 {
    font-family: 'Playfair Display', serif;
    color: var(--g-deep);
    font-size: 1.15rem;
    margin-bottom: 8px;
}

.step-item p {
    color: var(--tm);
    font-size: 0.9rem;
    line-height: 1.5;
}

/* SECTION DISCLAIMER / DETOKS */
.detoks-box {
    background: rgba(212,135,10,0.06);
    border-left: 4px solid var(--amber);
    border-radius: 0 16px 16px 0;
    padding: 24px 32px;
    max-width: 850px;
    margin: 0 auto 60px;
}

.detoks-box h4 {
    color: var(--amber);
    font-size: 1.1rem;
    margin-bottom: 8px;
    font-weight: 700;
}

.detoks-box p {
    color: var(--tm);
    font-size: 0.95rem;
    line-height: 1.6;
    margin: 0;
}

/* CTA CONSULTATION */
.dosis-cta {
    text-align: center;
    padding: 40px 24px 80px;
}

.dosis-cta p {
    font-size: 1.1rem;
    color: var(--tm);
    margin-bottom: 20px;
}

.btn-cta-dosis {
    display: inline-flex;
    align-items: center;
    background: var(--wa);
    color: var(--white);
    padding: 14px 32px;
    border-radius: 999px;
    font-weight: 700;
    font-size: 1rem;
    box-shadow: 0 4px 15px rgba(37,211,102,0.3);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.btn-cta-dosis:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(37,211,102,0.4);
    color: var(--white);
}

/* RESPONSIVE MEDIA QUERIES */
@media (max-width: 768px) {
    .dosis-hero h1 { font-size: 2rem; }
    .dosis-hero { padding-top: 40px; }
    .dosis-grid { grid-template-columns: 1fr; }
    .steps-grid { grid-template-columns: 1fr; gap: 32px; }
    .detoks-box { padding: 20px; }
}
</style>

<div class="dosis-container">
    
    <div class="dosis-hero">
        <h1>Aturan Dosis & Cara Konsumsi</h1>
        <p>Guna mendapatkan khasiat perlindungan kesehatan dan pemulihan tubuh yang optimal, silakan ikuti panduan dosis berkala orisinal dari kompilasi riset laboratorium medis internasional berikut.</p>
    </div>

    <div class="dosis-section">
        <h2 class="section-title">Anjuran Dosis Harian</h2>
        
        <div class="dosis-grid">
            <div class="dosis-card">
                <span class="card-badge">Stamina & Proteksi</span>
                <h3>Menjaga Kesehatan</h3>
                <div class="card-amount">30 ml <span>/ konsumsi</span></div>
                <ul>
                    <li>Diminum 2x sehari (Pagi hari & Malam hari).</li>
                    <li>Sangat baik untuk meningkatkan daya tahan tubuh, imunitas, serta energi aktivitas sehari-hari.</li>
                </ul>
            </div>

            <div class="dosis-card">
                <span class="card-badge">Penyembuhan Ringan</span>
                <h3>Pemulihan & Sakit Ringan</h3>
                <div class="card-amount">60 ml <span>/ konsumsi</span></div>
                <ul>
                    <li>Diminum 2x hingga 3x sehari.</li>
                    <li>Ideal untuk mempercepat pemulihan dari flu, demam, radang, kolesterol, asam urat, atau kelelahan kronis.</li>
                </ul>
            </div>

            <div class="dosis-card">
                <span class="card-badge">Kondisi Kronis</span>
                <h3>Penyembuhan Sakit Berat</h3>
                <div class="card-amount">120 ml <span>/ konsumsi</span></div>
                <ul>
                    <li>Diminum secara berkala (setiap 2-3 jam sekali) sesuai tingkat keparahan penyakit.</li>
                    <li>Ditujukan khusus bagi penderita Diabetes, Jantung, Kanker, Stroke, Tumor, atau Kista.</li>
                </ul>
            </div>
        </div>

        <div class="steps-wrapper">
            <h2 class="section-title">4 Langkah Cara Mengonsumsi yang Benar</h2>
            
            <div class="steps-grid">
                <div class="step-item">
                    <div class="step-num">1</div>
                    <h4>Kocok Dahulu</h4>
                    <p>Kocok botol perlahan sebelum dituang agar sari buah Noni yang mengendap di bawah dapat tercampur merata.</p>
                </div>
                <div class="step-item">
                    <div class="step-num">2</div>
                    <h4>Perut Kosong</h4>
                    <p>Minum dalam kondisi perut kosong (bangun tidur pagi atau sebelum makan) agar penyerapan nutrisi maksimal.</p>
                </div>
                <div class="step-item">
                    <div class="step-num">3</div>
                    <h4>Tahan di Lidah</h4>
                    <p>Kulum cairan Noni di bawah lidah selama 15–30 detik sebelum ditelan guna merangsang kelenjar sublingual.</p>
                </div>
                <div class="step-item">
                    <div class="step-num">4</div>
                    <h4>Simpan Kulkas</h4>
                    <p>Setelah segel botol dibuka, wajib disimpan di dalam lemari es (kulkas) karena produk ini 100% alami tanpa pengawet.</p>
                </div>
            </div>
        </div>

        <div class="detoks-box">
            <h4>💡 Catatan Penting Mengenai Proses Detoksifikasi (Healing Crisis)</h4>
            <p>Pada beberapa hari awal konsumsi, tubuh terkadang mengalami proses pembuangan racun alami (detoks) berupa buang air kecil lebih sering, mengantuk, atau pusing ringan. Ini adalah indikator positif bahwa sel-sel tubuh sedang melakukan regenerasi dan pembersihan. Teruskan konsumsi dan perbanyak minum air putih hangat.</p>
        </div>

        <div class="dosis-cta">
            <p>Ragu mengenai takaran dosis yang tepat untuk kondisi medis khusus Anda?</p>
            <a href="<?php echo esc_url(noni_page_wa_url('Halo Noni Bali! Saya ingin konsultasi dosis minum Tahitian Noni Juice yang tepat untuk kondisi kesehatan saya.', $wa1)); ?>" target="_blank" rel="noopener" class="btn-cta-dosis">
                💬 Konsultasi Dosis via WhatsApp
            </a>
        </div>

    </div>
</div>

<?php 
get_footer(); 
?>