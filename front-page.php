<?php
/**
 * Front Page Template — Noni Juice Bali (Sempurna & Anti-Bentrok)
 * Upload to: wp-content/themes/noni-bali/front-page.php
 */

get_header();

$wa1      = get_theme_mod('noni_wa_primary',   '6281238162678');
$wa2      = get_theme_mod('noni_wa_secondary', '6281236300077');
$email    = get_theme_mod('noni_email',        'a2bedel@gmail.com');
$hours    = get_theme_mod('noni_hours',        'Senin - Sabtu, 08.00 - 20.00 WITA');
$addr     = get_theme_mod('noni_address',      'Denpasar, Bali - Indonesia');
$hero_img = get_theme_mod('noni_hero_image',   '');

if (!function_exists('noni_stars')) {
    function noni_stars($n) {
        $n = max(1, min(5, (int)$n));
        return str_repeat('&#9733;', $n) . str_repeat('&#9734;', 5 - $n);
    }
}
?>
<!-- HERO -->
<section class="hero" id="home">
<div class="hero-glow-1"></div>
<div class="hero-glow-2"></div>
<div class="hero-wrap">

  <div class="hero-content fu">
    <div class="hero-eyebrow">
      &#11088; <?php echo esc_html(get_theme_mod('noni_hero_badge', 'Agen Resmi Tahitian Noni Bali')); ?>
    </div>
    <h1><?php echo esc_html(get_theme_mod('noni_hero_title', 'Kesehatan Alami dari Tahitian Noni untuk Keluarga Anda')); ?></h1>
    <p class="hero-lead"><?php echo esc_html(get_theme_mod('noni_hero_subtitle', 'Suplai langsung agen resmi di Denpasar, Singaraja & seluruh Bali.')); ?></p>
    <div class="hero-ctas">
      <a href="<?php echo noni_wa_url('Halo! Saya ingin pesan Tahitian Noni Juice'); ?>" target="_blank" rel="noopener" class="btn-hero-wa">&#128172; Order via WhatsApp</a>
      <a href="#produk" class="btn-hero-outline">&#128722; Lihat Produk</a>
    </div>
    <div class="hero-stats">
      <div class="hero-stat">
        <div class="hero-stat-n"><?php echo esc_html(get_theme_mod('noni_stat_years', '25+')); ?></div>
        <div class="hero-stat-l"><?php echo esc_html(get_theme_mod('noni_stat_y_label', 'Tahun Morinda')); ?></div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-n"><?php echo esc_html(get_theme_mod('noni_stat_cust', '500+')); ?></div>
        <div class="hero-stat-l"><?php echo esc_html(get_theme_mod('noni_stat_c_label', 'Pelanggan Bali')); ?></div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-n"><?php echo esc_html(get_theme_mod('noni_stat_prod', '6')); ?></div>
        <div class="hero-stat-l"><?php echo esc_html(get_theme_mod('noni_stat_p_label', 'Produk Unggulan')); ?></div>
      </div>
    </div>
  </div>

  <div class="hero-visual fu" style="transition-delay: 0.5s;">
    
    <div class="hero-image-floating-wrap" style="animation: heroFloat 6s ease-in-out infinite; display: flex; justify-content: center; align-items: center; position: relative; width: 100%;">
        <img src="https://www.nonijuicebali.com/wp-content/uploads/2026/06/logo-hero-product.png" 
             alt="Tahitian Noni Bali Original" 
             style="width: 80%; max-width: 430px; height: auto; object-fit: cover; border-radius: 24px; filter: drop-shadow(0 20px 45px rgba(26,61,43,0.18));">
    </div>

    <div class="floating-pill pill-1">&#10003; Ready Stock</div>
    <div class="floating-pill pill-2">&#128666; Kirim Hari Ini</div>

  </div>

<style>
@keyframes heroFloat {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-12px); }
    100% { transform: translateY(0px); }
}
</style>

</div>
</section>

