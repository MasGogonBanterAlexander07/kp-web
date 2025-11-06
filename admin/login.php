<?php
session_start();
require_once "../config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $error = "";

    if ($username === '' || $password === '') {
        $error = "Username dan password wajib diisi!";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Username atau password salah!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Admin</title>
</head>
<body>
  <h2>Login Admin</h2>

  <?php if (!empty($error)) : ?>
      <p style="color:red;"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <?php if (!empty($_SESSION['success'])) : ?>
      <p style="color:green;"><?= htmlspecialchars($_SESSION['success']) ?></p>
      <?php unset($_SESSION['success']); ?>
  <?php endif; ?>

  <form method="post">
      <label>Username</label><br>
      <input type="text" name="username" required><br><br>

      <label>Password</label><br>
      <input type="password" name="password" required><br><br>

      <button type="submit">Login</button>
  </form>

  <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</body>
</html>
