<?php
session_start();
require_once "../config.php";

if (empty($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// handle delete (GET param ?delete_id=)
if (!empty($_GET['delete_id'])) {
    $id = (int) $_GET['delete_id'];
    $del = $pdo->prepare("DELETE FROM saran WHERE id = :id");
    $del->execute([':id' => $id]);
    header("Location: dashboard.php");
    exit;
}

// ambil data saran
$stmt = $pdo->query("SELECT * FROM saran ORDER BY created_at DESC");
$saranList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard Admin — Nakal Eksploitasi</title>
  <style>
    body{font-family:Inter, Arial, sans-serif;background:#0b0e10;color:#e6f9e6;margin:0;padding:28px}
    .wrap{max-width:1100px;margin:0 auto}
    header{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
    header h1{font-family:'Share Tech Mono', monospace;color:#39ff14;margin:0}
    .btn{background:#39ff14;color:#07110a;padding:8px 12px;border-radius:8px;text-decoration:none;font-weight:700}
    table{width:100%;border-collapse:collapse;margin-top:18px}
    th,td{padding:10px;border-bottom:1px solid rgba(255,255,255,0.06);text-align:left}
    th{background:rgba(255,255,255,0.03);color:#bfffb0}
    .small{font-size:12px;color:#9aa3a8}
    .actions a{margin-right:8px;color:#39ff14;text-decoration:none}
    .empty{padding:18px;background:rgba(255,255,255,0.02);border-radius:8px}
    .modal {position:fixed;inset:0;display:none;align-items:center;justify-content:center;background:rgba(0,0,0,0.7);z-index:999}
    .modal .card{background:#071014;padding:18px;border-radius:10px;max-width:720px;width:94%;color:#dff7d8}
    .close{float:right;color:#bfffb0;cursor:pointer}
    .delete{color:#ff6b6b}
  </style>
</head>
<body>
  <div class="wrap">
    <header>
      <h1>Dashboard Admin</h1>
      <div>
        <span class="small">Login: <?= htmlspecialchars($_SESSION['admin']) ?></span>
        &nbsp; &nbsp;
        <a class="btn" href="logout.php">Logout</a>
      </div>
    </header>

    <section>
      <h2>Daftar Saran</h2>
      <?php if (empty($saranList)): ?>
        <div class="empty">Belum ada saran masuk.</div>
      <?php else: ?>
        <table>
          <thead>
            <tr><th>ID</th><th>Nama</th><th>Email</th><th>Preview Pesan</th><th>IP</th><th>Waktu</th><th>Aksi</th></tr>
          </thead>
          <tbody>
            <?php foreach($saranList as $s): ?>
              <tr>
                <td><?= $s['id'] ?></td>
                <td><?= htmlspecialchars($s['nama']) ?></td>
                <td><a href="mailto:<?= htmlspecialchars($s['email']) ?>"><?= htmlspecialchars($s['email']) ?></a></td>
                <td><?= nl2br(htmlspecialchars(mb_strimwidth($s['pesan'],0,140,"..."))) ?></td>
                <td class="small"><?= htmlspecialchars($s['ip']) ?></td>
                <td class="small"><?= htmlspecialchars($s['created_at']) ?></td>
                <td class="actions">
                  <a href="#" onclick="openModal(<?= $s['id'] ?>)">Lihat</a>
                  <a class="delete" href="dashboard.php?delete_id=<?= $s['id'] ?>" onclick="return confirm('Hapus saran ini?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </section>
  </div>

  <!-- modal untuk lihat pesan penuh -->
  <div id="msgModal" class="modal">
    <div class="card">
      <div><span class="close" onclick="closeModal()">✕</span></div>
      <h3 id="m_nama"></h3>
      <p class="small" id="m_meta"></p>
      <hr>
      <div id="m_pesan" style="white-space:pre-wrap"></div>
    </div>
  </div>

  <script>
    // ambil data via AJAX kecil (fetch) ke endpoint yang akan kita buat: view_saran.php?id=...
    function openModal(id){
      fetch('view_saran.php?id='+encodeURIComponent(id))
        .then(r=>r.json())
        .then(data=>{
          if(data.success){
            document.getElementById('m_nama').textContent = data.nama;
            document.getElementById('m_meta').textContent = data.email + " • " + data.ip + " • " + data.created_at;
            document.getElementById('m_pesan').textContent = data.pesan;
            document.getElementById('msgModal').style.display = 'flex';
          } else {
            alert('Gagal memuat pesan');
          }
        }).catch(e=>{
          alert('Terjadi kesalahan');
        });
    }
    function closeModal(){ document.getElementById('msgModal').style.display = 'none'; }
  </script>
</body>
</html>
