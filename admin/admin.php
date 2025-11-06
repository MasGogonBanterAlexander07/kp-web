<?php
// admin.php
// Ganti kredensial sesuai save_quiz.php
$DB_HOST = 'localhost';
$DB_NAME = 'nakaleks_db';
$DB_USER = 'db_user';
$DB_PASS = 'db_pass';

// ********* SIMPLE AUTH (opsional) *********
// Ganti USER/PASS sebelum digunakan
$ADMIN_USER = 'admin';
$ADMIN_PASS = 'password123'; // ganti kuat sebelum dipakai

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] !== $ADMIN_USER || $_SERVER['PHP_AUTH_PW'] !== $ADMIN_PASS) {
    header('WWW-Authenticate: Basic realm="Admin Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Unauthorized';
    exit;
}
// ******************************************

try {
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("DB error");
}

// Export CSV?
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    $stmt = $pdo->query("SELECT * FROM quiz_results ORDER BY created_at DESC");
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=quiz_results.csv');
    $out = fopen('php://output', 'w');
    fputcsv($out, ['id','quiz_key','nama','score','total','detail','ip_addr','user_agent','created_at']);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        fputcsv($out, [
          $row['id'],$row['quiz_key'],$row['nama'],$row['score'],$row['total'],
          $row['detail'],$row['ip_addr'],$row['user_agent'],$row['created_at']
        ]);
    }
    exit;
}

// Pagination sederhana
$page = max(1, intval($_GET['page'] ?? 1));
$perPage = 50;
$offset = ($page - 1) * $perPage;

$totalStmt = $pdo->query("SELECT COUNT(*) FROM quiz_results");
$totalRows = (int)$totalStmt->fetchColumn();
$pages = ceil($totalRows / $perPage);

$stmt = $pdo->prepare("SELECT * FROM quiz_results ORDER BY created_at DESC LIMIT :lim OFFSET :off");
$stmt->bindValue(':lim', $perPage, PDO::PARAM_INT);
$stmt->bindValue(':off', $offset, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin - Quiz Results</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;padding:18px;background:#f6f6f6}
    table{border-collapse:collapse;width:100%}
    th,td{border:1px solid #ddd;padding:8px;font-size:13px}
    th{background:#333;color:#fff}
    .top{display:flex;gap:10px;align-items:center;margin-bottom:12px}
  </style>
</head>
<body>
  <div class="top">
    <h2>Quiz Results (Total: <?= $totalRows ?>)</h2>
    <a href="?export=csv">Export CSV</a>
  </div>

  <table>
    <thead>
      <tr><th>ID</th><th>Quiz</th><th>Nama</th><th>Score</th><th>Total</th><th>Detail</th><th>IP</th><th>User Agent</th><th>Created</th></tr>
    </thead>
    <tbody>
      <?php foreach($rows as $r): ?>
      <tr>
        <td><?= htmlspecialchars($r['id']) ?></td>
        <td><?= htmlspecialchars($r['quiz_key']) ?></td>
        <td><?= htmlspecialchars($r['nama']) ?></td>
        <td><?= htmlspecialchars($r['score']) ?></td>
        <td><?= htmlspecialchars($r['total']) ?></td>
        <td style="max-width:300px;white-space:pre-wrap;word-break:break-word"><?= htmlspecialchars($r['detail']) ?></td>
        <td><?= htmlspecialchars($r['ip_addr']) ?></td>
        <td><?= htmlspecialchars($r['user_agent']) ?></td>
        <td><?= htmlspecialchars($r['created_at']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div style="margin-top:12px">
    <?php if ($page>1): ?><a href="?page=<?= $page-1 ?>">Prev</a><?php endif; ?>
    <?php if ($page<$pages): ?> <a href="?page=<?= $page+1 ?>">Next</a><?php endif; ?>
  </div>
</body>
</html>
