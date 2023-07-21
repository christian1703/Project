<!DOCTYPE html>
<html>
<head>
  <title>Halaman Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <form method="post" action="login.php">
      <h2>Masuk ke Akun</h2>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <select name="role" required>
        <option value="">Pilih Peran</option>
        <option value="admin">Admin</option>
        <option value="client">Client</option>
      </select>
      <button type="submit">Masuk</button>
    </form>
  </div>
</body>
</html>
