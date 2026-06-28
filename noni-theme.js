/* noni-theme.js Clean & Unified v4 */

// Global State untuk Keranjang Belanja Berbasis Multistep
const NONI_PROVINCES = ["Aceh","Bali","Banten","Bengkulu","DI Yogyakarta","DKI Jakarta","Gorontalo","Jambi","Jawa Barat","Jawa Tengah","Jawa Timur","Kalimantan Barat","Kalimantan Selatan","Kalimantan Tengah","Kalimantan Timur","Kalimantan Utara","Kepulauan Bangka Belitung","Kepulauan Riau","Lampung","Maluku","Maluku Utara","Nusa Tenggara Barat","Nusa Tenggara Timur","Papua","Papua Barat","Riau","Sulawesi Barat","Sulawesi Selatan","Sulawesi Tengah","Sulawesi Tenggara","Sulawesi Utara","Sumatera Barat","Sumatera Selatan","Sumatera Utara"];
const NONI_COURIERS = ["SPX Express","JNE Regular","J&T Express","SiCepat REG","Pos Indonesia","GoSend (Same Day)","GrabExpress (Same Day)"];
const NONI_JAWA = ["DKI Jakarta","Jawa Barat","Jawa Tengah","Jawa Timur","DI Yogyakarta","Banten"];
const NONI_PAYMENTS = ["Transfer Bank (Manual)","COD (Bayar di Tempat)","Bayar di Indomaret","Bayar di Alfamart","QRIS / GoPay / OVO"];

let noni_cart = [];
let noni_panelStep = 'cart'; 
let noni_formData = {
  name: "", phone: "", address: "", province: "", 
  courier: "SPX Express", payment: "Transfer Bank (Manual)"
};

const noni_fmt = n => "Rp " + n.toLocaleString("id-ID");

// Kirim Pesan Konsultasi Sehat
window.sendContactWA = function(wa) {
    var n  = (document.getElementById('fc-name')    || {}).value || 'Pelanggan';
    var ph = (document.getElementById('fc-phone')   || {}).value || '-';
    var cy = (document.getElementById('fc-city')    || {}).value || '-';
    var pr = (document.getElementById('fc-product') || {}).value || '-';
    var ms = (document.getElementById('fc-msg')     || {}).value || '-';
    var num = wa || (typeof noniVars !== 'undefined' && noniVars.wa1 ? noniVars.wa1 : '6281238162678');
    var txt = 'Halo Noni Bali!\n\nNama: ' + n + '\nHP: ' + ph + '\nWilayah: ' + cy + '\nProduk: ' + pr + '\n\nPesan: ' + ms + '\n\nTerima kasih!';
    window.open('https://wa.me/' + num + '?text=' + encodeURIComponent(txt), '_blank');
};

// Toggle Teks Testimoni Panjang/Pendek
window.testiToggle = function(btn) {
    var card = btn.closest ? btn.closest('.testi-card') : null;
    var p = card ? card.querySelector('.testi-text') : btn.previousElementSibling;
    if (!p) return;
    var full = p.getAttribute('data-full') || '';
    var shortText = p.getAttribute('data-short') || (full.substring(0, 140) + '...');
    var open = btn.getAttribute('data-expanded') === '1';
    p.textContent = open ? '“' + shortText + '”' : '“' + full + '”';
    btn.textContent = open ? 'Baca selengkapnya ↓' : 'Sembunyikan ↑';
    btn.setAttribute('data-expanded', open ? '0' : '1');
};

// Kontrol Drawer Utama
window.toggleNoniDrawer = function(open) {
  const overlay = document.getElementById('noni-cart-overlay');
  const drawer = document.getElementById('noni-cart-drawer');
  if (!overlay || !drawer) return;
  if (open) {
    overlay.classList.add('active');
    drawer.classList.add('active');
    document.body.style.overflow = 'hidden';
    renderDrawer();
  } else {
    overlay.classList.remove('active');
    drawer.classList.remove('active');
    document.body.style.overflow = '';
  }
};

