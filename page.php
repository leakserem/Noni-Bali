<?php
/**
 * Default Page Template — Styled
 * Digunakan untuk halaman: Produk, Testimoni, Dosis, Agen, dll.
 */
get_header();
?>
<main>
  <!-- Inner Hero -->
  <div class="inner-hero">
    <div class="container">
      <nav class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/'));?>">Home</a>
        <span class="bc-sep">→</span>
        <span><?php the_title();?></span>
      </nav>
      <h1 class="inner-hero-title"><?php the_title();?></h1>
    </div>
  </div>

  <!-- Page Content -->
  <section class="inner-content">
    <div class="container">
      <?php while(have_posts()):the_post();?>
      <div class="page-content-wrap">
        <?php the_content();?>
      </div>
      <?php endwhile;?>
    </div>
  </section>

  <!-- CTA Section -->
  <section style="background:var(--g-deep);padding:64px 24px;text-align:center">
    <div class="container">
      <h2 style="font-family:'Playfair Display',serif;color:white;font-size:28px;margin-bottom:14px">Ada Pertanyaan?</h2>
      <p style="color:rgba(255,255,255,.7);font-size:15px;margin-bottom:28px">Hubungi kami kapan saja via WhatsApp — siap membantu Anda</p>
      <a href="<?php echo noni_wa_url('Halo Noni Bali! Saya ingin tanya tentang produk Tahitian Noni');?>"
         target="_blank" rel="noopener" class="btn-hero-wa">💬 Chat WhatsApp</a>
    </div>
  </section>
</main>
<?php get_footer();?>
