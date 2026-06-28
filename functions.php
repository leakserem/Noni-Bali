<?php
if(!defined('ABSPATH')){exit;}
function noni_setup(){
    load_theme_textdomain('noni-bali',get_template_directory().'/languages');
    add_theme_support('title-tag');add_theme_support('post-thumbnails');
    add_theme_support('html5',['search-form','comment-form','comment-list','gallery','caption']);
    add_image_size('noni-product',600,600,true);
    register_nav_menus(['primary'=>'Menu Utama','footer'=>'Menu Footer']);
}
add_action('after_setup_theme','noni_setup');

function noni_assets(){
    wp_enqueue_style('noni-fonts','https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600&display=swap',[],null);
    $theme_version = wp_get_theme()->get('Version');
    
    // 1. DAFTAR PATH FILE (Ditambahkan path untuk custom CSS)
    $style_path = get_stylesheet_directory().'/style.css';
    $custom_css_path = get_template_directory().'/assets/css/noni-theme.css';
    $script_path = get_template_directory().'/assets/js/noni-theme.js';
    
    // 2. VERSI FILE (Ditambahkan versi untuk custom CSS agar bebas cache)
    $style_version = file_exists($style_path) ? filemtime($style_path) : $theme_version;
    $custom_css_version = file_exists($custom_css_path) ? filemtime($custom_css_path) : $theme_version;
    $script_version = file_exists($script_path) ? filemtime($script_path) : $theme_version;
    
    // 3. MEMANGGIL STYLE UTAMA
    wp_enqueue_style('noni-theme',get_stylesheet_uri(),['noni-fonts'],$style_version);
    
    // 4. MEMANGGIL ASSETS/CSS/NONI-THEME.CSS (Baris Baru yang Wajib Ada)
    wp_enqueue_style('noni-custom-design', get_template_directory_uri().'/assets/css/noni-theme.css', ['noni-theme'], $custom_css_version);
    
    // 5. MEMANGGIL JAVASCRIPT
    wp_enqueue_script('noni-theme',get_template_directory_uri().'/assets/js/noni-theme.js',[],$script_version,true);
    wp_localize_script('noni-theme','noniVars',['wa1'=>get_theme_mod('noni_wa_primary','6281238162678'),'wa2'=>get_theme_mod('noni_wa_secondary','6281236300077'),'nonce'=>wp_create_nonce('noni_nonce'),'homeUrl'=>home_url('/')]);
}
add_action('wp_enqueue_scripts','noni_assets');
function noni_dynamic_css(){
    $g=sanitize_hex_color(get_theme_mod('noni_color_primary','#1a3d2b'));
    $a=sanitize_hex_color(get_theme_mod('noni_color_accent','#d4870a'));
    echo '<style>:root{--g-deep:'.$g.';--amber:'.$a.';}</style>';
}
add_action('wp_head','noni_dynamic_css');

function noni_widgets(){
    register_sidebar(['name'=>'Blog Sidebar','id'=>'sidebar-1','before_widget'=>'<section id="%1$s" class="widget %2$s">','after_widget'=>'</section>','before_title'=>'<h3 class="widget-title">','after_title'=>'</h3>']);
}
add_action('widgets_init','noni_widgets');

function noni_post_types(){
    register_post_type('noni_product',['labels'=>['name'=>'Produk Noni','singular_name'=>'Produk','add_new_item'=>'Tambah Produk'],'public'=>true,'has_archive'=>true,'menu_icon'=>'dashicons-cart','supports'=>['title','editor','thumbnail','excerpt','custom-fields'],'show_in_rest'=>true,'rewrite'=>['slug'=>'produk']]);
    register_post_type('noni_testi',['labels'=>['name'=>'Testimoni','singular_name'=>'Testimoni','add_new_item'=>'Tambah Testimoni'],'public'=>false,'show_ui'=>true,'menu_icon'=>'dashicons-format-quote','supports'=>['title','editor','custom-fields'],'show_in_rest'=>true]);
    register_post_type('noni_agent',['labels'=>['name'=>'Agen Daerah','singular_name'=>'Agen','add_new_item'=>'Tambah Agen'],'public'=>false,'show_ui'=>true,'menu_icon'=>'dashicons-location','supports'=>['title','editor','custom-fields'],'show_in_rest'=>true]);
}
add_action('init','noni_post_types');

