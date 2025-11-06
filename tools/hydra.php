<!-- simpan sebagai: tools/hydra.html -->
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Hydra — Materi & Quiz | Nakal Eksploitasi</title>
  <style>
    :root {
      --bg-dark:#0b0e10; --neon:#39ff14; --muted:#9aa3a8;
      font-family: Inter, sans-serif;
    }
    body{margin:0;background:var(--bg-dark);color:#e6eef2;padding:28px;}
    .container{max-width:980px;margin:0 auto;}
    a { color: var(--neon); text-decoration: none; }
    header{display:flex;gap:12px;align-items:center;margin-bottom:18px;}
    header .logo{width:46px;height:46px;border-radius:8px;background:#051011;display:grid;place-items:center;font-family:'Share Tech Mono',monospace;color:var(--neon);font-weight:800}
    h1{margin:0 0 6px;font-family:'Share Tech Mono',monospace;color:var(--neon)}
    p.muted{color:var(--muted)}
    .grid{display:grid;grid-template-columns:1fr 360px;gap:18px}
    .card{background:rgba(255,255,255,0.02);padding:14px;border-radius:10px;border:1px solid rgba(255,255,255,0.02)}
    iframe{width:100%;height:360px;border:0;border-radius:8px;background:#000}
    pre{background:#071013;padding:12px;border-radius:8px;overflow:auto;color:#dff7d8}
    .btn{display:inline-block;padding:8px 12px;border-radius:8px;background:var(--neon);color:#07110a;font-weight:700;margin-top:8px}
    .quiz-answer{margin:8px 0}
    #quizResult{margin-top:10px;color:var(--neon);font-weight:700}
    ul { padding-left: 18px; margin: 8px 0; }
    @media(max-width:940px){.grid{grid-template-columns:1fr}}
  </style>
</head>
<body>
  <div class="container">
    <header>
      <div class="logo">NK</div>
      <div>
        <div style="font-size:15px;color:var(--neon);font-weight:800">Nakal Eksploitasi — Materi Tools</div>
        <div class="muted" style="font-size:13px">Hydra — Brute-force Credential Tester</div>
      </div>
    </header>

    <h1>Hydra — Panduan Singkat (Video sumber: Hydra tutorial)</h1>
    <p class="muted">Video sumber disematkan langsung dari YouTube. Pelajari cara kerja Hydra untuk pengujian kredensial — **hanya** di lingkungan yang kamu miliki izin atau di lab. Jangan gunakan untuk aktivitas ilegal.</p>

    <div class="grid">
      <!-- KIRI: video + ringkasan + commands -->
      <div>
        <div class="card">
          <h3>Video Tutorial</h3>
          <!-- embed YouTube video -->
          <iframe src="https://www.youtube.com/embed/GIgzwg29IsY" title="Hydra tutorial" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <p class="muted" style="margin-top:10px">Tonton video untuk demo praktis. Fokus pada cara menyiapkan wordlist, format target, dan opsi protokol (ssh, ftp, http-form-post, smb, dll).</p>
        </div>

        <div class="card" style="margin-top:14px">
          <h3>Ringkasan Singkat</h3>
          <ul class="muted">
            <li>Hydra (THC-Hydra) adalah tool untuk menguji kredensial (brute-force) pada berbagai protokol.</li>
            <li>Gunakan hanya pada target yang kamu miliki izin eksplisitnya (lab, CTF, atau sistem uji milikmu).</li>
            <li>Persiapkan wordlist (contoh: rockyou.txt atau daftar kata sandi custom).</li>
          </ul>
        </div>

        <div class="card" style="margin-top:14px">
          <h3>Perintah Hydra Umum (contoh untuk pembelajaran)</h3>
          <p class="muted">Jalankan di terminal Linux (WSL/VM) pada lab. Ganti `<target>`, `<user>` dan jalur wordlist sesuai lingkunganmu.</p>
          <pre>
# 1) Brute-force SSH (single user)
hydra -l <username> -P /path/to/wordlist.txt ssh://<target_ip>

# 2) Brute-force SSH (daftar user + wordlist)
hydra -L users.txt -P passwords.txt ssh://<target_ip> -t 4 -w 5

# 3) HTTP POST form (contoh login form)
hydra -l admin -P /path/to/wordlist.txt <target_ip> http-post-form "/login:username=^USER^&password=^PASS^:F=incorrect"

# 4) FTP brute-force
hydra -L users.txt -P passwords.txt ftp://<target_ip> -t 6

# 5) Menyimpan hasil ke file
hydra -L users.txt -P passwords.txt ssh://<target_ip> -o hasil_hydra.txt

# 6) Perintah verbose / lebih cepat
hydra -V -t 16 -w 3 -L users.txt -P passwords.txt ssh://<target_ip>
          </pre>
          <p class="muted">Keterangan:  
          - `-l` single username, `-L` file userlist.  
          - `-P` file password list, `-p` single password.  
          - `-t` parallel tasks, jangan set terlalu tinggi pada jaringan nyata.</p>
        </div>

        <div class="card" style="margin-top:14px">
          <h3>Latihan Lab Singkat</h3>
          <ol class="muted">
            <li>Siapkan VM target dengan layanan SSH atau FTP yang bisa diuji (default credential di-reset untuk latihan).</li>
            <li>Gunakan wordlist kecil (10-100 kata) untuk latihan awal agar cepat.</li>
            <li>Jalankan perintah contoh lalu catat waktu dan hasil yang ditemukan.</li>
            <li>Analisa apakah proteksi rate-limiting bekerja; pelajari mitigasinya (kunci kuat, lockout, 2FA).</li>
          </ol>
        </div>
      </div>

      <!-- KANAN: info & quiz -->
      <aside>
        <div class="card">
          <h3>Etika & Keamanan</h3>
          <p class="muted">Hydra bisa merusak reputasi dan melanggar hukum bila disalahgunakan. Gunakan di lab, CTF, atau sistem dengan izin. Pastikan juga tidak mengganggu layanan produksi.</p>
        </div>

        <div class="card" style="margin-top:14px">
          <h3>Referensi Cepat</h3>
          <ul class="muted">
            <li><a href="https://github.com/vanhauser-thc/thc-hydra" target="_blank" rel="noopener">THC-Hydra (GitHub)</a></li>
            <li><a href="https://www.kali.org/tools/hydra/" target="_blank" rel="noopener">Hydra — Kali Tools</a></li>
            <li>Video sumber: Hydra tutorial (YouTube).</li>
          </ul>
        </div>

        <div class="card" style="margin-top:14px">
          <h3>Quiz Singkat (4 soal)</h3>
          <div id="quizArea">
            <div class="quiz-row">
              <div><strong>1.</strong> Opsi yang digunakan untuk menentukan file password?</div>
              <div class="quiz-answer"><label><input type="radio" name="q0" value="0"> -P</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q0" value="1"> -L</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q0" value="2"> -o</label></div>
            </div>

            <div class="quiz-row" style="margin-top:8px">
              <div><strong>2.</strong> Untuk brute-force SSH user tunggal, opsi yang benar?</div>
              <div class="quiz-answer"><label><input type="radio" name="q1" value="0"> hydra -l user -P wordlist ssh://target</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q1" value="1"> hydra -L users.txt ftp://target</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q1" value="2"> nmap -sV target</label></div>
            </div>

            <div class="quiz-row" style="margin-top:8px">
              <div><strong>3.</strong> Parameter untuk parallel tasks di hydra?</div>
              <div class="quiz-answer"><label><input type="radio" name="q2" value="0"> -t</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q2" value="1"> -T4</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q2" value="2"> -s</label></div>
            </div>

            <div class="quiz-row" style="margin-top:8px">
              <div><strong>4.</strong> Untuk menyimpan output hydra ke file, gunakan opsi?</div>
              <div class="quiz-answer"><label><input type="radio" name="q3" value="0"> -o</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q3" value="1"> -O</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q3" value="2"> -A</label></div>
            </div>

            <button id="submitQuiz" class="btn">Kirim Jawaban</button>
            <div id="quizResult" aria-live="polite"></div>
          </div>
        </div>

        <div class="card" style="margin-top:14px">
          <h3>Catatan Penggunaan</h3>
          <p class="muted">Kalau kamu mau, aku bisa membuat versi halaman ini yang menampilkan contoh perintah lengkap + penjelasan output (step-by-step) — atau menambahkan fitur simpan hasil quiz ke server.</p>
        </div>
      </aside>
    </div>

    <div style="margin-top:18px" class="muted">Kembali ke <a href="../index.php">Beranda</a></div>
  </div>

  <script>
    // quiz logic (jawaban benar: q0:0, q1:0, q2:0, q3:0)
    document.getElementById('submitQuiz').addEventListener('click', function() {
      const answers = [0,0,0,0];
      let score = 0;
      for (let i=0;i<answers.length;i++){
        const sel = document.querySelector('input[name="q'+i+'"]:checked');
        if (sel && parseInt(sel.value,10) === answers[i]) score++;
      }
      const total = answers.length;
      const percent = Math.round((score/total)*100);
      const result = document.getElementById('quizResult');
      result.textContent = 'Skor: ' + score + ' / ' + total + ' (' + percent + '%)';
      // tampilan warna sederhana
      if (percent === 100) result.style.color = '#39ff14';
      else if (percent >= 60) result.style.color = '#c1ff80';
      else result.style.color = '#ff6b6b';
    });

    // Fungsi ini memanggil server PHP untuk menyimpan hasil kuis
function sendQuizResult(nama, score, total, detail) {
  const payload = {
    tool_key: 'nmap',  // <- sudah diganti khusus untuk halaman Nmap
    nama: nama || '',
    score: parseInt(score, 10),
    total: parseInt(total, 10),
    detail: detail || null
  };

  fetch('/save_quiz.php', { // sesuaikan path jika save_quiz.php di folder lain
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(payload)
  })
  .then(r => r.json())
  .then(res => {
    if (res.success) {
      alert('✅ Hasil kuis Nmap berhasil disimpan (ID: ' + res.id + ')');
    } else {
      console.warn('Save quiz failed:', res);
      alert('❌ Gagal menyimpan hasil kuis. (Periksa server)');
    }
  })
  .catch(err => {
    console.error('Save quiz error', err);
    alert('⚠️ Terjadi kesalahan saat menyimpan hasil.');
  });
}


// Contoh cara pemanggilan setelah skor selesai dihitung
// Misalnya kamu sudah punya variabel `score`, `total`, dan `details`
document.getElementById("submitQuiz").addEventListener("click", function() {
  const nama = document.getElementById("quizName").value.trim(); // ambil nama dari input
  const score = 8;  // contoh nilai skor
  const total = 10; // contoh total pertanyaan
  const details = [
    { question: "Apa fungsi Nmap?", answer: "Scanning port", correct: true },
    { question: "Siapa pembuat Nmap?", answer: "Gordon Lyon", correct: true }
  ];

  // panggil fungsi kirim hasil ke server
  sendQuizResult(nama, score, total, details);
});

  </script>
</body>
</html>


