<?php
/**
 * Template Name: Halaman Jaringan Agen Daerah
 * Description: Template 3 wilayah keagenan dengan Google Maps asli & tombol Navigasi Rute Aktif.
 */

get_header();

// Mengambil nomor WhatsApp utama dan sekunder langsung dari database WordPress Customizer
$wa_primary   = get_theme_mod('noni_wa_primary', '6281238162678');
$wa_secondary = get_theme_mod('noni_wa_secondary', '6281236300077');

// 1. DATA MASTER JARINGAN DISTRIBUSI + LINK MAPS ASLI (Routing nomor WA langsung ditentukan di sini)
$agents_directory = [
    [
        'city'       => 'Denpasar & Badung',
        'short_name' => 'Denpasar',
        'icon'       => '🏙️',
        'keywords'   => 'denpasar, badung, kuta, seminyak, jimbaran, nusa dua, sanur, dalung, canggu, sesetan, renon',
        'coverage'   => 'Seluruh wilayah Kota Denpasar & Kabupaten Badung. Melayani pengiriman instan langsung via kurir lokal (Bisa COD).',
        'speed'      => 'Respon Instan (< 10 Menit)',
        'type'       => 'Pusat Distribusi Utama',
        'wa_number'  => $wa_primary, // Mengarah ke WA Primary
        'map_embed'  => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.300318589221!2d115.20692410000001!3d-8.6629622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240bc875238b5%3A0xa68f2ffb47b05dd7!2sAgen%20Tahitian%20Noni%20Denpasar%20Bali!5e0!3m2!1sen!2sid!4v1781273726522!5m2!1sen!2sid',
        'map_direct' => 'https://maps.app.goo.gl/J6Cvq2LshNifaJqv9'
    ],
    [
        'city'       => 'Singaraja & Buleleng',
        'short_name' => 'Singaraja',
        'icon'       => '🌄',
        'keywords'   => 'singaraja, buleleng, lovina, seririt, kubutambahan, sukasada, gerokgak, banjar',
        'coverage'   => 'Kota Singaraja, area wisata Lovina, Seririt, Sukasada, hingga seluruh wilayah pesisir Bali Utara.',
        'speed'      => 'Respon Cepat (< 15 Menit)',
        'type'       => 'Agen Utama Bali Utara',
        'wa_number'  => $wa_secondary, // Mengarah ke WA Secondary
        'map_embed'  => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31598.035602639862!2d115.03459001083982!3d-8.126463799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd19bb7abe3aa2b%3A0x72c46fdbccfc6811!2sTahitian%20Noni%20Juice%20Bali!5e0!3m2!1sen!2sid!4v1781273992666!5m2!1sen!2sid',
        'map_direct' => 'https://maps.app.goo.gl/dnKzWUcyKtB3qYYr7'
    ],
    [
        'city'       => 'Bangli',
        'short_name' => 'Bangli',
        'icon'       => '⛰️',
        'keywords'   => 'bangli, kintamani, tembuku, susut, penglipuran',
        'coverage'   => 'Kawasan Kota Bangli, Tembuku, Susut, hingga area Kintamani. Melayani pengiriman harian kilat.',
        'speed'      => 'Respon Cepat (< 20 Menit)',
        'type'       => 'Stokis Resmi Bangli',
        'wa_number'  => $wa_primary, // Mengarah ke WA Primary
        'map_embed'  => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.555772430189!2d115.36335537407899!3d-8.445207585333428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd219d99a8a3581%3A0x3b2ca1442eb8c891!2sTahitian%20noni%20bangli!5e0!3m2!1sen!2sid!4v1781274079176!5m2!1sen!2sid',
        'map_direct' => 'https://maps.app.goo.gl/HVGvnnSeSpZpmYqg8'
    ]
];
?>

