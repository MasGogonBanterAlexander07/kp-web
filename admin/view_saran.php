<?php
// admin/view_saran.php
require_once "../config.php";
header('Content-Type: application/json');

$id = (int) ($_GET['id'] ?? 0);
if ($id <= 0) {
    echo json_encode(['success' => false]);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM saran WHERE id = :id");
$stmt->execute([':id' => $id]);
$s = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$s) {
    echo json_encode(['success' => false]);
    exit;
}

echo json_encode([
    'success' => true,
    'nama' => $s['nama'],
    'email' => $s['email'],
    'pesan' => $s['pesan'],
    'ip' => $s['ip'],
    'created_at' => $s['created_at'],
]);