<!-- BENEFITS (INFINITE MARQUEE SLIDER) -->
<section class="benefits" id="manfaat" style="overflow: hidden; padding: 60px 0;">
<div class="container-fluid" style="padding: 0;">
  
  <div class="container">
    <div class="fu center" style="text-align: center; margin-bottom: 40px;">
      <div class="section-tag">Manfaat Utama</div>
      <h2 class="section-h">Mengapa Tahitian Noni?</h2>
      <p class="section-sub">Lebih dari 275 nutrisi dan fitonutrien alami dari buah mengkudu Tahiti yang teruji ilmiah sejak 1996</p>
    </div>
  </div>

  <style>
    .marquee-benefits-container {
        width: 100%;
        overflow: hidden;
        padding: 20px 0;
        position: relative;
        display: flex;
    }
    .marquee-benefits-track {
        display: flex;
        gap: 24px;
        width: max-content;
        animation: jalanMundurKeKanan 35s linear infinite;
    }
    .marquee-benefits-container:hover .marquee-benefits-track {
        animation-play-state: paused;
        cursor: pointer;
    }
    .marquee-ben-card {
        background: white;
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: 16px;
        padding: 24px;
        width: 320px;
        flex-shrink: 0;
        box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        display: flex;
        flex-direction: column;
        gap: 10px;
        transition: transform 0.2s, border-color 0.2s;
    }
    .marquee-ben-card:hover {
        border-color: #2d5a40;
        transform: scale(1.02);
    }
    @keyframes jalanMundurKeKanan {
        0% { transform: translateX(-50%); }
        100% { transform: translateX(0%); }
    }
  </style>

  <?php
  $benefits = array(
    array('&#128737;', 'Tingkatkan Imunitas',  'Meningkatkan aktivitas sel NK hingga 30% dan kadar interleukin-2 sebesar 32%.'),
    array('&#9889;',   'Tingkatkan Energi',    'Proxeronine, serotonin, dan scopoletin untuk vitalitas dan stamina sepanjang hari.'),
    array('&#127807;', 'Antioksidan Kuat',     'Fitonutrien tinggi melawan radikal bebas dan memperlambat penuaan dini.'),
    array('&#128300;', 'Teruji Ilmiah',        '60+ jurnal peer-review dan uji klinis manusia. Lab Morinda bersertifikat FDA.'),
    array('&#128106;', 'Aman Semua Usia',      'Aman dari anak-anak hingga lansia. 30ml per hari untuk seluruh keluarga.'),
    array('&#127802;', 'Noni Terbaik Dunia',   'Dipanen dari French Polynesia tanpa pestisida. Proses lengkap dari pohon ke botol.'),
  );
  ?>

  <div class="marquee-benefits-container">
    <div class="marquee-benefits-track">
        
        <?php foreach ($benefits as $b) : ?>
        <div class="marquee-ben-card">
          <div style="font-size: 28px; margin-bottom: 5px;"><?php echo $b[0]; ?></div>
          <h3 style="font-size: 18px; font-weight: 700; color: #1a3d2b; margin: 0;"><?php echo esc_html($b[1]); ?></h3>
          <p style="font-size: 13.5px; color: #4a4a47; line-height: 1.5; margin: 0; white-space: normal;"><?php echo esc_html($b[2]); ?></p>
        </div>
        <?php endforeach; ?>

        <?php foreach ($benefits as $b) : ?>
        <div class="marquee-ben-card">
          <div style="font-size: 28px; margin-bottom: 5px;"><?php echo $b[0]; ?></div>
          <h3 style="font-size: 18px; font-weight: 700; color: #1a3d2b; margin: 0;"><?php echo esc_html($b[1]); ?></h3>
          <p style="font-size: 13.5px; color: #4a4a47; line-height: 1.5; margin: 0; white-space: normal;"><?php echo esc_html($b[2]); ?></p>
        </div>
        <?php endforeach; ?>

    </div>
  </div>

</div>
</section>

