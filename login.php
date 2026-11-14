<?php
session_start();
include 'koneksi.php';

// Jika sudah login, langsung arahkan ke index.php
if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['btn_login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // Verifikasi password yang di-hash
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
            
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Pendaftaran Siswa</title>
</head>
<body>

    <h2>Login Administrator</h2>

    <?php if (isset($error)) : ?>
        <p style="color: red;">Username atau Password salah!</p>
    <?php endif; ?>

    <form action="" method="POST">
        <div>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required>
        </div>
        <br>

        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required>
        </div>
        <br>

        <button type="submit" name="btn_login">Login</button>
    </form>

    <p><small>Akun default: <b>admin</b> / <b>admin123</b></small></p>

</body>
</html>