<?php
$wa1=get_theme_mod('noni_wa_primary','6281238162678');
$wa2=get_theme_mod('noni_wa_secondary','6281236300077');
$email=get_theme_mod('noni_email','a2bedel@gmail.com');
$copy=get_theme_mod('noni_footer_copy','©Noni Juice Bali — Agen Resmi Tahitian Noni Juice Bali.');
$desc=get_theme_mod('noni_footer_desc','Agen Resmi Tahitian Noni Juice Bali. Produk kesehatan alami Morinda untuk keluarga Indonesia.');
?>
<footer>
  <div class="footer-inner">
    <div class="footer-top">
      <div>
        <div class="footer-logo">&#127807; <span><?php bloginfo('name'); ?></span></div>
        <p class="footer-desc"><?php echo esc_html($desc);?></p>
        <div class="footer-socials">
          <a href="https://www.facebook.com/AgenTahitianNoniBali" target="_blank" rel="noopener" class="social-link">f</a>
          <a href="https://wa.me/<?php echo esc_attr($wa1);?>" target="_blank" rel="noopener" class="social-link">💬</a>
          <a href="mailto:<?php echo esc_attr($email);?>" class="social-link">✉</a>
        </div>
      </div>
      <div>
        <div class="footer-col-h">Produk</div>
        <ul class="footer-links">
<?php foreach(noni_default_products() as $p):
            $product_slug = sanitize_title($p['name']);
            $product_url  = home_url('/produk/' . $product_slug . '/');
          ?>
          <li>
            <a href="<?php echo esc_url($product_url); ?>">
              <?php echo esc_html($p['name']); ?>
            </a>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
      <div>
        <div class="footer-col-h">Informasi</div>
        <ul class="footer-links">
          <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a></li>
          <li><a href="<?php echo esc_url(home_url('/dosis-cara-pakai/')); ?>">Dosis & Cara Pakai</a></li>
          <li><a href="<?php echo esc_url(home_url('/testimoni/')); ?>">Testimoni</a></li>
          <li><a href="<?php echo esc_url(home_url('/agen-daerah/')); ?>">Agen Daerah</a></li>
        </ul>
      </div>
      <div>
        <div class="footer-col-h">Kontak</div>
        <ul class="footer-links">
          <li><a href="tel:+<?php echo esc_attr($wa1);?>">📱 0<?php echo esc_html(substr($wa1,2));?></a></li>
          <li><a href="tel:+<?php echo esc_attr($wa2);?>">📞 0<?php echo esc_html(substr($wa2,2));?></a></li>
          <li><a href="https://wa.me/<?php echo esc_attr($wa1);?>" target="_blank" rel="noopener">💬 Chat WhatsApp</a></li>
          <li><a href="mailto:<?php echo esc_attr($email);?>">✉️ <?php echo esc_html($email);?></a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom"><span><?php echo esc_html($copy);?></span><span>Dibuat dengan ❤️ di Bali</span></div>
  </div>
</footer>

<div class="quick-actions" id="quick-actions">
  <a href="<?php echo noni_wa_url('Halo Noni Bali! Saya ingin tanya tentang Tahitian Noni');?>" target="_blank" rel="noopener" class="quick-action quick-action-wa">
    <span class="quick-action-icon">💬</span>
    <span>WhatsApp</span>
  </a>
  <button type="button" class="quick-action quick-action-cart" onclick="toggleNoniDrawer(true)">
    <span class="quick-action-icon">🛒</span>
    <span>Keranjang</span>
    <span class="cart-count-badge" id="cart-global-badge">0</span>
  </button>
</div>

<div style="background-color: #f3f4f6; color: #6b7280; font-size: 11px; text-align: center; padding: 20px 15px; line-height: 1.6; border-top: 1px solid #e5e7eb;">
    <p style="margin-bottom: 10px; max-width: 800px; margin-left: auto; margin-right: auto;">
        <strong>Sanggahan Medis (Disclaimer):</strong> Kisah kesembuhan dan testimoni yang tercantum di website ini adalah pengalaman nyata dari pelanggan kami. Namun, hasil yang diperoleh setiap individu dapat bervariasi tergantung pada kondisi fisik, tingkat keberatan penyakit, dan keteraturan konsumsi. 
        Tahitian Noni Juice bukan obat medis pengganti resep dokter. Jangan menghentikan pengobatan medis berjalan tanpa berkonsultasi terlebih dahulu dengan dokter Anda.</p>