<!-- PRODUCTS -->
<section class="products" id="produk">
  <div class="container">

    <div class="products-header fu">
      <div>
        <div class="section-tag">Produk Kami</div>
        <h2 class="section-h">Pilihan Tahitian Noni</h2>
      </div>
      <a href="<?php echo noni_wa_url('Halo saya ingin konsultasi produk Tahitian Noni yang cocok'); ?>"
         target="_blank" rel="noopener" class="btn-hero-wa" style="white-space:nowrap">
        &#128172; Konsultasi WA
      </a>
    </div>

    <div class="products-grid">
      <?php
      $pq = new WP_Query(array(
          'post_type'      => 'noni_product',
          'posts_per_page' => 6,
          'post_status'    => 'publish',
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
      ));

      if ($pq->have_posts()) :
        while ($pq->have_posts()) : $pq->the_post();
          $id    = get_the_ID();
          $price = get_post_meta($id, 'noni_price', true);
          $vol   = get_post_meta($id, 'noni_vol',   true) ?: '1 Liter';
          $emoji = get_post_meta($id, 'noni_emoji', true) ?: '&#127807;';
          $badge = get_post_meta($id, 'noni_badge', true);
          $bc    = get_post_meta($id, 'noni_badge_class', true);
          $bg    = get_post_meta($id, 'noni_bg',    true) ?: 'linear-gradient(135deg,#d4edda,#a8d5b5)';
          $bpom  = get_post_meta($id, 'noni_bpom',  true); 
          $raw   = preg_replace('/[^0-9]/', '', $price);
      ?>
        <div class="prod-card fu">
          <a href="<?php the_permalink(); ?>" class="prod-card-link" aria-label="Lihat <?php the_title_attribute(); ?>">
            <div class="prod-img" style="background:<?php echo esc_attr($bg); ?>">
              <?php if ($badge) : ?>
                <div class="prod-badge badge-<?php echo esc_attr($bc); ?>">
                  <?php echo esc_html($badge); ?>
                </div>
              <?php endif; ?>
              <?php if (has_post_thumbnail()) :
                the_post_thumbnail('noni-product', array('style' => 'width:100%;height:100%;object-fit:contain;padding:15px;box-sizing:border-box;'));
              else : ?>
                <span style="font-size:72px"><?php echo $emoji; ?></span>
              <?php endif; ?>
            </div>
          </a>
          <div class="prod-body">
            <h3 class="prod-name">
              <a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none">
                <?php the_title(); ?>
              </a>
            </h3>
            <p class="prod-desc"><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
            
            <?php if (!empty($bpom)) : ?>
              <div class="prod-bpom" style="font-size:12px; color:#4caf50; font-weight:600; margin-bottom:12px; display:flex; align-items:center; gap:4px;">
                🛡️ BPOM: <?php echo esc_html($bpom); ?>
              </div>
            <?php endif; ?>

            <div class="prod-footer">
              <div class="prod-price">
                <small>Harga / <?php echo esc_html($vol); ?></small>
                <span class="prod-price-val"><?php echo esc_html($price); ?></span>
              </div>
              <!-- Menggunakan Class Khusus, onclick dihapus total agar tidak dirusak plugin cache -->
              <button class="btn-add noni-add-to-cart-trigger"
                      data-name="<?php the_title_attribute(); ?>"
                      data-price="<?php echo esc_attr($raw); ?>"
                      data-emoji="<?php echo esc_attr($emoji); ?>"
                      data-vol="<?php echo esc_attr($vol); ?>"
                      aria-label="Tambah <?php the_title_attribute(); ?> ke keranjang">
                + Tambah
              </button>
            </div>
          </div>
        </div>
      <?php
        endwhile; wp_reset_postdata();

      else :
        foreach (noni_default_products() as $i => $p) :
          $raw = preg_replace('/[^0-9]/', '', $p['price']);
      ?>
        <div class="prod-card fu" style="transition-delay:<?php echo $i * 0.07; ?>s">
          <div class="prod-img" style="background:<?php echo esc_attr($p['bg']); ?>">
            <?php if ($p['badge']) : ?>
              <div class="prod-badge badge-<?php echo esc_attr($p['bc']); ?>">
                <?php echo esc_html($p['badge']); ?>
              </div>
            <?php endif; ?>
            <span style="font-size:72px"><?php echo $p['emoji']; ?></span>
          </div>
          <div class="prod-body">
            <h3 class="prod-name"><?php echo esc_html($p['name']); ?></h3>
            <p class="prod-desc"><?php echo esc_html($p['desc']); ?></p>
            <div class="prod-footer">
              <div class="prod-price">
                <small>Harga / <?php echo esc_html($p['vol']); ?></small>
                <span class="prod-price-val"><?php echo esc_html($p['price']); ?></span>
              </div>
              <!-- Menggunakan Class Khusus, onclick dihapus total agar tidak dirusak plugin cache -->
              <button class="btn-add noni-add-to-cart-trigger"
                      data-name="<?php echo esc_attr($p['name']); ?>"
                      data-price="<?php echo esc_attr($raw); ?>"
                      data-emoji="<?php echo esc_attr($p['emoji']); ?>"
                      data-vol="<?php echo esc_attr($p['vol']); ?>"
                      aria-label="Tambah <?php echo esc_attr($p['name']); ?> ke keranjang">
                + Tambah
              </button>
            </div>
          </div>
        </div>
      <?php
        endforeach;
      endif;
      ?>
    </div>

  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials" id="testimoni">
