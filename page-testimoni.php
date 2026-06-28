<?php
/**
 * Template Name: Halaman Kumpulan Testimoni
 * Description: Template halaman khusus untuk menampilkan katalog testimoni secara otomatis dari Dashboard (Custom Post Type).
 */

get_header();
$wa_number  = get_theme_mod('noni_wa_primary', '6281238162678');

// 1. AMBIL DATA DARI MENU DASHBOARD CUSTOM POST TYPE 'noni_testi'
$args = [
    'post_type'      => 'noni_testi',
    'posts_per_page' => -1, // Ambil semua tanpa batas
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
];
$testi_query = new WP_Query($args);

// 2. KUMPULKAN JUDUL UNTUK TOMBOL FILTER OTOMATIS
$conditions = [];
if ($testi_query->have_posts()) {
    while ($testi_query->have_posts()) {
        $testi_query->the_post();
        $conditions[] = get_the_title();
    }
    $conditions = array_unique($conditions);
    $testi_query->rewind_posts(); // Kembalikan posisi data ke awal untuk looping kartu
}
?>

<main class="testi-page-container" style="max-width: 1200px; margin: 100px auto 40px auto; padding: 0 24px; font-family: 'DM Sans', sans-serif;">
    
    <div class="testi-page-header" style="text-align: center; margin-bottom: 40px;">
        <span style="color: var(--amber, #d4870a); font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Kisah Nyata Pelanggan</span>
        <h1 style="font-family: 'Playfair Display', serif; font-size: 36px; color: var(--g-deep, #1a3d2b); margin: 8px 0 12px 0;">Kumpulan Testimoni Kesehatan</h1>
        <p style="color: var(--tm, #4a4a47); max-width: 600px; margin: 0 auto; line-height: 1.6;">Gunakan tombol filter di bawah untuk melihat riwayat pemulihan kesehatan berdasarkan jenis penyakit atau keluhan kesehatan.</p>
    </div>

    <!-- TOMBOL FILTER GENERATE OTOMATIS DARI JUDUL POSTINGAN -->
    <div class="testi-filter-bar" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-bottom: 36px;">
        <button class="filter-btn active" data-target="all" style="padding: 8px 18px; border-radius: 20px; border: 1px solid var(--g-mid, #2d5a40); background: var(--g-mid, #2d5a40); color: white; font-size: 13px; font-weight: 500; cursor: pointer; transition: all 0.2s;">
            ✨ Semua Kategori
        </button>
        <?php foreach ($conditions as $cond): ?>
            <button class="filter-btn" data-target="<?php echo esc_attr(sanitize_title($cond)); ?>" style="padding: 8px 18px; border-radius: 20px; border: 1px solid rgba(26,61,43,0.15); background: white; color: var(--g-deep, #1a3d2b); font-size: 13px; font-weight: 500; cursor: pointer; transition: all 0.2s;">
                <?php echo esc_html($cond); ?>
            </button>
        <?php endforeach; ?>
    </div>

    <!-- GRID DATA KARTU TESTIMONI (DIAMBIL DARI DATABASE) -->
    <div class="testi-grid-wrapper" id="testi-cards-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 24px; margin-bottom: 40px;">
        <?php 
        if ($testi_query->have_posts()) :
            while ($testi_query->have_posts()) : $testi_query->the_post(); 
                $title_keluhan = get_the_title();
                $filter_slug   = sanitize_title($title_keluhan);
                $full_text     = get_the_content();
                $short_text    = wp_trim_words($full_text, 25, '...');
                $initial       = mb_substr($title_keluhan, 0, 2);
        ?>
            <div class="testi-item-card fu" data-condition="<?php echo esc_attr($filter_slug); ?>" style="background: white; border: 1px solid rgba(0,0,0,0.06); border-radius: 16px; padding: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.02); display: flex; flex-direction: column; transition: all 0.3s ease;">
                
                <div class="testi-meta-top" style="display: flex; align-items: center; gap: 14px; margin-bottom: 16px;">
                    <div class="testi-avatar" style="width: 46px; height: 46px; border-radius: 50%; background: var(--g-mid, #2d5a40); color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; text-transform: uppercase;">
                        <?php echo esc_html($initial); ?>
                    </div>
                    <div>
                        <div class="testi-name" style="font-weight: 700; color: var(--td, #1a1a18); font-size: 16px;"><?php echo esc_html($title_keluhan); ?></div>
                        <div class="testi-loc" style="font-size: 12px; color: var(--tl, #9a9a96);">📍 Kisah Nyata Pasien</div>
                    </div>
                </div>

                <div style="display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 14px;">
                    <span class="testi-product-badge" style="background: rgba(26,61,43,0.06); color: var(--g-deep, #1a3d2b); font-size: 11px; font-weight: 600; padding: 3px 10px; border-radius: 12px;">
                        🥤 Tahitian Noni Bioactive
                    </span>
                </div>

                <div style="color: #f5a623; margin-bottom: 12px; letter-spacing: 2px;">
                    ★★★★★
                </div>

                <p class="testi-card-text" data-fulltext="<?php echo esc_attr(wp_strip_all_tags($full_text)); ?>" style="color: var(--tm, #4a4a47); font-size: 14px; line-height: 1.6; margin: 0; flex-grow: 1;">
                    <?php echo esc_html(wp_strip_all_tags($short_text)); ?>
                </p>

                <?php if (str_word_count($full_text) > 25): ?>
                    <button class="read-more-testi-btn" style="background: none; border: none; color: var(--g-mid, #2d5a40); font-weight: 600; font-size: 13px; text-align: left; padding: 6px 0 0 0; cursor: pointer; margin-top: 8px;">
                        Baca selengkapnya ↓
                    </button>
                <?php endif; ?>
            </div>
        <?php 
            endwhile;
            wp_reset_postdata(); // Wajib membersihkan query data global wordpress
        else :
        ?>
            <p style="text-align: center; grid-column: 1 / -1; color: var(--tm);">Belum ada data testimoni yang dipublikasikan.</p>
        <?php endif; ?>
    </div>

    <!-- BANNER DISCLAIMER -->
    <div class="medical-disclaimer-banner" style="background: #fef3c7; border: 1px solid #fde68a; border-radius: 16px; padding: 20px; display: flex; gap: 16px; margin-bottom: 40px; margin-top: 40px;">
        <span style="font-size: 24px; flex-shrink: 0; line-height: 1;">⚕️</span>
        <div>
            <h4 style="margin: 0 0 4px 0; font-size: 14px; font-weight: 700; color: #92400e;">Sanggahan Medis (Disclaimer)</h4>
            <p style="margin: 0; font-size: 13px; color: #b45309; line-height: 1.6;">
                Kisah kesembuhan dan testimoni di atas adalah pengalaman nyata dari para pelanggan kami. Hasil yang diperoleh setiap individu dapat bervariasi tergantung kondisi fisik dan kepatuhan dosis masing-masing. Tahitian Noni Juice <strong>bukan merupakan obat medis utama</strong> pengganti resep dokter. Jangan menghentikan terapi pengobatan dokter Anda tanpa instruksi tenaga ahli medis.
            </p>
        </div>
    </div>

    <!-- BANNER CTA WHATSAPP -->
    <div class="testi-cta-box" style="background: linear-gradient(135deg, #1a3d2b, #2d5a40); border-radius: 24px; padding: 40px 32px; text-align: center; color: white;">
        <h3 style="font-family: 'Playfair Display', serif; font-size: 26px; margin-bottom: 8px; color: white;">Melemah Akibat Sakit Menahun?</h3>
        <p style="color: rgba(255,255,255,0.75); font-size: 14px; max-width: 500px; margin: 0 auto 24px auto; line-height: 1.5;">Konsultasikan keluhan penyakit Anda secara gratis bersama agen distribusi resmi kami di Bali.</p>
        <a href="https://wa.me/<?php echo esc_attr($wa_number); ?>?text=Halo%20Noni%20Bali,%20saya%20tertarik%20berkonsultasi%20mengenai%20produk%20Tahitian%20Noni." 
           target="_blank" 
           rel="noopener" 
           style="display: inline-flex; align-items: center; gap: 8px; background: #25D366; color: white; padding: 12px 28px; border-radius: 30px; font-weight: 600; font-size: 14px; box-shadow: 0 4px 14px rgba(37,211,102,0.3); transition: transform 0.2s;">
           💬 Hubungi Agen Resmi Via WhatsApp
        </a>
    </div>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.testi-item-card');
    const readMoreBtns = document.querySelectorAll('.read-more-testi-btn');

    // Filter Kontroler Interaktif
    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => {
                b.classList.remove('active');
                b.style.background = 'white';
                b.style.color = 'var(--g-deep, #1a3d2b)';
            });

            this.classList.add('active');
            this.style.background = 'var(--g-mid, #2d5a40)';
            this.style.color = 'white';

            const target = this.getAttribute('data-target');
            cards.forEach(card => {
                if (target === 'all' || card.getAttribute('data-condition') === target) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Baca Selengkapnya Kontroler
    readMoreBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const paragraph = this.previousElementSibling;
            const fullText = paragraph.getAttribute('data-fulltext');
            const isExpanded = this.getAttribute('data-expanded') === '1';

            if (isExpanded) {
                paragraph.innerText = fullText.substring(0, 150) + '...';
                this.innerHTML = 'Baca selengkapnya ↓';
                this.setAttribute('data-expanded', '0');
            } else {
                paragraph.innerText = fullText;
                this.innerHTML = 'Sembunyikan ↑';
                this.setAttribute('data-expanded', '1');
            }
        });
    });
});
</script>

<?php 
get_footer(); 
?>