</div>

<!-- ========================================================================= -->
<!-- STYLE TAMBAHAN UNTUK ANIMASI PREMIUM GELANGGANG (ANTI-KAKU)               -->
<!-- ========================================================================= -->
<style>
#noni-cart-overlay {
  position: fixed;
  top: 0; left: 0; width: 100%; height: 100%;
  background: rgba(0, 0, 0, 0.4);
  backdrop-filter: blur(2px);
  z-index: 999998;
  opacity: 0;
  display: none;
  transition: opacity 0.4s ease;
}
#noni-cart-overlay.active {
  opacity: 1;
  display: block;
}
#noni-cart-drawer {
  position: fixed;
  top: 0; right: 0;
  width: 100%; max-width: 440px; height: 100%;
  background: #fff;
  z-index: 999999;
  box-shadow: -8px 0 30px rgba(0,0,0,0.12);
  transform: translateX(100%);
  transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1);
  display: none;
  overflow: hidden; /* Mengunci konten luar agar transisi horizontal rapi */
}
#noni-cart-drawer.active {
  transform: translateX(0);
}
/* Wrapper utama yang menampung 3 halaman berdampingan */
.noni-slider-container {
  display: flex;
  width: 300%; /* 3 halaman = 300% */
  height: 100%;
  transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1);
  will-change: transform;
}
.noni-step-panel {
  width: 33.3333%; /* Tiap halaman mengambil tepat 1/3 porsi */
  height: 100%;
  display: flex;
  flex-direction: column;
  box-sizing: border-box;
  background: #fff;
}
.drawer-head {
  display: flex; justify-content: space-between; align-items: center;
  padding: 16px 20px; border-bottom: 1px solid #f1f5f9; flex-shrink: 0;
}
.drawer-body {
  flex: 1; overflow-y: auto; -webkit-overflow-scrolling: touch;
}
.drawer-foot {
  flex-shrink: 0; border-top: 1px solid #f1f5f9; background: #fff;
}
</style>

<div id="noni-cart-overlay" onclick="toggleNoniDrawer(false)"></div>