<div class="container">
  <div class="fu center">
    <div class="section-tag">Testimoni Pelanggan</div>
    <h2 class="section-h">Mereka Sudah Merasakan Manfaatnya</h2>
    <p class="section-sub">Ribuan pelanggan di seluruh Bali telah merasakan perubahan nyata</p>
  </div>
  <div class="testi-grid">
    <?php
    $tq = new WP_Query(array('post_type' => 'noni_testi', 'posts_per_page' => 3, 'post_status' => 'publish'));
    $testis = array();
    if ($tq->have_posts()) :
      while ($tq->have_posts()) :
        $tq->the_post();
        $tid = get_the_ID();
        $testis[] = array(
          'name'     => get_the_title(),
          'text'     => strip_tags(get_the_content()),
          'loc'      => get_post_meta($tid, 'testi_location',  true),
          'cond'     => get_post_meta($tid, 'testi_condition', true),
          'init'     => get_post_meta($tid, 'testi_initials',  true),
          'clr'      => get_post_meta($tid, 'testi_color',     true) ?: '#2d5a40',
          'photo'    => get_post_meta($tid, 'testi_photo',     true),
          'rating'   => (int)(get_post_meta($tid, 'testi_rating',   true) ?: 5),
          'product'  => get_post_meta($tid, 'testi_product',   true),
          'duration' => get_post_meta($tid, 'testi_duration',  true),
        );
      endwhile;
      wp_reset_postdata();
    else :
      foreach (noni_default_testimoni() as $t) {
        $testis[] = array_merge(array('photo' => '', 'rating' => 5, 'product' => 'Tahitian Noni Original', 'duration' => '3 bulan'), $t);
      }
    endif;

    foreach ($testis as $i => $t) :
      $limit   = 140;
      $full    = $t['text'];
      $is_long = mb_strlen($full) > $limit;
      $short   = $is_long ? mb_substr($full, 0, $limit) . '...' : $full;
      $stars   = noni_stars($t['rating']);
    ?>
    <div class="testi-card fu" style="transition-delay:<?php echo $i * 0.08; ?>s">
      <div class="testi-top-meta">
        <div class="testi-stars"><?php echo $stars; ?></div>
        <div class="testi-tags">
          <?php if (!empty($t['product'])) : ?>
            <span class="testi-tag testi-tag-product">&#127807; <?php echo esc_html($t['product']); ?></span>
          <?php endif; ?>
          <?php if (!empty($t['duration'])) : ?>
            <span class="testi-tag testi-tag-duration">&#128336; <?php echo esc_html($t['duration']); ?></span>
          <?php endif; ?>
        </div>
      </div>
      <div class="testi-body">
        <p class="testi-text" data-full="<?php echo esc_attr($full); ?>" data-short="<?php echo esc_attr($short); ?>">
          &ldquo;<?php echo esc_html($short); ?>&rdquo;
        </p>
        <?php if ($is_long) : ?>
          <button type="button" class="testi-more-btn" onclick="testiToggle(this)" data-expanded="0">Baca selengkapnya &#8595;</button>
        <?php endif; ?>
      </div>
      <div class="testi-author">
        <?php if (!empty($t['photo'])) : ?>
          <div class="testi-av testi-av-photo">
            <img src="<?php echo esc_url($t['photo']); ?>" alt="<?php echo esc_attr($t['name']); ?>">
          </div>
        <?php else : ?>
          <div class="testi-av" style="background:<?php echo esc_attr($t['clr']); ?>"><?php echo esc_html($t['init']); ?></div>
        <?php endif; ?>
        <div class="testi-author-info">
          <div class="testi-n"><?php echo esc_html($t['name']); ?></div>
          <div class="testi-l"><?php echo esc_html($t['loc']); ?></div>
          <?php if (!empty($t['cond'])) : ?>
            <div class="testi-c"><?php echo esc_html($t['cond']); ?></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

<div style="text-align: center; margin-top: 30px;">
    <style>
        .btn-lihat-semua {
            display: inline-block; 
            padding: 12px 30px; 
            background: transparent; 
            border: 2px solid #2d5a40; 
            color: #2d5a40; 
            border-radius: 30px; 
            font-weight: 600; 
            font-size: 14px; 
            text-decoration: none; 
            transition: all 0.3s ease;
        }
        .btn-lihat-semua:hover {
            background: #2d5a40; 
            color: white !important; 
            transform: translateY(-3px); 
            box-shadow: 0 6px 20px rgba(45, 90, 64, 0.25);
        }
    </style>
    <a href="<?php echo home_url('/testimoni/'); ?>" class="btn-lihat-semua">
        Lihat Semua Testimoni Keluhan Lainnya →
    </a>
</div>
</div>
</section>

<!-- DOSAGE -->
<section class="dosage" id="dosis">
<div class="container">
  <div class="dosage-grid">
    <div class="fu">
      <div class="section-tag">Cara Penggunaan</div>
      <h2 class="section-h">Dosis &amp; Cara Pakai</h2>
      <p class="section-sub">Konsumsi secara konsisten untuk hasil yang optimal.</p>
      <div class="dosage-steps">
        <div class="dosage-step">
          <div class="step-num">1</div>
          <div>
            <div class="step-h">Dosis Awal (1-2 Minggu)</div>
            <p class="step-d">Mulai dengan 30ml dua kali sehari — pagi sebelum makan dan malam sebelum tidur.</p>
          </div>
        </div>
        <div class="dosage-step">
          <div class="step-num">2</div>
          <div>
            <div class="step-h">Dosis Pemeliharaan</div>
            <p class="step-d">Lanjutkan 30ml sekali sehari pagi hari, 30 menit sebelum makan.</p>
          </div>
        </div>
        <div class="dosage-step">
          <div class="step-num">3</div>
          <div>
            <div class="step-h">Konsistensi adalah Kunci</div>
            <p class="step-d">Hasil terbaik setelah konsumsi rutin minimal 3 bulan. Simpan di tempat sejuk.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="fu" style="transition-delay:.2s">
      <div class="dosage-box">
        <div class="dose-big">30ml</div>
        <div class="dose-label">Per Penyajian</div>
        <div class="dose-divider"></div>
        <div class="dose-tips">
          <div class="dose-tip"><span>&#127749;</span>Minum 30 menit sebelum makan pagi</div>
          <div class="dose-tip"><span>&#127754;</span>Bisa dicampur air dingin atau jus buah</div>
          <div class="dose-tip"><span>&#10052;</span>Simpan di lemari es setelah dibuka</div>
          <div class="dose-tip"><span>&#10003;</span>Aman untuk ibu hamil &amp; menyusui*</div>
          <div class="dose-tip"><span>&#128118;</span>Anak 12 tahun ke bawah: setengah dosis</div>
          <div class="dose-tip"><span>&#128138;</span>Dapat diminum bersama obat dokter</div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- AGENTS -->
