<?php
// Mendapatkan nilai input dari form
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Koneksi ke database
$host = 'localhost';
$db   = 'user';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Koneksi database gagal: ' . $e->getMessage();
  exit;
}

// Validasi login
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password']) && $user['role'] === $role) {
  echo 'Berhasil login sebagai ' . $role;
  // Lakukan tindakan yang diinginkan setelah login
} else {
  echo 'Gagal login';
}
?>