function noni_customizer($wp_customize){
    $wp_customize->add_section('noni_hero',['title'=>'Hero Section','priority'=>20]);
    foreach(['noni_hero_badge'=>['Badge','Agen Resmi Tahitian Noni Bali'],'noni_hero_title'=>['Judul','Kesehatan Alami dari Tahitian Noni untuk Keluarga Anda'],'noni_hero_subtitle'=>['Subjudul','Suplai langsung agen resmi di Denpasar, Singaraja & seluruh Bali.'],'noni_stat_years'=>['Stat1 Angka','25+'],'noni_stat_y_label'=>['Stat1 Label','Tahun Morinda'],'noni_stat_cust'=>['Stat2 Angka','500+'],'noni_stat_c_label'=>['Stat2 Label','Pelanggan Bali'],'noni_stat_prod'=>['Stat3 Angka','6'],'noni_stat_p_label'=>['Stat3 Label','Produk Unggulan']] as $k=>$v){
        $wp_customize->add_setting($k,['default'=>$v[1],'sanitize_callback'=>'sanitize_text_field']);
        $wp_customize->add_control($k,['label'=>$v[0],'section'=>'noni_hero','type'=>'text']);
    }
    $wp_customize->add_section('noni_contact',['title'=>'Kontak & WhatsApp','priority'=>25]);
    foreach(['noni_wa_primary'=>['WA Utama','6281238162678'],'noni_wa_secondary'=>['WA Alternatif','6281236300077'],'noni_email'=>['Email','a2bedel@gmail.com'],'noni_address'=>['Alamat','Denpasar, Bali — Indonesia'],'noni_hours'=>['Jam Buka','Senin – Sabtu, 08.00 – 20.00 WITA']] as $k=>$v){
        $wp_customize->add_setting($k,['default'=>$v[1],'sanitize_callback'=>'sanitize_text_field']);
        $wp_customize->add_control($k,['label'=>$v[0],'section'=>'noni_contact','type'=>'text']);
    }
    $wp_customize->add_section('noni_colors',['title'=>'Brand Colors','priority'=>30]);
    foreach(['noni_color_primary'=>['Hijau Utama','#1a3d2b'],'noni_color_accent'=>['Aksen Amber','#d4870a']] as $k=>$v){
        $wp_customize->add_setting($k,['default'=>$v[1],'sanitize_callback'=>'sanitize_hex_color']);
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,$k,['label'=>$v[0],'section'=>'noni_colors']));
    }
    $wp_customize->add_section('noni_footer_sec',['title'=>'Footer','priority'=>35]);
    $wp_customize->add_setting('noni_footer_copy',['default'=>'© Noni Juice Bali — Agen Resmi Tahitian Noni Juice Bali.','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('noni_footer_copy',['label'=>'Copyright','section'=>'noni_footer_sec','type'=>'text']);
    $wp_customize->add_setting('noni_footer_desc',['default'=>'Agen Resmi Tahitian Noni Juice Bali. Produk kesehatan alami Morinda untuk keluarga Indonesia.','sanitize_callback'=>'wp_kses_post']);
    $wp_customize->add_control('noni_footer_desc',['label'=>'Deskripsi Footer','section'=>'noni_footer_sec','type'=>'textarea']);
}
add_action('customize_register','noni_customizer');

function noni_wa_url($msg='',$key='noni_wa_primary'){
    $wa=get_theme_mod($key,'6281238162678');
    $msg=$msg?:'Halo Noni Bali! Saya ingin order Tahitian Noni Juice';
    return esc_url('https://wa.me/'.$wa.'?text='.rawurlencode($msg));
}
function noni_default_products(){
    return[
        ['name'=>'Tahitian Noni Original','price'=>'Rp 488000','emoji'=>'🍶','vol'=>'1 Liter','bg'=>'linear-gradient(135deg,#d4edda,#a8d5b5)','badge'=>'⭐ Terlaris','bc'=>'best','desc'=>'Formula asli 275+ nutrisi untuk imunitas dan energi harian.'],
        ['name'=>'Tahitian Noni Extra','price'=>'Rp 550000','emoji'=>'🌿','vol'=>'750ml','bg'=>'linear-gradient(135deg,#fff3cd,#ffe08a)','badge'=>'🔥 Populer','bc'=>'hot','desc'=>'Diperkaya antioksidan. Ideal untuk diabetes dan imunitas intensif.'],
        ['name'=>'Maxidoid','price'=>'Rp 600000','emoji'=>'✨','vol'=>'750ml','bg'=>'linear-gradient(135deg,#ede7f6,#c5b3e8)','badge'=>'⚡ Premium','bc'=>'best','desc'=>'Anti-aging premium dengan Iridoid tinggi untuk perlambatan penuaan.'],
        
    ];
}
function noni_default_testimoni(){
    return[
        ['name'=>'I Wayan Sudarta','loc'=>'Denpasar, Bali','cond'=>'Vertigo','init'=>'IW','clr'=>'#2d5a40','text'=>'Sudah 3 bulan rutin minum Noni Original, vertigo saya jauh berkurang. Tidak pusing lagi waktu bangun tidur.'],
        ['name'=>'Ni Made Artini','loc'=>'Gianyar, Bali','cond'=>'Diabetes','init'=>'NM','clr'=>'#4a7c5e','text'=>'Gula darah saya stabil setelah minum Noni Extra 2 bulan. Dokter juga heran dengan perkembangannya!'],
        ['name'=>'Komang Sari','loc'=>'Singaraja, Bali','cond'=>'Demam Berdarah','init'=>'KS','clr'=>'#d4870a','text'=>'Anak saya kena DBD, trombosit naik lebih cepat dari perkiraan dokter setelah minum Noni Family.'],
    ];
}
function noni_default_agents(){
    return[
        ['city'=>'Denpasar','icon'=>'🏙️','area'=>'Seluruh Kota Denpasar & Badung. Kirim ke Kuta, Seminyak, Jimbaran, Nusa Dua, Ubud.','key'=>'noni_wa_primary'],
        ['city'=>'Singaraja','icon'=>'🌄','area'=>'Melayani Buleleng & sekitarnya. Kirim ke Lovina, Bedugul, seluruh Bali Utara.','key'=>'noni_wa_secondary'],
        ['city'=>'Bangli','icon'=>'🏔️','area'=>'Melayani Bangli, Kintamani, dan wilayah Bali Timur. Pengiriman setiap hari.','key'=>'noni_wa_primary'],
    ];
}
// Menambahkan Field BPOM di Dashboard
add_action('add_meta_boxes', function(){
    add_meta_box('noni_bpom_id', 'Nomor BPOM', function($post){
        $value = get_post_meta($post->ID, 'noni_bpom', true);
        wp_nonce_field('noni_save_bpom', 'noni_bpom_nonce');
        echo '<input type="text" name="noni_bpom" value="'.esc_attr($value).'" style="width:100%;" placeholder="Contoh: TR123456789">';
    }, 'noni_product', 'side', 'default');
});

add_action('save_post_noni_product', function($post_id){
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (!isset($_POST['noni_bpom_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['noni_bpom_nonce'])), 'noni_save_bpom')) return;
    if(isset($_POST['noni_bpom'])) update_post_meta($post_id, 'noni_bpom', sanitize_text_field(wp_unslash($_POST['noni_bpom'])));
});