<section class="agents" id="agen">
<div class="container">
  <div class="fu center">
    <div class="section-tag">Jaringan Distribusi</div>
    <h2 class="section-h">Agen Daerah Kami</h2>
    <p class="section-sub">Ready stock di seluruh Bali. Order langsung atau kami antar ke rumah Anda.</p>
  </div>
  <div class="agents-grid">
    <?php foreach (noni_default_agents() as $i => $a) : ?>
    <div class="agent-card fu" style="transition-delay:<?php echo $i * 0.07; ?>s">
      <div class="agent-icon"><?php echo $a['icon']; ?></div>
      <h3 class="agent-city"><?php echo esc_html($a['city']); ?></h3>
      <p class="agent-area"><?php echo esc_html($a['area']); ?></p>
      <a href="<?php echo noni_wa_url('Halo Noni Bali! Saya dari ' . $a['city'] . ', ingin pesan Tahitian Noni Juice', $a['key']); ?>"
         target="_blank" rel="noopener" class="agent-wa-btn">&#128172; Order Sekarang</a>
    </div>
    <?php endforeach; ?>
  </div>
</div>
</section>

<!-- CONTACT -->
<section class="contact" id="kontak">
<div class="container">
  <div class="contact-grid">

    <div class="fu">
      <div class="section-tag">Hubungi Kami</div>
      <h2 class="section-h">Siap Membantu Anda</h2>
      <p class="section-sub">Punya pertanyaan? Hubungi kami kapan saja.</p>
      <div class="contact-items">
        <div class="contact-item">
          <div class="contact-ico">&#128241;</div>
          <div>
            <div class="contact-it">WhatsApp Utama</div>
            <div class="contact-iv">0<?php echo esc_html(substr($wa1, 2)); ?></div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-ico">&#128222;</div>
          <div>
            <div class="contact-it">WhatsApp Alternatif</div>
            <div class="contact-iv">0<?php echo esc_html(substr($wa2, 2)); ?></div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-ico">&#128205;</div>
          <div>
            <div class="contact-it">Lokasi Kami</div>
            <div class="contact-iv"><?php echo esc_html($addr); ?></div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-ico">&#128336;</div>
          <div>
            <div class="contact-it">Jam Operasional</div>
            <div class="contact-iv"><?php echo esc_html($hours); ?></div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-ico">&#9993;</div>
          <div>
            <div class="contact-it">Email</div>
            <div class="contact-iv"><?php echo esc_html($email); ?></div>
          </div>
        </div>
      </div>
    </div>

    <div class="contact-form-box fu" style="transition-delay:.15s">
      <h3 class="form-title">Kirim Pesan / Konsultasi Order</h3>
      <div class="form-row">
        <div class="fg">
          <label for="fc-name">Nama Lengkap</label>
          <input type="text" id="fc-name" placeholder="I Wayan Budi">
        </div>
        <div class="fg">
          <label for="fc-phone">No. WhatsApp</label>
          <input type="tel" id="fc-phone" placeholder="08xxxxxxxxxx">
        </div>
      </div>
      <div class="fg">
        <label for="fc-city">Kota / Wilayah</label>
        <select id="fc-city">
          <option value="">Pilih wilayah...</option>
          <option>Denpasar</option>
          <option>Badung (Kuta, Seminyak, Nusa Dua)</option>
          <option>Gianyar (Ubud)</option>
          <option>Tabanan</option>
          <option>Bangli</option>
          <option>Singaraja (Buleleng)</option>
          <option>Klungkung</option>
          <option>Karangasem</option>
          <option>Jembrana</option>
          <option>Luar Bali</option>
        </select>
      </div>
      <div class="fg">
        <label for="fc-product">Produk yang Diminati</label>
        <select id="fc-product">
          <option value="">Pilih produk...</option>
          <?php foreach (noni_default_products() as $p) : ?>
          <option><?php echo esc_html($p['name']); ?></option>
          <?php endforeach; ?>
          <option>Belum tahu - butuh saran produk</option>
        </select>
      </div>
      <div class="fg">
        <label for="fc-msg">Pesan / Keluhan Kesehatan</label>
        <textarea id="fc-msg" placeholder="Ceritakan kondisi kesehatan Anda..."></textarea>
      </div>
      <button class="form-wa-btn" onclick="sendContactWA('<?php echo esc_js($wa1); ?>')">
        &#128172; Kirim via WhatsApp
      </button>
    </div>

  </div>
</div>
</section>

