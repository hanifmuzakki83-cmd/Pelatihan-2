<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

// Ambil semua data siswa
$query_siswa = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id DESC");
$total_siswa = mysqli_num_rows($query_siswa);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Data Siswa</title>
</head>
<body>

    <h2>Dashboard Administrator</h2>
    <p>
        Halo, <b><?= htmlspecialchars($_SESSION['nama_lengkap']); ?></b> | 
        <a href="index.php" target="_blank">Lihat Form Pendaftaran</a> | 
        <a href="ganti_password.php">Ganti Password</a> | 
        <a href="logout.php" onclick="return confirm('Yakin ingin keluar dari halaman admin?')">Logout</a>
    </p>
    <hr>

    <h3>Ringkasan Data</h3>
    <p>Total Siswa Terdaftar: <b><?= $total_siswa; ?></b> orang</p>

    <h3>Daftar Siswa Terdaftar</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Paket Belajar</th>
                <th>Waktu Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($total_siswa > 0) : ?>
                <?php 
                $no = 1;
                while ($row = mysqli_fetch_assoc($query_siswa)) : 
                    $tgl_lahir = date('d-m-Y', strtotime($row['tanggal_lahir']));
                    $tgl_daftar = date('d-m-Y H:i', strtotime($row['tanggal_daftar']));
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['alamat']); ?></td>
                    <td><?= htmlspecialchars($row['tempat_lahir']); ?></td>
                    <td><?= $tgl_lahir; ?></td>
                    <td><?= htmlspecialchars($row['paket_belajar']); ?></td>
                    <td><?= $tgl_daftar; ?></td>
                    <td>
                        <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data <?= htmlspecialchars($row['nama']); ?>?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8" align="center">Belum ada data siswa yang mendaftar.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>