<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>NAKAL EKS — Tools Pentest</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&family=Share+Tech+Mono&display=swap"
    rel="stylesheet">
  <style>
    :root {
      --bg-dark: #0b0e10;
      --card: #0f1720;
      --muted: #9aa3a8;
      --neon: #39ff14;
      --accent: #23b5ff;
      --shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
      font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
    }

    * { box-sizing: border-box; }

    html, body { height: 100%; }

    body {
      margin: 0;
      background: var(--bg-dark);
      color: #e6eef2;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    /* navbar */
    .nav {
      background: rgba(3, 6, 8, 0.85);
      border-bottom: 1px solid rgba(255, 255, 255, 0.03);
      position: sticky;
      top: 0;
      z-index: 60;
      backdrop-filter: blur(4px);
    }

    .container {
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 18px;
    }

    .nav-inner {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 0;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 12px;
      font-weight: 700;
      color: var(--neon);
    }

    .brand .logo {
      width: 36px;
      height: 36px;
      border-radius: 6px;
      background: #050607;
      border: 1px solid rgba(255, 255, 255, 0.04);
      display: inline-grid;
      place-items: center;
      font-weight: 800;
      color: var(--neon);
      font-family: 'Share Tech Mono', monospace;
      box-shadow: 0 6px 18px rgba(0, 255, 20, 0.06), inset 0 -6px 24px rgba(0, 0, 0, 0.6);
    }

    nav ul { display: flex; gap: 12px; list-style: none; margin: 0; padding: 0; }

    nav a {
      display: inline-block;
      padding: 8px 12px;
      border-radius: 6px;
      color: var(--muted);
      text-decoration: none;
      font-weight: 600;
      font-size: 14px;
      font-family: Inter;
    }

    nav a.active {
      background: rgba(255, 255, 255, 0.03);
      color: var(--neon);
      box-shadow: 0 6px 18px rgba(0, 255, 20, 0.03);
    }

    /* hero */
    .hero {
      height: 420px;
      background-image: url('i_w_news_2012_12_20_129567_540x270_twitter-tantang-hacktivist-anonymous.jpg');
      background-size: cover;
      background-position: center;
      display: grid;
      place-items: center;
      position: relative;
      overflow: hidden;
    }

    .hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background:
        linear-gradient(180deg, rgba(2, 6, 8, 0.75), rgba(2, 6, 8, 0.75)),
        radial-gradient(1200px 500px at 85% 10%, rgba(57, 255, 20, 0.03), transparent 10%);
      z-index: 0;
    }

    .hero-inner {
      position: relative;
      z-index: 2;
      color: var(--neon);
      text-align: center;
      padding: 18px;
      max-width: 900px;
      display: flex;
      flex-direction: column;
      gap: 12px;
      align-items: center;
    }

    .hero h1 {
      margin: 0;
      font-weight: 700;
      font-size: 34px;
      line-height: 1.05;
      font-family: 'Share Tech Mono', monospace;
      text-shadow: 0 0 10px rgba(57, 255, 20, 0.14), 0 4px 18px rgba(0, 0, 0, 0.6);
      letter-spacing: 0.6px;
      color: var(--neon);
    }

    .hero p { margin: 0; max-width: 820px; color: #bcdcc0; font-size: 15px; opacity: 0.95; font-family: Inter; }

    .typewriter {
      display: inline-block;
      white-space: nowrap;
      overflow: hidden;
      border-right: 3px solid rgba(57, 255, 20, 0.9);
      box-sizing: content-box;
      font-family: 'Share Tech Mono', monospace;
      font-size: 20px;
      animation: typing 3.6s steps(36, end) 1, blink-caret 0.8s step-end infinite;
      max-width: 90%;
      color: var(--neon);
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
    }

    @keyframes typing { from { width: 0; } to { width: 100%; } }
    @keyframes blink-caret { from, to { border-color: transparent; } 50% { border-color: rgba(57,255,20,0.9); } }

    .cta {
      display: inline-flex;
      gap: 10px;
      align-items: center;
      background: transparent;
      border: 1px solid rgba(57, 255, 20, 0.18);
      color: var(--neon);
      padding: 10px 16px;
      border-radius: 10px;
      cursor: pointer;
      font-weight: 700;
      font-family: 'Share Tech Mono', monospace;
      box-shadow: 0 8px 30px rgba(57, 255, 20, 0.04), 0 2px 8px rgba(0, 0, 0, 0.6);
      transition: transform .16s ease, box-shadow .16s ease, background .16s ease;
      text-decoration: none;
    }

    .cta:hover {
      transform: translateY(-4px);
      box-shadow: 0 18px 60px rgba(57, 255, 20, 0.06), 0 6px 18px rgba(0, 0, 0, 0.6);
      background: linear-gradient(90deg, rgba(57, 255, 20, 0.03), rgba(35, 181, 255, 0.02));
    }

    main { padding: 36px 0; }

    .about {
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
      padding: 26px;
      border-radius: 8px;
      margin-bottom: 18px;
      color: #cfe9d2;
    }

    .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }

    .card {
      background: rgba(255, 255, 255, 0.02);
      padding: 16px;
      border-radius: 10px;
      box-shadow: var(--shadow);
      border: 1px solid rgba(255, 255, 255, 0.02);
      color: #dbeedd;
    }

    .card h3 { margin: 0 0 8px; }
    .muted { color: var(--muted); font-size: 14px; }

    /* search area */
    .search-wrap { display: flex; justify-content: center; margin: 26px 0; }
    .search-box { width: 100%; max-width: 520px; }
    .search-box form { display: grid; gap: 10px; }
    .search-box input[type=text], .search-box select {
      padding: 12px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.04);
      width: 100%; background: rgba(0,0,0,0.35); color: #e9f8e6; font-family: Inter;
    }
    .btn {
      display: inline-block; padding: 10px 14px; border-radius: 8px;
      background: var(--neon); color: #07110a; border: none; font-weight: 700;
      cursor: pointer; font-family: 'Share Tech Mono', monospace;
    }

    .section-title { font-size: 20px; margin: 18px 0 12px; color: #dff7d8; }

    /* recipe grid (scrollable) */
    .recipes {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
      max-height: 520px; /* tinggi maksimal panel tools */
      overflow-y: auto; /* scroll di dalam area ini */
      padding: 8px;
      border-radius: 8px;
    }

    .recipe {
      background: rgba(255,255,255,0.02);
      border-radius: 10px;
      overflow: hidden;
      border: 1px solid rgba(255,255,255,0.03);
      box-shadow: 0 6px 18px rgba(0,0,0,0.6);
      cursor: pointer;
      transition: .16s;
      position: relative;
    }
    .recipe:hover { transform: translateY(-6px); }

    .recipe img {
      width: 100%; height: 170px; object-fit: cover; display: block; opacity: 0.95;
    }

    .recipe .meta { padding: 12px; color: #dbeedd; }

    /* scrollbar */
    .recipes::-webkit-scrollbar { width: 10px; }
    .recipes::-webkit-scrollbar-track { background: rgba(255,255,255,0.02); border-radius: 8px; }
    .recipes::-webkit-scrollbar-thumb { background: rgba(57,255,20,0.08); border-radius: 8px; }

    footer {
      background: #071014; color: #9fb7a6; padding: 18px; text-align: center; margin-top: 28px;
      border-top: 4px solid rgba(255,255,255,0.02);
    }

    /* responsive */
    @media (max-width:900px) {
      .grid { grid-template-columns: 1fr; }
      .recipes { grid-template-columns: repeat(2,1fr); }
      .hero { height: 320px; }
      .hero h1 { font-size: 28px; }
    }

    @media (max-width:600px) {
      nav ul { display: none; }
      .recipes { grid-template-columns: 1fr; }
      .hero { height: 260px; }
      .hero h1 { font-size: 22px; }
      .typewriter { font-size: 16px; }
    }

    /* Contact form */
    .contact-section {
      background: rgba(255,255,255,0.02); border: 1px solid rgba(57,255,20,0.2); border-radius: 10px;
      padding: 24px; margin: 30px 0; box-shadow: 0 6px 18px rgba(0,0,0,0.6);
    }
    .contact-section h3 { color: var(--neon); font-family: 'Share Tech Mono', monospace; text-align: center; margin-bottom: 18px; }
    .contact-section label { font-weight: 600; color: #cfe9d2; }
    .contact-section input, .contact-section textarea {
      width: 100%; padding: 12px; margin-top: 6px; margin-bottom: 14px; border-radius: 8px;
      border: 1px solid rgba(255,255,255,0.1); background: rgba(0,0,0,0.4); color: #e6fbe6; font-family: Inter;
    }
    .contact-section textarea { min-height: 100px; resize: vertical; }
    .contact-section button { display:inline-block; padding:12px 18px; border-radius:8px; border:none; font-weight:700; font-family:'Share Tech Mono', monospace; background:var(--neon); color:#07110a; cursor:pointer; transition:all 0.2s ease; }
    .contact-section button:hover { transform: translateY(-2px); box-shadow: 0 0 12px rgba(57,255,20,0.5); }
  </style>
</head>

<body>
  <header class="nav">
    <div class="container">
      <div class="nav-inner">
        <div class="brand">
          <div class="logo">NK</div>
          <div style="line-height:1">
            <div style="font-weight:800;color:var(--neon);font-family:'Share Tech Mono', monospace">Nakal Eksploitasi
            </div>
            <div style="font-size:12px;color:var(--muted)">Tools Pentest • Belajar & Eksperimen</div>
          </div>
        </div>
        <nav>
          <ul>
            <li><a href="#home" class="active">Beranda</a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="#recipes">Tools</a></li>
            <li><a href="#contact">Saran</a></li>
            <li><a href="#contact">Kontak</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <section id="home" class="hero">
    <div class="hero-inner container">
      <h1>Selamat Datang di <span style="color:#bfffb0">Nakal Eksploitasi</span></h1>

      <div class="typewriter" aria-hidden="false">
        Tools pentest • network scanner • creds tester • debug & learn
      </div>

      <p>Platform belajar praktik keamanan jaringan untuk pemula hingga menengah — gunakan alat dengan etika dan izin
        yang jelas.</p>

      <div style="display:flex;gap:12px;align-items:center">
        <a class="cta" href="#recipes" id="lihatToolsBtn">Lihat Tools</a>
        <button class="cta" id="learnMoreBtn" style="border-style:dashed;font-weight:600">Panduan Singkat</button>
      </div>
    </div>
  </section>

  <main class="container">
    <section id="about" class="about">
      <div class="grid">
        <div class="card">
          <h3>Tentang Nakal Eksploitasi</h3>
          <p class="muted">Nakal Eksploitasi adalah tempat Belajar dan Mempraktikkan tools terkait keamanan jaringan.
            Selalu gunakan secara etis dan hanya pada sistem yang Anda miliki atau punya izin.</p>
        </div>
        <div class="card">
          <h3>Misi Kami</h3>
          <ul class="muted">
            <li>Membantu pemula mempelajari dasar-dasar pentest secara Mudah.</li>
            <li>Menyajikan dokumentasi singkat, contoh penggunaan, dan latihan CTF ringan.</li>
          </ul>
        </div>
      </div>
    </section>

    <section id="recipes" style="margin-top:18px">
      <div class="search-wrap">
        <div class="search-box card">
          <form id="searchForm">
            <h3 style="text-align:center;margin:0 0 6px">Cari Tools</h3>
            <input id="q" type="text" placeholder="Masukkan nama tools" />
            <select id="cat">
              <option value="">Semua Kategori</option>
              <option value="tool jaringan">Tools jaringan</option>
              <option value="tool Ctf">Tools CTF</option>
            </select>
            <button class="btn" type="submit">Search</button>
          </form>
        </div>
      </div>

      <!-- wrapper recipeList: area scroll internal -->
      <div id="recipeList" class="recipes" tabindex="0">
        <!-- RECIPE NMAP (dilengkapi data-link) -->
        <div class="recipe" data-title="Nmap" data-cat="tool jaringan"
          data-img="https://images.unsplash.com/photo-1563805042-7684c019e1cb?q=80&w=1200&auto=format&fit=crop"
          data-desc="Nmap — Network Mapper: tool pemindai port dan layanan."
          data-link="tools/nmap.html" tabindex="0">
          <div style="position:relative">
            <img src="gambar/Nmap.png" alt="Nmap" />
          </div>
          <div class="meta">
            <strong>Nmap</strong>
            <div class="muted">Tools jaringan</div>
            <div style="margin-top:8px;display:flex;gap:8px">
              <!-- Link ke halaman materi Nmap -->
              <a class="btn" href="tools/nmap.html" target="_blank" rel="noopener">Pelajari</a>
              <a class="btn" href="tools/nmap.html#quiz" target="_blank" rel="noopener">Quiz</a>
            </div>
          </div>
        </div>

        <!-- HYDRA -->
        <div class="recipe" data-title="Hydra" data-cat="tool jaringan"
          data-img="https://upload.wikimedia.org/wikipedia/commons/3/3e/THC-Hydra-logo.png"
          data-desc="Tools brute-force untuk menguji kredensial login."
          data-link="tools/hydra.html" tabindex="0">
          <div style="position:relative">
            <img src="https://upload.wikimedia.org/wikipedia/commons/3/3e/THC-Hydra-logo.png" alt="Hydra" />
          </div>
          <div class="meta">
            <strong>Hydra</strong>
            <div class="muted">Tools jaringan</div>
            <div style="margin-top:8px;display:flex;gap:8px">
              <a class="btn" href="tools/hydra.html" target="_blank" rel="noopener">Pelajari</a>
            </div>
          </div>
        </div>

        <!-- NETCAT -->
        <div class="recipe" data-title="Netcat" data-cat="tool jaringan"
          data-img="https://images.unsplash.com/photo-1559628233-6e5b9b8b9a2d?q=80&w=1200&auto=format&fit=crop"
          data-desc="Tools serbaguna untuk debugging dan eksplorasi jaringan."
          data-link="tools/netcat.html" tabindex="0">
          <div style="position:relative">
            <img src="https://images.unsplash.com/photo-1559628233-6e5b9b8b9a2d?q=80&w=1200&auto=format&fit=crop" alt="Netcat" />
          </div>
          <div class="meta">
            <strong>Netcat</strong>
            <div class="muted">Tools jaringan</div>
            <div style="margin-top:8px;display:flex;gap:8px">
              <a class="btn" href="tools/netcat.html" target="_blank" rel="noopener">Pelajari</a>
            </div>
          </div>
        </div>

        <!-- contoh tambahan (bisa ditambah nanti) -->
      </div>
    </section>
  </main>

  <section id="contact" class="contact-section container" style="margin-bottom:28px">
    <h3>Kirim Saran</h3>
    <form id="saranForm" action="submit_saran.php" method="post" onsubmit="return showAlert()">
      <label>Nama</label><br>
      <input type="text" name="nama" required><br><br>

      <label>Email</label><br>
      <input type="email" name="email" required><br><br>

      <label>Pesan</label><br>
      <textarea name="pesan" required></textarea><br><br>

      <button type="submit">Kirim</button>
    </form>
  </section>

  <footer>
    <div class="container">© Suka Ngantuk07 & Mr Adddduuuhhhhh07 . Gunakan secara etis. Semua hak cipta dilindungi.</div>
  </footer>

  <script>
    // NAV / CTA behavior (tetap)
    document.getElementById('lihatToolsBtn').addEventListener('click', function (e) {
      e.preventDefault();
      const recipesSection = document.querySelector('#recipes');
      if (recipesSection) {
        recipesSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        setTimeout(() => {
          const list = document.getElementById('recipeList');
          if (list) list.focus();
        }, 420);
      }
    });

    document.getElementById('learnMoreBtn').addEventListener('click', function () {
      alert('Panduan singkat:\n1) Gunakan tools hanya pada target yang Anda miliki izin.\n2) Mulai dari environment lab.\n3) Baca dokumentasi tiap tools.');
    });

    // selectors
    const form = document.getElementById('searchForm');
    const input = document.getElementById('q');
    const select = document.getElementById('cat');
    const recipesContainer = document.getElementById('recipeList');
    let recipes = [];
    if (recipesContainer) recipes = Array.from(recipesContainer.querySelectorAll('.recipe'));

    // search / filter
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      filterRecipes();
    });
    input.addEventListener('keyup', filterRecipes);
    select.addEventListener('change', filterRecipes);

    function filterRecipes() {
      const keyword = input.value.trim().toLowerCase();
      const category = select.value;
      recipes.forEach(recipe => {
        const title = (recipe.dataset.title || '').toLowerCase();
        const cat = recipe.dataset.cat || '';
        const matchKeyword = title.includes(keyword);
        const matchCategory = category === "" || cat === category;
        recipe.style.display = (matchKeyword && matchCategory) ? "block" : "none";
      });
    }

    // Ganti klik recipe: buka halaman (tanpa popup)
    recipesContainer && recipesContainer.addEventListener('click', function (e) {
      // jika klik pada <a>, biarkan link berjalan normal (Pelajari membuka di tab baru)
      const anchor = e.target.closest('a');
      if (anchor) return;

      // cari kartu recipe
      const recipe = e.target.closest('.recipe');
      if (!recipe) return;

      // prioritas: data-link attribute > first internal anchor href
      const link = recipe.dataset.link || (recipe.querySelector('a.btn') ? recipe.querySelector('a.btn').href : null);
      if (link) {
        // buka di TAB SAMA (sesuai permintaan). Jika mau buka di tab baru, ganti window.open(link, '_blank')
        window.location.href = link;
      } else {
        alert('Link untuk tool ini belum ditentukan.');
      }
    });

    // keyboard support: Enter / Space membuka link juga
    recipes.forEach(r => {
      r.addEventListener('keydown', (ev) => {
        if (ev.key === 'Enter' || ev.key === ' ') {
          ev.preventDefault();
          const link = r.dataset.link || (r.querySelector('a.btn') ? r.querySelector('a.btn').href : null);
          if (link) window.location.href = link;
        }
      });
    });

    // simple alert on form submit
    function showAlert() {
      alert("✅ Terima kasih! Saran kamu sudah terkirim.");
      return true; // continue to submit
    }

    // Active nav link update (basic)
    const navLinks = document.querySelectorAll("nav a");
    const sections = document.querySelectorAll("main section, .hero, #home, #about, #recipes, #contact");
    function updateActiveLink() {
      let current = "";
      sections.forEach(section => {
        if (!section.id) return;
        const sectionTop = section.offsetTop - 80;
        const sectionHeight = section.clientHeight;
        if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
          current = section.getAttribute("id");
        }
      });
      navLinks.forEach(link => {
        link.classList.remove("active");
        const href = link.getAttribute("href");
        if (href && href.includes(current)) link.classList.add("active");
      });
    }
    window.addEventListener("scroll", updateActiveLink);

    // Smooth scroll for nav links; special handling for #recipes to focus internal scroll
    navLinks.forEach(link => {
      link.addEventListener("click", function (e) {
        e.preventDefault();
        const href = this.getAttribute("href");
        if (!href) return;
        if (href === '#recipes') {
          const recipesSection = document.querySelector('#recipes');
          if (recipesSection) {
            recipesSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            setTimeout(() => {
              const list = document.getElementById('recipeList');
              if (list) list.focus();
            }, 420);
          }
          return;
        }
        const target = document.querySelector(href);
        if (target) {
          window.scrollTo({ top: target.offsetTop - 60, behavior: 'smooth' });
        }
      });
    });

    // inisialisasi filter bila ada nilai default
    filterRecipes();
  </script>
</body>
</html>
