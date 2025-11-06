<?php
session_start();
require_once "../config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm  = trim($_POST['confirm'] ?? '');

    $errors = [];

    if ($username === '' || $password === '') {
        $errors[] = "Username dan password wajib diisi.";
    }
    if ($password !== $confirm) {
        $errors[] = "Password dan konfirmasi tidak sama.";
    }

    $stmt = $pdo->prepare("SELECT id FROM admin WHERE username = :username");
    $stmt->execute([':username' => $username]);
    if ($stmt->fetch()) {
        $errors[] = "Username sudah dipakai.";
    }

    if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO admin (username, password) VALUES (:username, :password)");
        $stmt->execute([
            ':username' => $username,
            ':password' => $hash
        ]);
        $_SESSION['success'] = "Akun berhasil dibuat. Silakan login.";
        header("Location: login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register Admin</title>
</head>
<body>
  <h2>Buat Akun Admin</h2>
  <?php if (!empty($errors)) : ?>
    <ul style="color:red;">
      <?php foreach($errors as $e) echo "<li>$e</li>"; ?>
    </ul>
  <?php endif; ?>

  <form method="post">
      <label>Username</label><br>
      <input type="text" name="username" required><br><br>

      <label>Password</label><br>
      <input type="password" name="password" required><br><br>

      <label>Konfirmasi Password</label><br>
      <input type="password" name="confirm" required><br><br>

      <button type="submit">Register</button>
  </form>

  <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</body>
</html>
