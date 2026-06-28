<?php get_header();?>
<main style="max-width:960px;margin:110px auto 80px;padding:0 24px">
  <div class="section-tag" style="margin-bottom:12px">Blog Kesehatan</div>
  <h1 class="section-h" style="margin-bottom:36px">Artikel Terbaru</h1>
  <?php if(have_posts()):?>
  <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:22px">
    <?php while(have_posts()):the_post();?>
    <article id="post-<?php the_ID();?>" <?php post_class('prod-card');?> style="overflow:hidden">
      <?php if(has_post_thumbnail()):?><div style="height:180px;overflow:hidden"><?php the_post_thumbnail('medium',['style'=>'width:100%;height:100%;object-fit:cover']);?></div><?php endif;?>
      <div class="prod-body"><h2 class="prod-name" style="font-size:16px"><a href="<?php the_permalink();?>" style="color:inherit;text-decoration:none"><?php the_title();?></a></h2>
        <p class="prod-desc"><?php echo wp_trim_words(get_the_excerpt(),16);?></p>
        <a href="<?php the_permalink();?>" class="btn-add" style="text-decoration:none">Baca →</a></div>
    </article>
    <?php endwhile;?>
  </div>
  <div style="margin-top:36px;text-align:center"><?php the_posts_navigation();?></div>
  <?php else:?><p style="color:var(--tm)">Belum ada artikel.</p><?php endif;?>
</main>
<?php get_footer();?>