<main class="agents-page-container" style="max-width: 1100px; margin: 100px auto 60px auto; padding: 0 24px; font-family: 'DM Sans', sans-serif;">
    
    <div class="agents-page-header" style="text-align: center; margin-bottom: 40px;">
        <span style="color: var(--g-mid, #2d5a40); font-weight: 700; font-size: 13px; text-transform: uppercase; letter-spacing: 1.5px; background: var(--g-pale, #e8f2ec); padding: 5px 14px; border-radius: 20px;">Jaringan Resmi Morinda Bali</span>
        <h1 style="font-family: 'Playfair Display', serif; font-size: 38px; color: var(--g-deep, #1a3d2b); margin: 12px 0 12px 0;">Cari Agen Tahitian Noni Terdekat</h1>
        <p style="color: var(--tm, #4a4a47); max-width: 620px; margin: 0 auto; line-height: 1.6; font-size: 15px;">Silakan cek peta lokasi gudang agen fisik kami di bawah ini. Anda bisa langsung datang ke lokasi atau meminta kurir kami mengirimkan produk langsung ke rumah (Bisa COD).</p>
    </div>

    <div class="search-filter-box" style="background: white; border: 1px solid rgba(26,61,43,0.08); border-radius: 20px; padding: 24px; box-shadow: 0 8px 30px rgba(0,0,0,0.02); margin-bottom: 36px;">
        <div style="position: relative; max-width: 600px; margin: 0 auto;">
            <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); font-size: 18px;">🔍</span>
            <input type="text" id="agent-search-input" placeholder="Ketik wilayah Anda (Contoh: Denpasar, Kuta, Lovina, Kintamani)..." 
                   style="width: 100%; padding: 14px 16px 14px 48px; border-radius: 30px; border: 1px solid rgba(26,61,43,0.18); font-size: 14px; outline: none; transition: border-color 0.2s; box-shadow: inset 0 2px 4px rgba(0,0,0,0.01);">
        </div>
        
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 8px; margin-top: 16px; align-items: center;">
            <span style="font-size: 12px; color: var(--tl, #9a9a96); font-weight: 500;">Pencarian cepat:</span>
            <?php foreach(['Denpasar', 'Badung', 'Singaraja', 'Buleleng', 'Bangli', 'Kintamani'] as $tag): ?>
                <button class="quick-tag-btn" onclick="applyQuickSearch('<?php echo $tag; ?>')" 
                        style="background: #f4f4f2; border: none; padding: 4px 12px; border-radius: 12px; font-size: 12px; color: var(--g-deep, #1a3d2b); cursor: pointer; transition: all 0.2s;">
                    + <?php echo $tag; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="search-empty-state" style="display: none; text-align: center; padding: 40px 20px; background: #fafafa; border-radius: 16px; margin-bottom: 40px; border: 1px dashed rgba(0,0,0,0.1);">
        <span style="font-size: 40px;">📍</span>
        <h3 style="margin: 12px 0 6px 0; color: var(--g-deep, #1a3d2b);">Lokasi tidak spesifik?</h3>
        <p style="color: var(--tm, #4a4a47); max-width: 450px; margin: 0 auto 16px auto; font-size: 13px; line-height: 1.5;">Tenang, Stokis Utama kami tetap melayani pengiriman langsung ke seluruh pelosok desa di Bali hari ini juga.</p>
        <button onclick="applyQuickSearch('')" style="background: var(--g-mid, #2d5a40); color: white; border: none; padding: 8px 18px; border-radius: 20px; font-size: 12px; cursor: pointer; font-weight: 600;">Lihat Semua Agen</button>
    </div>

    <div class="agents-directory-grid" id="agents-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 24px; margin-bottom: 50px;">
        <?php foreach ($agents_directory as $agent): 
            // Membuat teks pesan WhatsApp dinamis berdasarkan kota masing-masing agen
            $wa_message = "Halo Perwakilan Resmi Tahitian Noni Daerah " . $agent['city'] . ".\nSaya ingin berkonsultasi dan memesan produk dari stok terdekat dengan lokasi saya.";
            $wa_url = "https://wa.me/" . $agent['wa_number'] . "?text=" . rawurlencode($wa_message);
        ?>
            <div class="agent-directory-card fu" data-keywords="<?php echo esc_attr($agent['keywords'] . ' ' . $agent['city']); ?>"
                 style="background: white; border: 1px solid rgba(26,61,43,0.06); border-radius: 18px; padding: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.02); display: flex; flex-direction: column; transition: transform 0.3s, box-shadow 0.3s;">
                
                <div style="display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 14px;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <span style="font-size: 26px; background: var(--g-pale, #e8f2ec); width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; border-radius: 12px;"><?php echo esc_html($agent['icon']); ?></span>
                        <div>
                            <h3 style="margin: 0; font-size: 18px; color: var(--g-deep, #1a3d2b); font-family: 'DM Sans', sans-serif; font-weight: 700;"><?php echo esc_html($agent['city']); ?></h3>
                            <span style="font-size: 11px; color: #0e7490; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;"><?php echo esc_html($agent['type']); ?></span>
                        </div>
                    </div>
                </div>

                <div class="agent-gmap-container" style="width: 100%; height: 170px; border-radius: 12px; overflow: hidden; margin-bottom: 12px; border: 1px solid rgba(0,0,0,0.06); background: #f0ebe0;">
                    <iframe 
                        src="<?php echo esc_url($agent['map_embed']); ?>" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <a href="<?php echo esc_url($agent['map_direct']); ?>" target="_blank" rel="noopener"
                   style="display: inline-flex; align-items: center; justify-content: center; gap: 6px; width: 100%; background: #f0ebe0; color: var(--g-deep, #1a3d2b); font-size: 12.5px; font-weight: 700; padding: 10px; border-radius: 10px; margin-bottom: 16px; border: 1px solid rgba(26,61,43,0.12); transition: all 0.2s; text-decoration: none; text-align: center;">
                   📍 Pergi Sekarang (Petunjuk Rute)
                </a>

                <div style="display: flex; flex-direction: column; gap: 6px; margin-bottom: 14px;">
                    <div style="display: inline-flex; align-items: center; gap: 6px; font-size: 12px; color: #2d5a40; font-weight: 500;">
                        <span style="color: #25D366;">⚡</span> <?php echo esc_html($agent['speed']); ?>
                    </div>
                    <div style="display: inline-flex; align-items: center; gap: 6px; font-size: 12px; color: #b45309; font-weight: 500;">
                        <span>🛵</span> Kurir Delivery COD Aktif
                    </div>
                </div>

                <p style="font-size: 13.5px; color: var(--tm, #4a4a47); line-height: 1.6; margin: 0 0 20px 0; flex-grow: 1;">
                    <strong>Wilayah Kirim:</strong> <?php echo esc_html($agent['coverage']); ?>
                </p>

                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener"
                   style="width: 100%; background: #25D366; color: white; border: none; padding: 12px; border-radius: 12px; font-weight: 600; font-size: 13.5px; display: flex; align-items: center; justify-content: center; gap: 8px; box-shadow: 0 4px 12px rgba(37,211,102,0.15); transition: background 0.2s; text-decoration: none;">
                    💬 Hubungi Agen <?php echo esc_html($agent['short_name']); ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

<div class="partnership-promo-box" style="background: linear-gradient(135deg, #fefaf4, #f5efe0); border: 1px solid rgba(212,135,10,0.15); border-radius: 24px; padding: 36px; display: flex; flex-wrap: wrap; gap: 24px; align-items: center; justify-content: space-between;">
    <div style="max-width: 600px;">
        <span style="color: var(--amber, #d4870a); font-weight: 700; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 6px;">Peluang Bisnis / Kemitraan</span>
        <h2 style="font-family: 'Playfair Display', serif; font-size: 24px; color: var(--g-deep, #1a3d2b); margin: 0 0 10px 0;">Ingin Menjadi Sub-Agen Resmi di Kabupaten Lain?</h2>
        <p style="margin: 0; color: var(--tm, #4a4a47); font-size: 13.5px; line-height: 1.6;">
            Dapatkan proteksi area, harga grosir terbaik langsung dari pusat, serta limpahan database calon konsumen potensial untuk wilayah Tabanan, Gianyar, Jembrana, Klungkung, dan Karangasem.
        </p>
    </div>
    <div style="flex-shrink: 0;">
        <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('noni_wa_primary', '6281238162678')); ?>?text=Halo%20Admin%20Noni%20Bali%2C%20saya%20tertarik%20bertanya%20mengenai%20syarat%20kemitraan%20menjadi%20sub-agen%20baru." target="_blank" rel="noopener" style="display: inline-block; background: var(--g-deep, #1a3d2b); color: white; padding: 12px 24px; border-radius: 30px; font-weight: 600; font-size: 13px; transition: transform 0.2s; box-shadow: 0 4px 15px rgba(26,61,43,0.15); text-decoration: none;">
            Daftar Kemitraan →
        </a>
    </div>
</div>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('agent-search-input');
    const cards = document.querySelectorAll('.agent-directory-card');
    const emptyState = document.getElementById('search-empty-state');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            let visibleCount = 0;

            cards.forEach(card => {
                const keywords = card.getAttribute('data-keywords').toLowerCase();
                if (keywords.includes(query)) {
                    card.style.display = 'flex';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            emptyState.style.display = (visibleCount === 0) ? 'block' : 'none';
        });
    }
});

function applyQuickSearch(text) {
    const searchInput = document.getElementById('agent-search-input');
    if (searchInput) {
        searchInput.value = text;
        searchInput.dispatchEvent(new Event('input'));
    }
}
</script>

<?php 
get_footer(); 
?>