<!-- CONTAINER DRAWER UTAMA -->
<div id="noni-cart-drawer">
  <div class="noni-slider-container" id="noni-slider-engine">
    
    <!-- 🛒 STEP 1: KERANJANG BELANJA (Screenshot 2026-06-26 014550.png) -->
    <div id="noni-panel-cart" class="noni-step-panel">
      <div class="drawer-head">
        <h3 class="drawer-title" style="font-family: Georgia, serif; color: #1c352d; font-weight: 700; margin:0;">🛒 Keranjang Belanja</h3>
        <button class="drawer-close" onclick="toggleNoniDrawer(false)" style="background:none;border:none;font-size:24px;cursor:pointer;color:#94a3b8;">&times;</button>
      </div>
      <div class="drawer-body" id="noni-cart-items-area"></div>
      <div class="drawer-foot" id="noni-cart-summary-area" style="padding: 15px;"></div>
    </div>

    <!-- 👤 STEP 2: FORM ALAMAT CHECKOUT (Screenshot 2026-06-26 014601.png) -->
    <div id="noni-panel-form" class="noni-step-panel">
      <div class="drawer-head">
        <h3 class="drawer-title" style="font-family: Georgia, serif; color: #1c352d; font-weight: 700; margin:0;">👤 Form Alamat Checkout</h3>
        <button class="drawer-close" onclick="toggleNoniDrawer(false)" style="background:none;border:none;font-size:24px;cursor:pointer;color:#94a3b8;">&times;</button>
      </div>
      <div class="drawer-body" style="padding: 15px;">
        
        <div id="noni-form-summary-box" style="background: #f0fdf4; border: 1px dashed #bbf7d0; border-radius: 8px; padding: 12px; margin-bottom: 15px; color: #166534; font-size: 13px; font-weight: 600;">
           Ringkasan Ringkas: <span id="noni-form-summary-qty">0</span> item terpilih untuk dikirim.
        </div>
        
        <div style="display: flex; gap: 12px; margin-bottom: 12px;">
           <div style="flex: 1;">
              <label style="display: block; font-size: 11px; font-weight: bold; color: #1c352d; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.5px;">Nama Lengkap *</label>
              <input type="text" id="noni-input-name" placeholder="I Wayan Budi" oninput="window.saveFormFields()" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; background: #fdfdfd; border-radius: 8px; font-size: 13px; box-sizing: border-box; font-family: inherit; outline: none;">
           </div>
           <div style="flex: 1;">
              <label style="display: block; font-size: 11px; font-weight: bold; color: #1c352d; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.5px;">Nomor HP / WA *</label>
              <input type="text" id="noni-input-phone" placeholder="08xxxxxxxxxx" oninput="window.saveFormFields()" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; background: #fdfdfd; border-radius: 8px; font-size: 13px; box-sizing: border-box; font-family: inherit; outline: none;">
           </div>
        </div>

        <div style="margin-bottom: 12px;">
           <label style="display: block; font-size: 11px; font-weight: bold; color: #1c352d; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.5px;">Detail Alamat Rumah *</label>
           <textarea id="noni-input-address" placeholder="Nama jalan, nomor rumah, RT/RW, desa/kecamatan" oninput="window.saveFormFields()" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; background: #fdfdfd; border-radius: 8px; font-size: 13px; height: 75px; resize: none; box-sizing: border-box; line-height: 1.4; font-family: inherit; outline: none;"></textarea>
        </div>

        <div style="margin-bottom: 12px;">
           <label style="display: block; font-size: 11px; font-weight: bold; color: #1c352d; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.5px;">Provinsi Tujuan *</label>
           <select id="noni-input-province" onchange="window.saveFormFields()" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; background: #fdfdfd; border-radius: 8px; font-size: 13px; box-sizing: border-box; font-family: inherit; outline: none;">
              <option value="">Pilih Provinsi --</option>
              <option value="Bali">Bali</option>
              <option value="DKI Jakarta">DKI Jakarta</option>
              <option value="Jawa Barat">Jawa Barat</option>
              <option value="Jawa Tengah">Jawa Tengah</option>
              <option value="Jawa Timur">Jawa Timur</option>
              <option value="DI Yogyakarta">DI Yogyakarta</option>
              <option value="Banten">Banten</option>
              <option value="Lainnya">Provinsi Lainnya</option>
           </select>
        </div>

        <div style="margin-bottom: 12px;">
           <label style="display: block; font-size: 11px; font-weight: bold; color: #1c352d; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.5px;">Kurir Pengiriman *</label>
           <select id="noni-input-courier" onchange="window.saveFormFields()" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; background: #fdfdfd; border-radius: 8px; font-size: 13px; box-sizing: border-box; font-family: inherit; outline: none;">
              <option value="SPX Express">SPX Express</option>
              <option value="J&T Express">J&T Express</option>
              <option value="JNE Shipping">JNE Shipping</option>
              <option value="SiCepat">SiCepat</option>
              <option value="GoSend (Same Day)">GoSend (Same Day)</option>
           </select>
        </div>

        <div style="margin-bottom: 15px;">
           <label style="display: block; font-size: 11px; font-weight: bold; color: #1c352d; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.5px;">Metode Pembayaran *</label>
           <select id="noni-input-payment" onchange="window.saveFormFields()" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; background: #fdfdfd; border-radius: 8px; font-size: 13px; box-sizing: border-box; font-family: inherit; outline: none;">
              <option value="Transfer Bank (Manual)">Transfer Bank (Manual)</option>
              <option value="COD (Bayar di Tempat)">COD (Bayar di Tempat)</option>
           </select>
        </div>
      </div>
      
      <div class="drawer-foot" style="padding: 15px;">
         <div id="noni-form-error-msg" style="text-align:center;padding:14px;background:#fef2f2;color:#dc2626;border:1px dashed #fca5a5;border-radius:50px;font-size:13px;font-weight:700;margin-bottom:8px;box-sizing:border-box;">
            ⚠️ Mohon lengkapi semua data wajib (*) di atas
         </div>
         <button type="button" id="noni-final-wa-btn" onclick="window.submitNoniOrder()" style="display:none;width:100%;text-align:center;background:#22c55e;color:#fff;border:none;font-weight:700;padding:14px;border-radius:50px;box-sizing:border-box;font-size:15px;box-shadow:0 4px 12px rgba(34,197,94,0.3);margin-bottom:8px;cursor:pointer;font-family:inherit;outline:none;">
            💬 Kirim Pesanan via WhatsApp
         </button>
         <button onclick="window.switchNoniStep('cart')" style="width:100%;text-align:center;background:#f5f5f4;color:#1c352d;border:1px solid #1c352d;font-weight:700;padding:12px;border-radius:50px;box-sizing:border-box;font-size:14px;cursor:pointer;outline:none;">
            ← Kembali ke Keranjang
         </button>
      </div>
    </div>

    <!-- ✅ STEP 3: PESANAN DIPROSES (Screenshot 2026-06-26 015323.png) -->
    <div id="noni-panel-success" class="noni-step-panel">
      <div class="drawer-head">
        <h3 class="drawer-title" style="font-family: Georgia, serif; color: #1c352d; font-weight: 700; margin:0; display: flex; align-items: center; gap: 8px;">✅ Pesanan Diproses</h3>
        <button class="drawer-close" onclick="toggleNoniDrawer(false)" style="background:none;border:none;font-size:24px;cursor:pointer;color:#94a3b8;">&times;</button>
      </div>
      <div class="drawer-body" style="padding: 40px 20px; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <div style="width: 72px; height: 72px; background: #72b055; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 42px; font-weight: bold; margin-bottom: 24px; box-shadow: 0 4px 10px rgba(114,176,85,0.2);">✓</div>
        <h2 style="font-family: Georgia, serif; color: #1c352d; font-size: 22px; margin: 0 0 14px 0; font-weight: 700;">Terima Kasih!</h2>
        <p style="color: #4b5563; font-size: 13px; line-height: 1.6; margin: 0; max-width: 290px; text-align: center;">
          Pesanan Anda sedang dialihkan ke WhatsApp. Silakan tekan tombol <strong>Kirim / Send</strong> di aplikasi WhatsApp Anda.
        </p>
      </div>
      <div class="drawer-foot" style="padding: 15px;">
         <button onclick="toggleNoniDrawer(false)" style="width:100%; text-align:center; background:#fdfdfd; color:#1c352d; border:1px solid #1c352d; font-weight:600; padding:14px; border-radius:50px; box-sizing:border-box; font-size:14px; cursor:pointer; font-family:inherit; outline:none;">
            Tutup Panel
         </button>
      </div>
    </div>

  </div>
