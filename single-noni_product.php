<?php
/**
 * Single Product Template
 */
get_header();

while (have_posts()) :
    the_post();

    $pid   = get_the_ID();
    $price = get_post_meta($pid, 'noni_price', true);
    $vol   = get_post_meta($pid, 'noni_vol', true);
    $emoji = get_post_meta($pid, 'noni_emoji', true) ?: '&#127807;';
    $badge = get_post_meta($pid, 'noni_badge', true);
    $bc    = get_post_meta($pid, 'noni_badge_class', true);
    $bg    = get_post_meta($pid, 'noni_bg', true) ?: 'linear-gradient(135deg,#d4edda,#a8d5b5)';
    $bpom  = get_post_meta($pid, 'noni_bpom', true); // 🟢 AMBIL DATA BPOM UTAMA
    $raw   = preg_replace('/[^0-9]/', '', $price);
?>
<main>
  <div class="inner-hero">
    <div class="container">
      <nav class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
        <span class="bc-sep">&rarr;</span>
        <a href="<?php echo esc_url(get_post_type_archive_link('noni_product')); ?>">Produk</a>
        <span class="bc-sep">&rarr;</span>
        <span><?php the_title(); ?></span>
      </nav>
      <h1 class="inner-hero-title"><?php the_title(); ?></h1>
    </div>
  </div>

  <section style="background:var(--cream);padding:72px 24px">
    <div class="container">
      <div class="product-detail-grid">
        <div>
          <div style="height:360px;border-radius:24px;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;background:<?php echo esc_attr($bg); ?>">
            <?php if ($badge) : ?>
              <div class="prod-badge badge-<?php echo esc_attr($bc); ?>" style="top:20px;left:20px"><?php echo esc_html($badge); ?></div>
            <?php endif; ?>

            <?php if (has_post_thumbnail()) :
                // 🟢 FIX GAMBAR UTAMA: Diubah ke 'contain' dan diberi padding agar botol tidak menyentuh/terpotong atap kotak
                the_post_thumbnail('large', ['style' => 'width:100%;height:100%;object-fit:contain;padding:25px;box-sizing:border-box;']);
            else : ?>
              <span style="font-size:120px"><?php echo $emoji; ?></span>
            <?php endif; ?>
          </div>

          <div style="background:var(--g-deep);border-radius:20px;padding:28px;margin-top:20px;text-align:center">
            <div style="font-size:12px;color:rgba(255,255,255,.5);margin-bottom:4px">Harga / <?php echo esc_html($vol); ?></div>
            <div style="font-family:'Playfair Display',serif;font-size:38px;color:var(--amber-l);font-weight:700;margin-bottom:20px"><?php echo esc_html($price); ?></div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:0;overflow:hidden;border-radius:50px;margin-bottom:14px">
              <button type="button"
                class="btn-add"
                data-name="<?php the_title_attribute(); ?>"
                data-price="<?php echo esc_attr($raw); ?>"
                data-emoji="<?php echo esc_attr($emoji); ?>"
                data-vol="<?php echo esc_attr($vol); ?>"
                data-bg="<?php echo esc_attr($bg); ?>"
                onclick="noniProductAddToCart(this)"
                style="border-radius:0;justify-content:center;padding:15px 10px;background:var(--amber);color:white">
                &#128722; Keranjang
              </button>
              <a href="<?php echo noni_wa_url('Halo! Saya ingin order ' . get_the_title() . ' ' . $price); ?>"
                 target="_blank" rel="noopener"
                 class="btn-hero-wa"
                 style="border-radius:0;justify-content:center;box-sizing:border-box;padding:15px 10px">
                &#128172; WhatsApp
              </a>
            </div>

            <div style="display:flex;justify-content:center;gap:16px;margin-top:14px;font-size:11px;color:rgba(255,255,255,.4);flex-wrap:wrap">
              <span>&#10003; Ready stock</span>
              <span>&#10003; Harga resmi</span>
              <span>&#10003; Agen resmi</span>
            </div>
          </div>
        </div>

        <div>
          <?php if (!empty($bpom)) : ?>
            <div class="single-prod-bpom" style="display:inline-flex; align-items:center; gap:6px; background:#e8f5e9; color:#2e7d32; padding:6px 16px; border-radius:30px; font-size:13px; font-weight:600; margin-bottom:20px;">
              🛡️ Produk Terdaftar Resmi BPOM RI: <strong><?php echo esc_html($bpom); ?></strong>
            </div>
          <?php endif; ?>

          <div class="page-content-wrap">
            <?php if (get_the_content()) : the_content(); else : ?>
              <p>Tahitian Noni adalah produk kesehatan alami berbahan dasar buah mengkudu (Morinda Citrifolia) dari French Polynesia. Mengcomendasi lebih dari 275 nutrisi dan fitonutrien yang telah terbukti secara ilmiah meningkatkan kesehatan tubuh secara menyeluruh.</p>
            <?php endif; ?>
          </div>

          <div style="margin-top:28px">
            <h3 style="font-family:'Playfair Display',serif;color:var(--g-deep);font-size:20px;margin-bottom:16px">Manfaat Utama</h3>
            <div style="display:flex;flex-direction:column;gap:10px">
              <?php foreach (['Meningkatkan sistem imunitas tubuh hingga 30%','Mengandung 275+ nutrisi dan fitonutrien alami','Diproduksi dari noni terbaik French Polynesia','Teruji dalam 60+ jurnal ilmiah peer-review','Aman untuk semua usia - anak hingga lansia','Dapat dikonsumsi bersama obat dokter'] as $b) : ?>
                <div style="display:flex;gap:10px;font-size:14px;color:var(--tm)">
                  <span style="color:var(--g-mid);font-weight:700;flex-shrink:0;margin-top:1px">&#10003;</span><?php echo esc_html($b); ?>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <div style="background:var(--g-pale);border-radius:16px;padding:20px 22px;margin-top:24px">
            <h4 style="font-family:'Playfair Display',serif;color:var(--g-deep);margin-bottom:10px;font-size:18px">Dosis & Cara Pakai</h4>
            <p style="font-size:13px;color:var(--tm);line-height:1.75">Minum <strong>30ml (1 oz)</strong> dua kali sehari &mdash; pagi sebelum makan dan malam sebelum tidur. Setelah 2 minggu, lanjutkan 30ml sekali sehari. Bisa dicampur air dingin. Simpan di lemari es setelah dibuka.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  $others = new WP_Query([
      'post_type'      => 'noni_product',
      'posts_per_page' => 3,
      'post_status'    => 'publish',
      'post__not_in'   => [get_the_ID()],
      'orderby'        => 'rand',
  ]);
  if ($others->have_posts()) : ?>
    <section style="background:var(--cream-dk);padding:64px 24px">
      <div class="container">
        <div class="fu center" style="margin-bottom:36px">
          <div class="section-tag">Produk Lainnya</div>
          <h2 class="section-h">Lihat Produk Kami Yang Lain</h2>
        </div>
        <div class="products-grid">
          <?php while ($others->have_posts()) :
              $others->the_post();
              $oid = get_the_ID();
              $op  = get_post_meta($oid, 'noni_price', true);
              $oe  = get_post_meta($oid, 'noni_emoji', true) ?: '&#127807;';
              $ob  = get_post_meta($oid, 'noni_bg', true) ?: 'linear-gradient(135deg,#d4edda,#a8d5b5)';
              $obpom = get_post_meta($oid, 'noni_bpom', true); // 🟢 AMBIL BPOM UNTUK PRODUK LAINNYA
          ?>
            <div class="prod-card">
              <a href="<?php the_permalink(); ?>" style="display:block;text-decoration:none;color:inherit">
                <div class="prod-img" style="background:<?php echo esc_attr($ob); ?>">
                  <?php if (has_post_thumbnail()) :
                      // 🟢 FIX GAMBAR REKOMENDASI: Diubah ke 'contain' agar seragam tidak terpotong
                      the_post_thumbnail('noni-product', ['style' => 'width:100%;height:100%;object-fit:contain;padding:12px;box-sizing:border-box;']);
                  else : ?>
                    <span style="font-size:72px"><?php echo $oe; ?></span>
                  <?php endif; ?>
                </div>
                <div class="prod-body">
                  <h3 class="prod-name"><?php the_title(); ?></h3>
                  
                  <?php if (!empty($obpom)) : ?>
                    <div style="font-size:11px; color:#4caf50; font-weight:600; margin-top:4px; margin-bottom:10px;">
                      🛡️ BPOM: <?php echo esc_html($obpom); ?>
                    </div>
                  <?php endif; ?>

                  <div class="prod-footer">
                    <span class="prod-price-val"><?php echo esc_html($op); ?></span>
                    <span class="btn-add">Lihat &rarr;</span>
                  </div>
                </div>
              </a>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
</main>

<script>
window.noniProductAddToCart = window.noniProductAddToCart || function(btn) {
  if (typeof window.addToCartFromBtn === 'function') {
    window.addToCartFromBtn(btn);
    return;
  }
  var oldText = btn.innerHTML;
  btn.innerHTML = '&#10003; Ditambahkan';
  btn.disabled = true;
  setTimeout(function() {
    btn.innerHTML = oldText;
    btn.disabled = false;
  }, 1200);
  if (typeof window.toggleNoniDrawer === 'function') {
    window.toggleNoniDrawer(true);
  }
};
</script>
<?php endwhile; get_footer(); ?>