<!-- RIGHT SLIDE CART DRAWER -->
<style>
  #noni-cart-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.5);
    z-index: 1100;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
    font-family: 'Segoe UI', system-ui, sans-serif;
  }
  #noni-cart-overlay.active {
    opacity: 1;
    pointer-events: all;
  }
  #noni-cart-drawer {
    position: fixed;
    top: 0;
    right: 0;
    width: 440px;
    max-width: 100vw;
    height: 100vh;
    background: #ffffff;
    z-index: 1101;
    display: flex;
    flex-direction: column;
    box-shadow: -6px 0 40px rgba(0,0,0,0.15);
    transform: translateX(100%);
    transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    font-family: 'Segoe UI', system-ui, sans-serif;
    box-sizing: border-box;
  }
  #noni-cart-drawer * { box-sizing: border-box; }
  #noni-cart-drawer.active {
    transform: translateX(0);
  }
  .drawer-head { padding: 20px 24px; border-bottom: 1px solid rgba(0,0,0,0.07); display: flex; align-items: center; justify-content: space-between; }
  .drawer-title { font-size: 18px; font-weight: 800; color: #1a3d2b; font-family: Georgia, serif; margin: 0; }
  .drawer-close { background: #faf7f2; border: none; border-radius: 50%; width: 32px; height: 32px; cursor: pointer; font-size: 20px; display: flex; align-items: center; justify-content: center; font-weight: bold; }
  .drawer-body { flex: 1; overflow-y: auto; padding: 20px 24px; }
  .drawer-foot { padding: 20px 24px; border-top: 1px solid rgba(0,0,0,0.07); background: #faf7f2; }
  .v-cart-item { background: white; border-radius: 14px; padding: 12px; display: flex; align-items: center; gap: 12px; border: 1px solid #eef5f1; box-shadow: 0 2px 6px rgba(0,0,0,.03); margin-bottom: 10px; }
  .v-ci-img { width: 48px; height: 48px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 24px; background: #f0faf4; flex-shrink: 0; }
  .v-ci-info { flex: 1; }
  .v-ci-name { font-size: 13px; font-weight: 700; color: #1a3d2b; margin-bottom: 2px; }
  .v-ci-price { font-size: 11px; color: #5a8a70; }
  .v-ci-qty { display: flex; align-items: center; gap: 8px; }
  .v-q-btn { width: 26px; height: 26px; border: 1.5px solid #d0e8d8; background: white; border-radius: 50%; cursor: pointer; font-size: 14px; display: flex; align-items: center; justify-content: center; font-weight: 700; color: #1a3d2b; }
  .v-summary-box { background: #1a3d2b; border-radius: 14px; padding: 16px; margin-bottom: 16px; }
  .v-sum-row { display: flex; justify-content: space-between; color: rgba(255,255,255,.7); font-size: 12px; margin-bottom: 6px; }
  .v-sum-total { display: flex; justify-content: space-between; padding-top: 10px; border-top: 1px solid rgba(255,255,255,.15); margin-top: 4px; }
  .v-sum-label { color: white; font-size: 14px; font-weight: 700; }
  .v-sum-val { color: #f5a623; font-size: 18px; font-weight: 800; font-family: Georgia, serif; }
  .v-btn-green { background: #1a3d2b; color: white; border: none; padding: 14px 20px; border-radius: 50px; font-size: 14px; font-weight: 700; cursor: pointer; width: 100%; display: block; text-align: center; text-decoration: none; }
  .v-btn-wa { background: #25D366; color: white; border: none; padding: 14px 20px; border-radius: 50px; font-size: 14px; font-weight: 700; cursor: pointer; width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px; }
  .v-btn-outline { background: transparent; color: #1a3d2b; border: 1.5px solid #1a3d2b; padding: 12px 20px; border-radius: 50px; font-size: 13px; font-weight: 600; cursor: pointer; width: 100%; margin-top: 8px; }
  .v-fg { margin-bottom: 12px; }
  .v-label { display: block; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: .5px; color: #5a7a68; margin-bottom: 4px; }
  .v-input, .v-select, .v-textarea { width: 100%; padding: 10px 12px; border: 1.5px solid #d0e8d8; border-radius: 8px; font-size: 13px; background: #f7fdf9; outline: none; font-family: inherit; }
  .v-textarea { resize: vertical; min-height: 60px; }
  .v-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
  .v-note-box { background: #fffbeb; border: 1px solid #fcd34d; border-radius: 8px; padding: 10px; font-size: 11px; color: #92400e; line-height: 1.6; margin-top: 6px; }
  .v-liquid-box { background: #fff7ed; border: 1px solid #fb923c; border-radius: 8px; padding: 10px; font-size: 11px; color: #c2410c; line-height: 1.6; margin-top: 8px; }
</style>

<!-- HTML Bersih Tanpa Atribut Onclick yang Rawan Rusak -->
<div id="noni-cart-overlay"></div>

<div id="noni-cart-drawer">
  <div class="drawer-head">
    <h3 class="drawer-title" id="drawer-title-text">🛒 Keranjang Belanja</h3>
    <button class="drawer-close" id="noni-close-drawer-btn">&times;</button>
  </div>
  <div class="drawer-body" id="drawer-body-content"></div>
  <div class="drawer-foot" id="drawer-footer-content"></div>
</div>

<script>
(function() {
  const PROVINCES = ["Aceh","Bali","Banten","Bengkulu","DI Yogyakarta","DKI Jakarta","Gorontalo","Jambi","Jawa Barat","Jawa Tengah","Jawa Timur","Kalimantan Barat","Kalimantan Selatan","Kalimantan Tengah","Kalimantan Timur","Kalimantan Utara","Kepulauan Bangka Belitung","Kepulauan Riau","Lampung","Maluku","Maluku Utara","Nusa Tenggara Barat","Nusa Tenggara Timur","Papua","Papua Barat","Riau","Sulawesi Barat","Sulawesi Selatan","Sulawesi Tengah","Sulawesi Tenggara","Sulawesi Utara","Sumatera Barat","Sumatera Selatan","Sumatera Utara"];
  const COURIERS = ["SPX Express","JNE Regular","J&T Express","SiCepat REG","Pos Indonesia","GoSend (Same Day)","GrabExpress (Same Day)"];
  const PAYMENTS = ["Transfer Bank (Manual)","COD (Bayar di Tempat)","Bayar di Indomaret","Bayar di Alfamart","QRIS / GoPay / OVO"];

  let cart = [];
  let panelStep = 'cart'; 
  
  let formData = {
    name: "", phone: "", address: "", province: "Bali", 
    courier: "SPX Express", payment: "Transfer Bank (Manual)"
  };

  const fmt = n => "Rp " + n.toLocaleString("id-ID");

  // Fungsi Toggle Utama
  function toggleNoniDrawer(show) {
    const overlay = document.getElementById('noni-cart-overlay');
    const drawer = document.getElementById('noni-cart-drawer');
    if (!overlay || !drawer) return;

    if (show) {
      overlay.classList.add('active');
      drawer.classList.add('active');
      renderNoniCart();
    } else {
      overlay.classList.remove('active');
      drawer.classList.remove('active');
    }
  }

  window.changeNoniQty = function(index, delta) {
    cart[index].qty += delta;
    if (cart[index].qty <= 0) {
      cart.splice(index, 1);
    }
    renderNoniCart();
  };

  window.updateNoniField = function(field, value) {
    formData[field] = value;
  };

  window.setNoniStep = function(step) {
    panelStep = step;
    renderNoniCart();
  };

  function getSubtotal() {
    return cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
  }

  function renderNoniCart() {
    const titleEl = document.getElementById('drawer-title-text');
    const bodyEl = document.getElementById('drawer-body-content');
    const footEl = document.getElementById('drawer-footer-content');
    if (!bodyEl || !footEl) return;

    if (cart.length === 0) {
      titleEl.innerHTML = "🛒 Keranjang Belanja";
      bodyEl.innerHTML = `<div style="text-align:center; padding:40px 10px; color:#7a9a85;">
        <span style="font-size:48px;">🛒</span>
        <p style="margin-top:15px; font-size:14px; font-weight:600;">Keranjang Anda masih kosong</p>
        <p style="font-size:12px; color:#a0bfae;">Silakan pilih produk unggulan kami terlebih dahulu.</p>
      </div>`;
      footEl.innerHTML = `<button class="v-btn-green" id="btn-start-shopping">Mulai Belanja</button>`;
      
      document.getElementById('btn-start-shopping').addEventListener('click', () => toggleNoniDrawer(false));
      return;
    }

    if (panelStep === 'cart') {
      titleEl.innerHTML = "🛒 Keranjang Belanja";
      
      let html = '';
      cart.forEach((item, idx) => {
        html += `
        <div class="v-cart-item">
          <div class="v-ci-img">${item.emoji}</div>
          <div class="v-ci-info">
            <div class="v-ci-name">${item.name} (${item.vol})</div>
            <div class="v-ci-price">${fmt(item.price)}</div>
          </div>
          <div class="v-ci-qty">
            <button class="v-q-btn" onclick="window.changeNoniQty(${idx}, -1)">-</button>
            <span style="font-size:14px; font-weight:700; width:16px; text-align:center;">${item.qty}</span>
            <button class="v-q-btn" onclick="window.changeNoniQty(${idx}, 1)">+</button>
          </div>
        </div>`;
      });
      bodyEl.innerHTML = html;

      footEl.innerHTML = `
      <div class="v-summary-box">
        <div class="v-sum-row"><span>Total Item</span><span>${cart.reduce((s,i)=>s+i.qty,0)} Botol</span></div>
        <div class="v-sum-total"><span class="v-sum-label">Subtotal</span><span class="v-sum-val">${fmt(getSubtotal())}</span></div>
      </div>
      <button class="v-btn-green" onclick="window.setNoniStep('checkout')">Lanjut Pengiriman &rarr;</button>
      `;

    } else if (panelStep === 'checkout') {
      titleEl.innerHTML = "📦 Data Pengiriman";

      bodyEl.innerHTML = `
      <div class="v-fg">
        <label class="v-label">Nama Lengkap</label>
        <input type="text" class="v-input" value="${formData.name}" oninput="window.updateNoniField('name', this.value)" placeholder="Contoh: Ni Made Dian">
      </div>
      <div class="v-fg">
        <label class="v-label">Nomor WhatsApp</label>
        <input type="tel" class="v-input" value="${formData.phone}" oninput="window.updateNoniField('phone', this.value)" placeholder="Contoh: 08123456789">
      </div>
      <div class="v-fg">
        <label class="v-label">Provinsi Tujuan</label>
        <select class="v-select" onchange="window.updateNoniField('province', this.value)">
          ${PROVINCES.map(p => `<option value="${p}" ${formData.province === p ? 'selected':''}>${p}</option>`).join('')}
        </select>
      </div>
      <div class="v-fg">
        <label class="v-label">Alamat Lengkap (Jalan, No Rumah, Kel/Kec, Kota)</label>
        <textarea class="v-textarea" oninput="window.updateNoniField('address', this.value)" placeholder="Tulis alamat pengiriman lengkap...">${formData.address}</textarea>
      </div>
      <div class="v-form-row">
        <div class="v-fg">
          <label class="v-label">Kurir</label>
          <select class="v-select" onchange="window.updateNoniField('courier', this.value)">
            ${COURIERS.map(c => `<option value="${c}" ${formData.courier === c ? 'selected':''}>${c}</option>`).join('')}
          </select>
        </div>
        <div class="v-fg">
          <label class="v-label">Metode Bayar</label>
          <select class="v-select" onchange="window.updateNoniField('payment', this.value)">
            ${PAYMENTS.map(p => `<option value="${p}" ${formData.payment === p ? 'selected':''}>${p}</option>`).join('')}
          </select>
        </div>
      </div>
      <div class="v-liquid-box">🛡️ <strong>Sangat Aman:</strong> Pengiriman cairan botol kaca keluar kota dilapisi bubble wrap tebal dan box karton proteksi tinggi tanpa biaya tambahan.</div>
      `;

      footEl.innerHTML = `
      <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; padding:0 4px;">
        <span style="font-size:13px; font-weight:700; color:#1a3d2b;">Total Pembayaran:</span>
        <span style="font-size:16px; font-weight:800; color:#e07a5f;">${fmt(getSubtotal())}</span>
      </div>
      <button class="v-btn-wa" onclick="window.submitNoniToWA()">💬 Kirim Pesanan via WhatsApp</button>
      <button class="v-btn-outline" onclick="window.setNoniStep('cart')">&larr; Kembali ke Keranjang</button>
      `;
    }
  }

  window.submitNoniToWA = function() {
    if (!formData.name.trim() || !formData.phone.trim() || !formData.address.trim()) {
      alert("Silakan lengkapi Nama, No WhatsApp, dan Alamat Pengiriman Anda.");
      return;
    }

    let itemsText = '';
    cart.forEach((item, i) => {
      itemsText += `${i+1}. ${item.name} (${item.vol}) x ${item.qty} pcs -> ${fmt(item.price * item.qty)}\n`;
    });

    const targetWA = "<?php echo esc_js($wa1); ?>";
    const textMessage = `*PESANAN BARU - TAHITIAN NONI BALI*\n\n` +
      `*Daftar Belanja:*\n${itemsText}\n` +
      `*Total Belanja:* ${fmt(getSubtotal())}\n\n` +
      `*Data Penerima:*\n` +
      `• Nama: ${formData.name}\n` +
      `• WhatsApp: ${formData.phone}\n` +
      `• Provinsi: ${formData.province}\n` +
      `• Alamat Lengkap: ${formData.address}\n\n` +
      `*Metode Pengiriman & Pembayaran:*\n` +
      `• Opsi Kurir: ${formData.courier}\n` +
      `• Pembayaran: ${formData.payment}\n\n` +
      `Mohon dihitung ongkos kirimnya dan diproses sekarang, terima kasih.`;

    const url = `https://api.whatsapp.com/send?phone=${targetWA}&text=${encodeURIComponent(textMessage)}`;
    window.open(url, '_blank');
  };

  // Pasang Event Listener Terisolasi & Global (Sangat Aman Dari Gangguan Cache)
  document.addEventListener("DOMContentLoaded", function() {
    const closeBtn = document.getElementById('noni-close-drawer-btn');
    const overlay = document.getElementById('noni-cart-overlay');
    
    if(closeBtn) closeBtn.addEventListener('click', () => toggleNoniDrawer(false));
    if(overlay) overlay.addEventListener('click', () => toggleNoniDrawer(false));

    // Menangkap klik tombol tambah produk tanpa bergantung pada inline onclick
    document.addEventListener('click', function(e) {
      const btn = e.target.closest('.noni-add-to-cart-trigger');
      if (btn) {
        e.preventDefault();
        const name = btn.getAttribute('data-name');
        const price = parseInt(btn.getAttribute('data-price')) || 0;
        const emoji = btn.getAttribute('data-emoji') || '📦';
        const vol = btn.getAttribute('data-vol') || '';

        const existing = cart.find(item => item.name === name);
        if (existing) {
          existing.qty++;
        } else {
          cart.push({ name, price, emoji, vol, qty: 1 });
        }
        panelStep = 'cart';
        toggleNoniDrawer(true);
      }
    });
  });

  window.toggleNoniDrawer = toggleNoniDrawer;
})();
</script>

<?php get_footer(); ?>