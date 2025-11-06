<!-- simpan sebagai: tools/nmap.html -->
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Nmap — Materi & Quiz | Nakal Eksploitasi</title>
  <link rel="stylesheet" href="../" />
  <style>
    /* Minimal styling agar cocok dengan tema utama */
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
    @media(max-width:940px){.grid{grid-template-columns:1fr}}
  </style>
</head>
<body>
  <div class="container">
    <header>
      <div class="logo">NK</div>
      <div>
        <div style="font-size:15px;color:var(--neon);font-weight:800">Nakal Eksploitasi — Materi Tools</div>
        <div class="muted" style="font-size:13px">Nmap — Network Mapper</div>
      </div>
    </header>

    <h1>Nmap — Panduan Singkat (Video sumber: NMAP Tutorial for Beginners)</h1>
    <p class="muted">Video asli yang disematkan berasal dari YouTube (tutorial Nmap untuk pemula). Tonton videonya, lalu praktikkan di lab atau VM yang kamu miliki. (Video: sematkan dari link yang kamu berikan). :contentReference[oaicite:1]{index=1}</p>

    <div class="grid">
      <!-- KIRI: video + ringkasan + commands -->
      <div>
        <div class="card">
          <h3>Video Tutorial</h3>
          <!-- embed YouTube video (ganti ID jika perlu) -->
          <iframe src="https://www.youtube.com/embed/LTMucsu35dk" title="NMAP Tutorial for Beginners" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <p class="muted" style="margin-top:10px">Tonton bagian-bagian penting: (1) pemindaian dasar, (2) deteksi versi (-sV), (3) deteksi OS (-O), (4) scan agresif (-A), (5) opsi stealth / timing.</p>
        </div>

        <div class="card" style="margin-top:14px">
          <h3>Ringkasan Singkat</h3>
          <ul class="muted">
            <li>Nmap adalah tool open-source untuk discovery dan pemindaian port/layanan.</li>
            <li>Selalu lakukan pemindaian di jaringan yang kamu miliki atau mendapat izin.</li>
            <li>Gunakan VM/lab (mis. mesin VirtualBox/VMware atau environment seperti TryHackMe) untuk praktik.</li>
          </ul>
        </div>

        <div class="card" style="margin-top:14px">
          <h3>Perintah Nmap Umum (contoh)</h3>
          <p class="muted">Salin & jalankan di terminal Linux (atau WSL) di labmu:</p>
          <pre>
# 1) Scan cepat host tunggal (port umum)
nmap 192.168.1.10

# 2) Scan port tertentu
nmap -p 22,80,443 192.168.1.10

# 3) Scan seluruh port (1-65535)
sudo nmap -p- 192.168.1.10

# 4) Deteksi versi layanan
sudo nmap -sV 192.168.1.10

# 5) Deteksi OS (butuh privileges)
sudo nmap -O 192.168.1.10

# 6) Scan agresif (gabungan -sV -O -A)
sudo nmap -A 192.168.1.10

# 7) Stealth SYN scan
sudo nmap -sS 192.168.1.10

# 8) Timing/kecepatan (T0..T5)
nmap -T4 192.168.1.10