// Tambah Produk ke Dalam Keranjang Belanja
window.addToCartFromBtn = function(btnElement) {
  const name = btnElement.getAttribute('data-name');
  const price = parseInt(btnElement.getAttribute('data-price')) || 0;
  const emoji = btnElement.getAttribute('data-emoji') || "🌿";
  
  const existing = noni_cart.find(x => x.name === name);
  if (existing) {
    existing.qty += 1;
  } else {
    noni_cart.push({ name, price, emoji, qty: 1 });
  }
  
  noni_panelStep = 'cart'; 
  updateGlobalBadge();
  window.toggleNoniDrawer(true); 
};

// Merubah Kuantitas Lewat Tombol Abu Bulat Anda
window.changeQty = function(index, delta) {
  noni_cart[index].qty += delta;
  if (noni_cart[index].qty <= 0) {
    noni_cart.splice(index, 1);
  }
  updateGlobalBadge();
  renderDrawer();
};

function updateGlobalBadge() {
  const count = noni_cart.reduce((s, i) => s + i.qty, 0);
  const setBadge = (badge) => {
    if (!badge) return;
    badge.innerText = count;
    badge.style.display = count > 0 ? 'flex' : 'none';
  };
  setBadge(document.getElementById('cart-global-badge'));
  setBadge(document.getElementById('cart-badge'));
}

