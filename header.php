<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
  <meta name="google-adsense-account" content="ca-pub-5861212409699262">
  <meta charset="<?php bloginfo('charset');?>">
  <meta name="google-site-verification" content="deS89XY2IatI0i3pTu-_kx4S4EETm9962LPrH3QyW9k" />
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5861212409699262"
     crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="description" content="Tingkatkan vitalitas alami Anda dengan jus Tahitian Noni premium kami. 100% alami, murni, dan terpercaya. Rasakan manfaat superfood asli untuk kesehatan Anda.">
  <?php wp_head();?>
  <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Agen Resmi Tahitian Noni Juice Bali",
  "image": "https://www.nonijuicebali.com/images/logo.png",
  "@id": "https://www.nonijuicebali.com",
  "url": "https://www.nonijuicebali.com",
  "telephone": "+6281238162678", 
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Jl. Gn. Kidul , Pemecutan Klod, Kec. Denpasar Bar.",
    "addressLocality": "Denpasar",
    "addressRegion": "Bali",
    "postalCode": "80113",
    "addressCountry": "ID"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": -8.6628,
    "longitude": 115.2071
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "07:00",
    "closes": "22:00"
  },
  "sameAs": [
    "https://www.facebook.com/AgenTahitianNoniBali",
    "https://www.instagram.com/AgenTahitianNoniBali"
  ]
}
</script>
</head>
<body <?php body_class();?>>
<?php wp_body_open();?>
<header id="site-header">
  <nav>
    <a href="<?php echo esc_url(home_url('/'));?>" class="logo"><?php bloginfo('name');?></a>
<ul class="nav-links" id="nav-links">
  <?php if(has_nav_menu('primary')):
    wp_nav_menu([
      'theme_location'=>'primary',
      'items_wrap'    =>'%3$s',
      'container'     =>false,
      'depth'         =>1,
      'fallback_cb'   =>false,
    ]);
  else:
    /* Fallback: link ke halaman WordPress nyata (bukan hanya anchor) */
    $pages=[
      'Home'          => home_url('/'),
      'Produk'        => home_url('/produk-noni-juice-bali/'),
      'Testimoni'     => home_url('/testimoni/'),
      'Dosis & Pakai' => home_url('/dosis-cara-pakai/'),
      'Agen Daerah'   => home_url('/agen-daerah/'),
      'Kontak'        => home_url('/kontak'),
    ];
    foreach($pages as $label=>$url):?>
    <li><a href="<?php echo esc_url($url);?>"
       <?php if(is_front_page()&&strpos($url,'#')!==false):?>class="anchor-link"<?php endif;?>>
      <?php echo esc_html($label);?>
    </a></li>
    <?php endforeach;
  endif;?>
</ul>
    <div class="nav-right">
      <button type="button" class="hamburger" onclick="toggleMenu()" aria-label="Menu" aria-expanded="false">☰</button>
    </div>
  </nav>
</header>
