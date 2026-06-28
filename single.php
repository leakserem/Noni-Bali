<?php
/**
 * Single Blog Post Template
 */
get_header();
?>
<main>
  <?php while(have_posts()):the_post();?>
  <!-- Hero -->
  <div class="inner-hero">
    <div class="container">
      <nav class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/'));?>">Home</a>
        <span class="bc-sep">→</span>
        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')));?>">Blog</a>
        <span class="bc-sep">→</span>
        <span><?php the_title();?></span>
      </nav>
      <?php the_category(', ');?>
      <h1 class="inner-hero-title"><?php the_title();?></h1>
      <p style="color:rgba(255,255,255,.55);font-size:13px;margin-top:10px">Oleh <strong style="color:white"><?php the_author();?></strong> · <?php the_date();?></p>
    </div>
  </div>

  <section style="background:var(--cream);padding:64px 24px">
    <div class="container">
      <div class="post-wrap">
        <?php if(has_post_thumbnail()):?>
        <div style="border-radius:20px;overflow:hidden;margin-bottom:36px;max-height:460px">
          <?php the_post_thumbnail('large',['style'=>'width:100%;height:100%;object-fit:cover']);?>
        </div>
        <?php endif;?>
        <div class="page-content-wrap"><?php the_content();?></div>
        <?php the_tags('<div style="margin-top:32px;font-size:13px;color:var(--tl)">Tag: ','  ','</div>');?>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <div style="background:var(--g-deep);border-radius:22px;padding:36px;text-align:center;margin:0 24px 64px;max-width:800px;margin-left:auto;margin-right:auto">
    <h3 style="font-family:'Playfair Display',serif;color:white;font-size:22px;margin-bottom:12px">Tertarik dengan Tahitian Noni?</h3>
    <p style="color:rgba(255,255,255,.7);margin-bottom:24px">Konsultasikan kebutuhan kesehatan Anda langsung dengan agen kami</p>
    <a href="<?php echo noni_wa_url();?>" target="_blank" rel="noopener" class="btn-hero-wa">💬 Hubungi via WhatsApp</a>
  </div>
  <?php if(comments_open())comments_template();endwhile;?>
</main>
<?php get_footer();?>
