<?php get_header();?>
<main style="max-width:560px;margin:140px auto 100px;padding:0 24px;text-align:center">
  <div style="font-size:72px;margin-bottom:16px">🌿</div>
  <h1 class="section-h">Halaman Tidak Ditemukan</h1>
  <p style="color:var(--tm);font-size:16px;line-height:1.7;margin:20px 0 36px">Maaf, halaman yang Anda cari tidak ada atau telah dipindahkan.</p>
  <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
    <a href="<?php echo esc_url(home_url('/'));?>" class="btn-hero-outline">← Kembali ke Beranda</a>
    <a href="<?php echo noni_wa_url('Halo Noni Bali! Saya butuh bantuan');?>" target="_blank" class="btn-hero-wa">💬 Hubungi Kami</a>
  </div>
</main>
<?php get_footer();?>