// Rendering Konten Antarmuka Drawer secara Sinkron
function renderDrawer() {
  const titleText = document.getElementById('drawer-title-text');
  const bodyContent = document.getElementById('drawer-body-content');
  const footerContent = document.getElementById('drawer-footer-content');
  if (!titleText || !bodyContent || !footerContent) return;
  
  const total = noni_cart.reduce((s, i) => s + i.price * i.qty, 0);
  const count = noni_cart.reduce((s, i) => s + i.qty, 0);

  // Keadaan Jika Keranjang Kosong
  if (noni_cart.length === 0 && noni_panelStep !== 'success') { 
    titleText.innerText = "🛒 Keranjang Belanja";
    bodyContent.innerHTML = `
      <div style="text-align:center; padding:40px 10px; color:#7a9a8a;">
        <div style="font-size:48px; margin-bottom:12px;">🛒</div>
        <p style="font-size:14px; font-weight:600;">Keranjang Anda masih kosong</p>
        <p style="font-size:12px; color:#a0bfae;">Silakan pilih produk unggulan kami terlebih dahulu.</p>
      </div>`;
    footerContent.innerHTML = `<button class="v-btn-green" onclick="window.toggleNoniDrawer(false)">Mulai Belanja</button>`;
    return;
  }

  // Langkah 1: Tampilan List Belanja Berwarna Bersih Anda
  if (noni_panelStep === 'cart') { 
    titleText.innerText = "🛒 Keranjang Belanja";
    let itemsHtml = '';
    noni_cart.forEach((item, index) => {
      itemsHtml += `
        <div class="v-cart-item">
          <div class="v-ci-img">${item.emoji}</div>
          <div class="v-ci-info">
            <div class="v-ci-name">${item.name}</div>
            <div class="v-ci-price">${noni_fmt(item.price)}</div>
          </div>
          <div class="v-ci-qty">
            <button class="v-q-btn" onclick="changeQty(${index}, -1)">−</button>
            <span style="font-weight:700; min-width:16px; text-align:center;">${item.qty}</span>
            <button class="v-q-btn" onclick="changeQty(${index}, 1)">+</button>
          </div>
        </div>`;
    });
    bodyContent.innerHTML = itemsHtml;

    footerContent.innerHTML = `
      <div class="v-summary-box">
        ${noni_cart.map(i => `<div class="v-sum-row"><span>${i.name} (x${i.qty})</span><span>${noni_fmt(i.price*i.qty)}</span></div>`).join('')}
        <div class="v-sum-total">
          <span class="v-sum-label">Total Biaya</span>
          <span class="v-sum-val">${noni_fmt(total)}</span>
        </div>
      </div>
      <button class="v-btn-green" onclick="noni_panelStep = 'checkout'; renderDrawer();">Lanjut Isi Alamat →</button>
    `; 
  }

  // Langkah 2: Formulir Data Alamat Pengiriman Lengkap
  else if (noni_panelStep === 'checkout') { 
    titleText.innerText = "👤 Form Alamat Checkout";
    const isCOD = noni_formData.payment === "COD (Bayar di Tempat)";
    const showLiquidWarning = noni_formData.province && noni_formData.province !== "Bali";
    const isJawa = NONI_JAWA.includes(noni_formData.province);

    bodyContent.innerHTML = `
      <div style="background:#f4fbf7; padding:10px 14px; border-radius:10px; margin-bottom:16px; border:1px dashed #a8d5b5; font-size:12px; font-weight:700; color:#1a3d2b;">
        Ringkasan Ringkas: ${count} item terpilih untuk dikirim.
      </div>
      <div class="v-form-row">
        <div class="v-fg">
          <label class="v-label">Nama Lengkap *</label>
          <input type="text" class="v-input" id="v-form-name" placeholder="I Wayan Budi" value="${noni_formData.name}" oninput="noni_formData.name=this.value">
        </div>
        <div class="v-fg">
          <label class="v-label">Nomor HP / WA *</label>
          <input type="tel" class="v-input" id="v-form-phone" placeholder="08xxxxxxxxxx" value="${noni_formData.phone}" oninput="noni_formData.phone=this.value">
        </div>
      </div>
      <div class="v-fg">
        <label class="v-label">Detail Alamat Rumah *</label>
        <textarea class="v-textarea" id="v-form-address" placeholder="Nama jalan, nomor rumah, RT/RW, desa/kecamatan" oninput="noni_formData.address=this.value">${noni_formData.address}</textarea>
      </div>
      <div class="v-fg">
        <label class="v-label">Provinsi Tujuan *</label>
        <select class="v-select" id="v-form-province" onchange="noni_formData.province=this.value; renderDrawer();">
          <option value="">Pilih Provinsi --</option>
          ${NONI_PROVINCES.map(p => `<option value="${p}" ${noni_formData.province === p ? 'selected' : ''}>${p}</option>`).join('')}
        </select>
      </div>
      <div class="v-fg">
        <label class="v-label">Kurir Pengiriman *</label>
        <select class="v-select" id="v-form-courier" onchange="noni_formData.courier=this.value; renderDrawer();">
          ${NONI_COURIERS.map(c => `<option value="${c}" ${noni_formData.courier === c ? 'selected' : ''}>${c}</option>`).join('')}
        </select>
      </div>
      <div class="v-fg">
        <label class="v-label">Metode Pembayaran *</label>
        <select class="v-select" id="v-form-payment" onchange="noni_formData.payment=this.value; renderDrawer();">
          ${NONI_PAYMENTS.map(p => `<option value="${p}" ${noni_formData.payment === p ? 'selected' : ''}>${p}</option>`).join('')}
        </select>
      </div>
      ${showLiquidWarning ? `<div class="v-liquid-box">⚠️ <b>Perhatian Pengiriman Cairan:</b><br>Pengiriman produk cair ke luar Bali berpotensi dialihkan ke jalur darat/laut. Waktu tiba mungkin sedikit lebih lama.</div>` : ''}
      ${(isCOD && noni_formData.province && noni_formData.province !== "Bali" && !isJawa) ? `<div class="v-note-box">⚠️ <b>Info COD:</b> Layanan COD ke luar Jawa-Bali mungkin tidak tersedia untuk semua kurir. Admin akan mengkonfirmasi via WA.</div>` : ''}
    `;

    footerContent.innerHTML = `
      <button class="v-btn-wa" onclick="submitOrderWA()">💬 Kirim Pesanan via WhatsApp</button>
      <button class="v-btn-outline" onclick="noni_panelStep = 'cart'; renderDrawer();">← Kembali ke Keranjang</button>
    `; 
  }

  // Langkah 3: Layar Konfirmasi Berhasil / Diproses yang Sempat Hilang
  else if (noni_panelStep === 'success') { 
    titleText.innerText = "✅ Pesanan Diproses";
    bodyContent.innerHTML = `
      <div style="text-align:center; padding:40px 10px;">
        <div style="font-size:48px; margin-bottom:12px;">✅</div>
        <h3 style="color:#1a3d2b; margin-bottom:8px;">Terima Kasih!</h3>
        <p style="font-size:13px; color:#5a7a68; line-height:1.5;">Pesanan Anda sedang dialihkan ke WhatsApp. Silakan tekan tombol <b>Kirim / Send</b> di aplikasi WhatsApp Anda.</p>
      </div>`;
    footerContent.innerHTML = `
      <button class="v-btn-outline" onclick="window.toggleNoniDrawer(false); noni_panelStep = 'cart';">Tutup Panel</button>
    `; 
  }
}