# 9) Output ke file
nmap -oA hasil_scan 192.168.1.10
          </pre>
          <p class="muted">Keterangan: gunakan <code>sudo</code> jika perlu; ganti alamat IP dengan target lab-mu.</p>
        </div>

        <div class="card" style="margin-top:14px">
          <h3>Latihan Lab Singkat</h3>
          <ol class="muted">
            <li>Siapkan 2 VM (target & attacker) pada jaringan internal host.</li>
            <li>Jalankan `nmap -sS -sV -p 1-1000 <ip-target>`; catat layanan yang muncul.</li>
            <li>Coba opsi `-O` untuk mendeteksi OS (jika diizinkan).</li>
            <li>Gunakan `-oA` untuk menyimpan hasil, lalu analisa hasil di file teks.</li>
          </ol>
        </div>
      </div>

      <!-- KANAN: info & quiz -->
      <aside>
        <div class="card">
          <h3>Etika & Keamanan</h3>
          <p class="muted">Jangan melakukan scanning pada jaringan/host tanpa izin. Gunakan environment lab atau IP yang kamu pegang aksesnya. Hukum mengenai scanning berbeda per negara — bertanggung jawablah.</p>
        </div>

        <div class="card" style="margin-top:14px">
          <h3>Referensi Cepat</h3>
          <ul class="muted">
            <li><a href="https://nmap.org" target="_blank" rel="noopener">nmap.org — dokumentasi resmi</a></li>
            <li><a href="https://nmap.org/book/inst-windows.html" target="_blank" rel="noopener">Panduan instalasi</a></li>
            <li>Video sumber: NMAP Tutorial for Beginners (YouTube). :contentReference[oaicite:2]{index=2}</li>
          </ul>
        </div>

        <div class="card" style="margin-top:14px">
          <h3>Quiz Singkat (5 soal)</h3>
          <div id="quizArea">
            <div class="quiz-row">
              <div><strong>1.</strong> Perintah untuk mendeteksi versi layanan?</div>
              <div class="quiz-answer"><label><input type="radio" name="q0" value="0"> -sV</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q0" value="1"> -O</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q0" value="2"> -p</label></div>
            </div>

            <div class="quiz-row" style="margin-top:8px">
              <div><strong>2.</strong> Opsi yang melakukan "stealth SYN scan"?</div>
              <div class="quiz-answer"><label><input type="radio" name="q1" value="0"> -sS</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q1" value="1"> -A</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q1" value="2"> -T4</label></div>
            </div>

            <div class="quiz-row" style="margin-top:8px">
              <div><strong>3.</strong> Untuk menyimpan hasil scan ke file, gunakan?</div>
              <div class="quiz-answer"><label><input type="radio" name="q2" value="0"> -oA</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q2" value="1"> -sV</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q2" value="2"> -p</label></div>
            </div>

            <div class="quiz-row" style="margin-top:8px">
              <div><strong>4.</strong> Opsi untuk memindai port tertentu (mis. 22,80)?</div>
              <div class="quiz-answer"><label><input type="radio" name="q3" value="0"> -p 22,80</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q3" value="1"> -O</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q3" value="2"> -sS</label></div>
            </div>

            <div class="quiz-row" style="margin-top:8px">
              <div><strong>5.</strong> Perintah untuk melakukan "aggressive scan" (gabungan deteksi)?</div>
              <div class="quiz-answer"><label><input type="radio" name="q4" value="0"> -A</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q4" value="1"> -sV</label></div>
              <div class="quiz-answer"><label><input type="radio" name="q4" value="2"> -p-</label></div>
            </div>

            <button id="submitQuiz" class="btn">Kirim Jawaban</button>
            <div id="quizResult" aria-live="polite"></div>
          </div>
        </div>

        <div class="card" style="margin-top:14px">
          <h3>Catatan Penggunaan</h3>
          <p class="muted">Jika kamu ingin aku konversi seluruh langkah video menjadi dokumentasi langkah demi langkah (dengan screenshot / perintah persis), aku bisa — tapi aku butuh akses transcript atau izinmu untuk menyalin lebih detail dari video.</p>
        </div>
      </aside>
    </div>

    <div style="margin-top:18px" class="muted">Kembali ke <a href="../index.php">Beranda</a></div>
  </div>

  <script>
    // quiz logic (jawaban benar: q0:0, q1:0, q2:0, q3:0, q4:0)
    document.getElementById('submitQuiz').addEventListener('click', function() {
      const answers = [0,0,0,0,0];
      let score = 0;
      for (let i=0;i<answers.length;i++){
        const sel = document.querySelector('input[name="q'+i+'"]:checked');
        if (sel && parseInt(sel.value,10) === answers[i]) score++;
      }
      const total = answers.length;
      const percent = Math.round((score/total)*100);
      const result = document.getElementById('quizResult');
      result.textContent = 'Skor: ' + score + ' / ' + total + ' (' + percent + '%)';
    });
  </script>
</body>
</html>
