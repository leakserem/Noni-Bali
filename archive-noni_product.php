<?php
/**
 * Products Archive Template — Noni Juice Bali
 * URL: /produk/
 *
 * Cart overlay/panel/WA-float TIDAK diulangi di sini —
 * sudah tersedia dari footer.php via get_footer().
 */
get_header();
?>

<!-- Inner Hero -->
<div class="inner-hero">
  <div class="container">
    <nav class="breadcrumb">
      <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
      <span class="bc-sep">&#8594;</span>
      <span>Produk</span>
    </nav>
    <div class="hero-eyebrow" style="margin-bottom:16px">&#127807; Agen Resmi Bali</div>
    <h1 class="inner-hero-title">Pilihan Tahitian Noni Juice</h1>
    <p style="color:rgba(255,255,255,.7);font-size:15px;margin-top:12px">
      Ready stock &middot; Harga resmi &middot; Pengiriman ke seluruh Indonesia
    </p>
  </div>
</div>

<!-- Produk Grid -->
<section style="background:var(--cream-dk);padding:64px 24px">
  <div class="container">
    <div class="products-grid">
      <?php
      $pq = new WP_Query(array(
          'post_type'      => 'noni_product',
          'posts_per_page' => -1,
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
          $bpom  = get_post_meta($id, 'noni_bpom',  true); // 🟢 AMBIL DATA BPOM ARSIP
          $raw   = preg_replace('/[^0-9]/', '', $price);
      ?>
        <div class="prod-card fu">
          <a href="<?php the_permalink(); ?>" aria-label="Lihat <?php the_title_attribute(); ?>">
            <div class="prod-img" style="background:<?php echo esc_attr($bg); ?>">
              <?php if ($badge) : ?>
                <div class="prod-badge badge-<?php echo esc_attr($bc); ?>"><?php echo esc_html($badge); ?></div>
              <?php endif; ?>
              <?php if (has_post_thumbnail()) :
                // 🟢 FIX GAMBAR KATALOG: Mengubah 'cover' menjadi 'contain' + padding aman agar botol tidak terpotong
                the_post_thumbnail('noni-product', array('style' => 'width:100%;height:100%;object-fit:contain;padding:15px;box-sizing:border-box;'));
              else : ?>
                <span style="font-size:72px"><?php echo $emoji; ?></span>
              <?php endif; ?>
            </div>
          </a>
          <div class="prod-body">
            <h2 class="prod-name" style="font-size:17px">
              <a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none"><?php the_title(); ?></a>
            </h2>
            <p class="prod-desc"><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
            
            <?php if (!empty($bpom)) : ?>
              <!-- 🟢 MENAMPILKAN NOMOR BPOM DI HALAMAN KATALOG -->
              <div class="prod-bpom" style="font-size:12px; color:#4caf50; font-weight:600; margin-bottom:12px; display:flex; align-items:center; gap:4px;">
                🛡️ BPOM: <?php echo esc_html($bpom); ?>
              </div>
            <?php endif; ?>

            <div class="prod-footer">
              <div class="prod-price">
                <small>Harga / <?php echo esc_html($vol); ?></small>
                <span class="prod-price-val"><?php echo esc_html($price); ?></span>
              </div>
              <!-- Tombol Tambah — memanggil cart di footer.php -->
              <button class="btn-add"
                      data-name="<?php the_title_attribute(); ?>"
                      data-price="<?php echo esc_attr($raw); ?>"
                      data-emoji="<?php echo esc_attr($emoji); ?>"
                      data-vol="<?php echo esc_attr($vol); ?>"
                      onclick="addToCartFromBtn(this)"
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
              <div class="prod-badge badge-<?php echo esc_attr($p['bc']); ?>"><?php echo esc_html($p['badge']); ?></div>
            <?php endif; ?>
            <span style="font-size:72px"><?php echo $p['emoji']; ?></span>
          </div>
          <div class="prod-body">
            <h2 class="prod-name" style="font-size:17px"><?php echo esc_html($p['name']); ?></h2>
            <p class="prod-desc"><?php echo esc_html($p['desc']); ?></p>
            <div class="prod-footer">
              <div class="prod-price">
                <small>Harga / <?php echo esc_html($p['vol']); ?></small>
                <span class="prod-price-val"><?php echo esc_html($p['price']); ?></span>
              </div>
              <button class="btn-add"
                      data-name="<?php echo esc_attr($p['name']); ?>"
                      data-price="<?php echo esc_attr($raw); ?>"
                      data-emoji="<?php echo esc_attr($p['emoji']); ?>"
                      data-vol="<?php echo esc_attr($p['vol']); ?>"
                      onclick="addToCartFromBtn(this)">
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

<!-- CTA Konsultasi -->
<section style="background:var(--g-deep);padding:64px 24px;text-align:center">
  <div class="container">
    <div class="section-tag">Konsultasi Gratis</div>
    <h2 class="section-h" style="color:white;margin-bottom:14px">Tidak Yakin Produk Mana yang Cocok?</h2>
    <p style="color:rgba(255,255,255,.7);font-size:15px;margin-bottom:28px;max-width:480px;margin-left:auto;margin-right:auto">
      Ceritakan kondisi kesehatan Anda — kami bantu pilihkan produk paling sesuai.
    </p>
    <a href="<?php echo noni_wa_url('Halo! Saya butuh saran produk Tahitian Noni yang cocok untuk saya'); ?>"
       target="_blank" rel="noopener" class="btn-hero-wa">
      &#128172; Konsultasi via WhatsApp
    </a>
  </div>
</section>

<?php get_footer(); // cart panel & WA float sudah ada di footer.php ?>