// Menjalankan Kirim Pesanan Menuju API Jendela WhatsApp & Merubah Langkah ke Success Screen
window.submitOrderWA = function() {
  if(!noni_formData.name || !noni_formData.phone || !noni_formData.address || !noni_formData.province) {
    alert("Mohon lengkapi Nama, No. HP, Detail Alamat, dan Provinsi terlebih dahulu.");
    return;
  }

  let itemText = noni_cart.map((i, idx) => `${idx+1}. ${i.name} (x${i.qty}) - ${noni_fmt(i.price * i.qty)}`).join('\n');
  let total = noni_cart.reduce((s, i) => s + i.price * i.qty, 0);

  let msg = `Halo Admin Noni Bali, saya ingin melakukan pemesanan produk:\n\n` +
            `*🛒 RINCIAN ORDER:*\n${itemText}\n` +
            `*Subtotal Produk:* ${noni_fmt(total)}\n\n` +
            `*📦 DATA PENGIRIMAN:*\n` +
            `- Nama: ${noni_formData.name}\n` +
            `- No WA: ${noni_formData.phone}\n` +
            `- Alamat: ${noni_formData.address}\n` +
            `- Provinsi: ${noni_formData.province}\n` +
            `- Kurir: ${noni_formData.courier}\n` +
            `- Pembayaran: ${noni_formData.payment}\n\n` +
            `Mohon diinformasikan total keseluruhan beserta ongkos kirimnya. Terima kasih!`;

  let waNum = (typeof noniVars !== 'undefined' && noniVars.wa1) ? noniVars.wa1 : '6281238162678';
  window.open('https://wa.me/' + waNum + '?text=' + encodeURIComponent(msg), '_blank');
  
  // Berpindah Ke Konsep Sukses Anda
  noni_panelStep = 'success'; 
  noni_cart = []; 
  updateGlobalBadge();
  renderDrawer();
};

/* ═══════════════════════════════════════════════════════
   ANIMASI ESTETIKA WEBSITE ASLI MILIK ANDA
═══════════════════════════════════════════════════════ */

// 1. Loading bar saat halaman dimuat
(function () {
    var bar = document.createElement('div');
    bar.className = 'noni-loadbar';
    document.body.appendChild(bar);
    setTimeout(function () { bar.style.width = '70%'; }, 50);
    window.addEventListener('load', function () {
        bar.style.width = '100%';
        bar.classList.add('done');
        setTimeout(function () { bar.remove(); }, 700);
    });
})();

// 2. Scroll reveal dengan stagger per grid
var noniRevealObs = ('IntersectionObserver' in window) ? new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
        if (entry.isIntersecting) {
            entry.target.classList.add('vis');
            noniRevealObs.unobserve(entry.target);
        }
    });
}, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' }) : null;

function noniInitReveal() {
    document.querySelectorAll('.fu:not([data-noni-obs])').forEach(function (el, i) {
        el.setAttribute('data-noni-obs', '1');
        if (noniRevealObs) {
            noniRevealObs.observe(el);
        } else {
            el.classList.add('vis');
        }
    });
}

// 3. Button ripple effect
function noniAddRipple(e) {
    var btn = e.currentTarget;
    var rect = btn.getBoundingClientRect();
    var ripple = document.createElement('span');
    var size = Math.max(rect.width, rect.height);
    ripple.className = 'noni-ripple';
    ripple.style.width = ripple.style.height = size + 'px';
    ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
    ripple.style.top  = (e.clientY - rect.top  - size / 2) + 'px';
    btn.appendChild(ripple);
    setTimeout(function () { ripple.remove(); }, 650);
}

function noniInitRipples() {
    var selectors = '.btn-hero-wa, .btn-hero-outline, .btn-add, .agent-wa-btn, .form-wa-btn, .cart-order-btn, .btn-wa-nav';
    document.querySelectorAll(selectors).forEach(function (btn) {
        if (btn.getAttribute('data-ripple-bound')) return;
        btn.setAttribute('data-ripple-bound', '1');
        btn.addEventListener('click', noniAddRipple);
    });
}