</div>

<?php wp_footer(); ?>
<script>
(function() {
    var STORAGE_KEY = 'noni_bali_secure_cart';
    var CUST_KEY = 'noni_bali_cust_info_v4';
    var CURRENT_WA_URL = '';

    function loadSavedCartData() {
        try {
            var data = localStorage.getItem(STORAGE_KEY);
            return data ? JSON.parse(data) : [];
        } catch(e) { return []; }
    }

    function loadSavedCustData() {
        try {
            var data = localStorage.getItem(CUST_KEY);
            return data ? JSON.parse(data) : {name: '', phone: '', address: '', province: '', courier: 'SPX Express', payment: 'Transfer Bank (Manual)'};
        } catch(e) { return {name: '', phone: '', address: '', province: '', courier: 'SPX Express', payment: 'Transfer Bank (Manual)'}; }
    }

    window.noniCart = loadSavedCartData();

    // Mengendalikan Animasi Slide Masuk/Keluar Laci Drawer Utama
    window.toggleNoniDrawer = function(open) {
        var drawer = document.getElementById('noni-cart-drawer');
        var overlay = document.getElementById('noni-cart-overlay');
        if (!drawer || !overlay) return;
        
        if (open) {
            window.switchNoniStep('cart', true); // reset instan tanpa animasi geser berlebih di awal
            drawer.style.display = 'block';
            overlay.style.display = 'block';
            setTimeout(function() {
                drawer.classList.add('active');
                overlay.classList.add('active');
            }, 20);
        } else {
            drawer.classList.remove('active');
            overlay.classList.remove('active');
            setTimeout(function() {
                drawer.style.display = 'none';
                overlay.style.display = 'none';
            }, 450); // Menunggu transisi CSS (.45s) selesai baru sembunyikan elemen
        }
    };

    // 🏎️ ENGINE SINKRONISASI ANIMASI GESER (Carousel-Style)
    window.switchNoniStep = function(step, instant) {
        var engine = document.getElementById('noni-slider-engine');
        if(!engine) return;

        // Hilangkan transisi sesaat jika dipanggil instan saat buka laci
        if (instant) {
            engine.style.transition = 'none';
        } else {
            engine.style.transition = 'transform 0.45s cubic-bezier(0.16, 1, 0.3, 1)';
        }

        if (step === 'form') {
            engine.style.transform = 'translateX(-33.3333%)';
            window.saveFormFields();
        } else if (step === 'success') {
            engine.style.transform = 'translateX(-66.6666%)';
        } else {
            engine.style.transform = 'translateX(0%)';
        }
    };

    function saveCartDataPermanently() {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(window.noniCart));
        } catch(e) {}
        renderNoniCart();
    }

    window.saveFormFields = function() {
        var nameEl = document.getElementById('noni-input-name');
        var phoneEl = document.getElementById('noni-input-phone');
        var addressEl = document.getElementById('noni-input-address');
        var provinceEl = document.getElementById('noni-input-province');
        var courierEl = document.getElementById('noni-input-courier');
        var paymentEl = document.getElementById('noni-input-payment');

        if (!nameEl || !phoneEl || !addressEl || !provinceEl || !courierEl || !paymentEl) return;

        var data = {
            name: nameEl.value,
            phone: phoneEl.value,
            address: addressEl.value,
            province: provinceEl.value,
            courier: courierEl.value,
            payment: paymentEl.value
        };
        try {
            localStorage.setItem(CUST_KEY, JSON.stringify(data));
        } catch(e) {}
        
        window.validateNoniForm();
    };

    function setupSavedCustomerFormValues() {
        var cust = loadSavedCustData();
        if(document.getElementById('noni-input-name')) document.getElementById('noni-input-name').value = cust.name || '';
        if(document.getElementById('noni-input-phone')) document.getElementById('noni-input-phone').value = cust.phone || '';
        if(document.getElementById('noni-input-address')) document.getElementById('noni-input-address').value = cust.address || '';
        if(document.getElementById('noni-input-province')) document.getElementById('noni-input-province').value = cust.province || '';
        if(document.getElementById('noni-input-courier')) document.getElementById('noni-input-courier').value = cust.courier || 'SPX Express';
        if(document.getElementById('noni-input-payment')) document.getElementById('noni-input-payment').value = cust.payment || 'Transfer Bank (Manual)';
    }

    window.validateNoniForm = function() {
        var nameEl = document.getElementById('noni-input-name');
        var phoneEl = document.getElementById('noni-input-phone');
        var addressEl = document.getElementById('noni-input-address');
        var provinceEl = document.getElementById('noni-input-province');
        var courierEl = document.getElementById('noni-input-courier');
        var paymentEl = document.getElementById('noni-input-payment');

        // Guard clause: Hentikan eksekusi jika elemen form belum siap di DOM
        if (!nameEl || !phoneEl || !addressEl || !provinceEl || !courierEl || !paymentEl) return;

        var name = nameEl.value.trim();
        var phone = phoneEl.value.trim();
        var address = addressEl.value.trim();
        var province = provinceEl.value;
        var courier = courierEl.value;
        var payment = paymentEl.value;

        var errorMsg = document.getElementById('noni-form-error-msg');
        var waBtn = document.getElementById('noni-final-wa-btn');

        var isFormValid = name.length > 0 && phone.length > 0 && address.length > 0 && province !== "";

        if (waBtn && errorMsg) {
            if (isFormValid) {
                waBtn.style.display = 'block'; 
                errorMsg.style.display = 'none';
            } else {
                waBtn.style.display = 'none';  
                errorMsg.style.display = 'block';
            }
        }

        if (!isFormValid) return;

        var waPrimaryNumber = '<?php echo esc_attr($wa1); ?>';
        var textWa = 'Halo Noni Juice Bali, saya ingin pesan produk berikut:\n\n';
        var totalPrice = 0;
        
        window.noniCart.forEach(function(item) {
            textWa += '• ' + item.name + ' (' + item.vol + ') x' + item.quantity + ' = Rp ' + (item.price * item.quantity).toLocaleString('id-ID') + '\n';
            totalPrice += (item.price * item.quantity);
        });
        
        textWa += '\n*Total Tagihan: Rp ' + totalPrice.toLocaleString('id-ID') + '*\n\n';
        
        textWa += '*PENGIRIMAN:*\n';
        textWa += '- Nama: ' + name + '\n';
        textWa += '- No WA: ' + phone + '\n';
        textWa += '- Alamat: ' + address + '\n';
        textWa += '- Provinsi: ' + province + '\n';
        textWa += '- Kurir: ' + courier + '\n';
        textWa += '- Pembayaran: ' + payment + '\n\n';
        textWa += 'Mohon diinformasikan total keseluruhan beserta ongkos kirimnya. Terima kasih!';
        
        CURRENT_WA_URL = 'https://wa.me/' + waPrimaryNumber + '?text=' + encodeURIComponent(textWa);
    };

    window.submitNoniOrder = function() {
        if(!CURRENT_WA_URL) return;
        
        window.open(CURRENT_WA_URL, '_blank');
        
        window.noniCart = [];
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(window.noniCart));
        } catch(e) {}
        
        var globalBadge = document.getElementById('cart-global-badge');
        if (globalBadge) globalBadge.innerText = '0';
        
        window.switchNoniStep('success');
    };

    window.addToCartFromBtn = function(btn) {
        var name  = btn.getAttribute('data-name');
        var price = parseInt(btn.getAttribute('data-price')) || 0;
        var emoji = btn.getAttribute('data-emoji') || '🌿';
        var vol   = btn.getAttribute('data-vol') || '1 Liter';
        var bg    = btn.getAttribute('data-bg') || 'linear-gradient(135deg,#d4edda,#a8d5b5)';

        if (!name) return;

        var existingItem = window.noniCart.find(function(item) { return item.name === name; });

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            window.noniCart.push({ name: name, price: price, emoji: emoji, vol: vol, bg: bg, quantity: 1 });
        }

        saveCartDataPermanently();
        window.toggleNoniDrawer(true);
    };

    window.updateNoniQty = function(index, change) {
        if (!window.noniCart[index]) return;
        window.noniCart[index].quantity += change;
        if (window.noniCart[index].quantity <= 0) { window.noniCart.splice(index, 1); }
        saveCartDataPermanently();
    };

    window.deleteNoniItem = function(index) {
        if (window.noniCart[index]) {
            window.noniCart.splice(index, 1);
        }
        saveCartDataPermanently();
    };

    function renderNoniCart() {
        var itemsContainer = document.getElementById('noni-cart-items-area');
        var summaryContainer = document.getElementById('noni-cart-summary-area');
        var globalBadge = document.getElementById('cart-global-badge');
        var summaryQtyText = document.getElementById('noni-form-summary-qty');

        if (!itemsContainer || !summaryContainer) return;

        if (window.noniCart.length === 0) {
            itemsContainer.innerHTML = '<div style="text-align:center;padding:50px 20px;color:#aaa;"><span style="font-size:48px">🛒</span><p style="margin-top:10px;font-size:14px;">Keranjang belanja Anda kosong.</p></div>';
            summaryContainer.innerHTML = '';
            if (globalBadge) globalBadge.innerText = '0';
            if (summaryQtyText) summaryQtyText.innerText = '0';
            return;
        }

        var itemsHtml = '';
        var totalItems = 0;
        var totalPrice = 0;
        var summaryItemsListHtml = '';

        window.noniCart.forEach(function(item, index) {
            totalItems += item.quantity;
            totalPrice += (item.price * item.quantity);

            itemsHtml += '<div style="display:flex;align-items:center;gap:12px;padding:12px;margin: 10px 15px; border: 1px solid #f1f5f9; border-radius:12px; position:relative; background:#fff; box-shadow:0 2px 6px rgba(0,0,0,0.02);">';
            itemsHtml += '  <div style="width:46px;height:46px;border-radius:10px;background:' + item.bg + ';display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">' + item.emoji + '</div>';
            itemsHtml += '  <div style="flex:1;min-width:0;padding-right:25px;">';
            itemsHtml += '    <h4 style="margin:0;font-size:14px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color:#1c352d;font-weight:600;">' + item.name + '</h4>';
            itemsHtml += '    <div style="font-size:11px;color:#777;margin-top:2px;">Rp ' + item.price.toLocaleString('id-ID') + '</div>';
            itemsHtml += '  </div>';
            itemsHtml += '  <button onclick="deleteNoniItem(' + index + ')" style="position:absolute;right:10px;top:10px;background:none;border:none;color:#ef4444;font-size:16px;cursor:pointer;">&times;</button>';
            itemsHtml += '  <div style="display:flex;align-items:center;gap:8px;flex-shrink:0; background:#f8fafc; border-radius:30px; padding:2px 6px; border:1px solid #e2e8f0;">';
            itemsHtml += '    <button onclick="updateNoniQty(' + index + ', -1)" style="width:22px;height:22px;border-radius:50%;border:none;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,0.1);cursor:pointer;font-weight:bold;color:#666;">-</button>';
            itemsHtml += '    <span style="font-size:13px;font-weight:600;min-width:16px;text-align:center;color:#333;">' + item.quantity + '</span>';
            itemsHtml += '    <button onclick="updateNoniQty(' + index + ', 1)" style="width:22px;height:22px;border-radius:50%;border:none;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,0.1);cursor:pointer;font-weight:bold;color:#666;">+</button>';
            itemsHtml += '  </div>';
            itemsHtml += '</div>';

            summaryItemsListHtml += '<div style="display:flex;justify-content:space-between;font-size:12px;opacity:0.85;margin-bottom:6px;">';
            summaryItemsListHtml += '  <span>' + item.name + ' (x' + item.quantity + ')</span>';
            summaryItemsListHtml += '  <span>Rp ' + (item.price * item.quantity).toLocaleString('id-ID') + '</span>';
            summaryItemsListHtml += '</div>';
        });

        itemsContainer.innerHTML = itemsHtml;
        if (globalBadge) globalBadge.innerText = String(totalItems);
        if (summaryQtyText) summaryQtyText.innerText = String(totalItems);

        var summaryHtml = '';
        summaryHtml += '<div style="background: #1c352d; border-radius: 14px; padding: 15px; color: #fff; margin-bottom: 12px; box-shadow:0 4px 10px rgba(28,53,45,0.15);">';
        summaryHtml += summaryItemsListHtml; 
        summaryHtml += '  <div style="border-top: 1px solid rgba(255,255,255,0.15); margin-top: 10px; padding-top: 10px; display: flex; justify-content: space-between; align-items: center;">';
        summaryHtml += '     <span style="font-weight: 600; font-size: 14px;">Total Biaya</span>';
        summaryHtml += '     <span style="font-size: 19px; font-weight: bold; color: #fbbf24; font-family: Georgia, serif;">Rp ' + totalPrice.toLocaleString('id-ID') + '</span>';
        summaryHtml += '  </div>';
        summaryHtml += '</div>';
        summaryHtml += '<button onclick="window.switchNoniStep(\'form\')" style="width: 100%; background: #1c352d; color: #fff; border: none; padding: 14px; border-radius: 50px; font-weight: 700; font-size: 14px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 4px; box-shadow:0 4px 12px rgba(28,53,45,0.2);">';
        summaryHtml += '  Lanjut Isi Alamat →';
        summaryHtml += '</button>';

        summaryContainer.innerHTML = summaryHtml;
        window.validateNoniForm();
    }

    document.addEventListener('DOMContentLoaded', function() {
        setupSavedCustomerFormValues();
        renderNoniCart();
    });
    window.addEventListener('load', function() {
        setupSavedCustomerFormValues();
        renderNoniCart();
    });

    setInterval(function() {
        var globalBadge = document.getElementById('cart-global-badge');
        var checkItems = document.getElementById('noni-cart-items-area');
        var engine = document.getElementById('noni-slider-engine');
        if (globalBadge && checkItems && engine) {
            if (engine.style.transform !== 'translateX(-66.6666%)' && window.noniCart.length > 0 && (globalBadge.innerText === '0' || checkItems.children.length === 0)) {
                renderNoniCart();
            }
        }
    }, 600);
})();
</script>
<!-- ========================================== -->
<!-- GLOBAL RIGHT SLIDE CART DRAWER (STABLE)    -->
<!-- ========================================== -->
<style>
  #noni-cart-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.5);
    z-index: 99998;
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
    z-index: 99999;
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
  .v-liquid-box { background: #fff7ed; border: 1px solid #fb923c; border-radius: 8px; padding: 10px; font-size: 11px; color: #c2410c; line-height: 1.6; margin-top: 8px; }
</style>

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

  // Menggunakan LocalStorage agar isi keranjang tetap awet walau ganti halaman
  let cart = JSON.parse(localStorage.getItem('noni_global_cart')) || [];
  let panelStep = 'cart'; 
  
  let formData = {
    name: "", phone: "", address: "", province: "Bali", 
    courier: "SPX Express", payment: "Transfer Bank (Manual)"
  };

  const fmt = n => "Rp " + n.toLocaleString("id-ID");

  function saveCartToStorage() {
    localStorage.setItem('noni_global_cart', JSON.stringify(cart));
  }

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
    saveCartToStorage();
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
      
      const btnShop = document.getElementById('btn-start-shopping');
      if(btnShop) btnShop.addEventListener('click', () => toggleNoniDrawer(false));
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
      <button class="v-btn-green" onclick="window.setNoniStep('checkout')">Lanjut Isi Alamat &rarr;</button>
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
      <div class="v-liquid-box">🛡️ <strong>Sangat Aman:</strong> Pengiriman cairan botol kaca dilapisi bubble wrap tebal dan box karton tanpa biaya tambahan.</div>
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

    const targetWA = "6281238162678"; // Nomor default utama Anda
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

  document.addEventListener("DOMContentLoaded", function() {
    const closeBtn = document.getElementById('noni-close-drawer-btn');
    const overlay = document.getElementById('noni-cart-overlay');
    
    if(closeBtn) closeBtn.addEventListener('click', () => toggleNoniDrawer(false));
    if(overlay) overlay.addEventListener('click', () => toggleNoniDrawer(false));

    // Event Global capture klik tombol '+ Tambah' dari halaman mana saja
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
        saveCartToStorage();
        toggleNoniDrawer(true);
      }
    });

    // Menghubungkan tombol shortcut "Keranjang" melayang di bagian bawah kanan (jika ada)
    document.addEventListener('click', function(e) {
      if (e.target.closest('[href="#cart"]') || e.target.closest('.btn-keranjang-melayang') || e.target.innerHTML.includes('Keranjang')) {
        const drawerActive = document.getElementById('noni-cart-drawer').classList.contains('active');
        if(!drawerActive && !e.target.closest('.noni-add-to-cart-trigger')) {
          toggleNoniDrawer(true);
        }
      }
    });
  });

  window.toggleNoniDrawer = toggleNoniDrawer;
})();
</script>
</body>
</html>