// 4. Animated number counter — hero stats
function noniAnimateCounter(el) {
    var raw = el.textContent.trim();
    var match = raw.match(/^([0-9.,]+)(\+?)(.*)$/);
    if (!match) return;

    var numPart   = match[1].replace(/[.,]/g, '');
    var suffix    = match[2] || '';
    var extraText = match[3] || '';
    var target    = parseInt(numPart, 10);
    if (isNaN(target)) return;

    var current = 0;
    var duration = 1200;
    var startTime = null;
    el.classList.add('counting');

    function step(ts) {
        if (!startTime) startTime = ts;
        var progress = Math.min((ts - startTime) / duration, 1);
        var eased = 1 - Math.pow(1 - progress, 3);
        current = Math.floor(eased * target);
        el.textContent = current.toLocaleString('id-ID') + suffix + extraText;
        if (progress < 1) {
            requestAnimationFrame(step);
        } else {
            el.textContent = target.toLocaleString('id-ID') + suffix + extraText;
            el.classList.remove('counting');
        }
    }
    requestAnimationFrame(step);
}

function noniInitCounters() {
    var stats = document.querySelectorAll('.hero-stat-n:not([data-counted])');
    if (!stats.length) return;

    if (!('IntersectionObserver' in window)) {
        stats.forEach(function (el) {
            el.setAttribute('data-counted', '1');
            noniAnimateCounter(el);
        });
        return;
    }

    var counterObs = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var el = entry.target;
                el.setAttribute('data-counted', '1');
                noniAnimateCounter(el);
                counterObs.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    stats.forEach(function (el) { counterObs.observe(el); });
}

// 5. Cursor-follow glow di hero
function noniInitCursorGlow() {
    var hero = document.querySelector('.hero');
    var finePointer = window.matchMedia && window.matchMedia('(pointer: fine)').matches;
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (!finePointer || reduceMotion) return;
    if (!hero || hero.querySelector('.hero-cursor-glow')) return;

    var glow = document.createElement('div');
    glow.className = 'hero-cursor-glow';
    hero.appendChild(glow);

    hero.addEventListener('mousemove', function (e) {
        var rect = hero.getBoundingClientRect();
        glow.style.left = (e.clientX - rect.left) + 'px';
        glow.style.top  = (e.clientY - rect.top) + 'px';
        glow.style.opacity = '1';
    });
    hero.addEventListener('mouseleave', function () {
        glow.style.opacity = '0';
    });
    glow.style.opacity = '0';
    glow.style.transition = glow.style.transition + ', opacity .3s ease';
}

// 6. Smooth anchor scroll dengan offset header
function noniInitSmoothAnchors() {
    document.querySelectorAll('a[href^="#"]').forEach(function (link) {
        if (link.getAttribute('data-smooth-bound')) return;
        link.setAttribute('data-smooth-bound', '1');
        link.addEventListener('click', function (e) {
            var id = this.getAttribute('href');
            if (id.length < 2) return;
            var target = document.querySelector(id);
            if (!target) return;
            e.preventDefault();
            var headerH = document.getElementById('site-header')
                ? document.getElementById('site-header').offsetHeight
                : 70;
            var top = target.getBoundingClientRect().top + window.pageYOffset - headerH - 10;
window.scrollTo({ top: top, behavior: 'smooth' });       });
    });
}

// Event Scroll Header Fading
window.addEventListener('scroll', function() {
    var h = document.getElementById('site-header');
    if (h) h.classList.toggle('scrolled', window.scrollY > 40);
});

// Pemicu Ketika DOM Selesai Dimuat Sempurna
document.addEventListener('DOMContentLoaded', function () {
    if (typeof noniInitReveal === 'function') noniInitReveal();
    noniInitRipples();
    noniInitCounters();
    noniInitCursorGlow();
    noniInitSmoothAnchors();
    
    // Bind Tombol Tutup & Overlay Klik dengan Aman
    const closeBtn = document.getElementById('noni-close-drawer-btn');
    const overlay = document.getElementById('noni-cart-overlay');
    if (closeBtn) closeBtn.addEventListener('click', () => window.toggleNoniDrawer(false));
    if (overlay) overlay.addEventListener('click', () => window.toggleNoniDrawer(false));
});

window.addEventListener('load', function () {
    noniInitRipples();
    noniInitSmoothAnchors();
});