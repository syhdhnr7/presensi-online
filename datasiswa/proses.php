<?php
require_once '../dbkoneksi.php';

// Retrieve the selected date from the form
$tanggal = $_POST['tanggal'];

// Data siswa
$siswa = [
    ['id' => 1, 'nama' => 'Aditia Pratama', 'nis' => '2023001'],
    ['id' => 2, 'nama' => 'Budi Santoso', 'nis' => '2023002'],
    ['id' => 3, 'nama' => 'Citra Dewi', 'nis' => '2023003'],
    ['id' => 4, 'nama' => 'Dewi Lestari', 'nis' => '2023004'],
    ['id' => 5, 'nama' => 'Eko Prasetyo', 'nis' => '2023005'],
    ['id' => 6, 'nama' => 'Fajar Nugroho', 'nis' => '2023006'],
    ['id' => 7, 'nama' => 'Gita Ramadhani', 'nis' => '2023007'],
    ['id' => 8, 'nama' => 'Hendra Wijaya', 'nis' => '2023008'],
    ['id' => 9, 'nama' => 'Indah Permata', 'nis' => '2023009'],
    ['id' => 10, 'nama' => 'Joko Susilo', 'nis' => '2023010']
];

// Menyimpan atau memperbarui data presensi
foreach ($siswa as $item) {
    $ket = $_POST['ket_' . $item['id']];
    $nama = $item['nama'];
    $nis = $item['nis'];

    // Cek apakah presensi untuk siswa ini pada tanggal ini sudah ada
    $sqlCek = "SELECT COUNT(*) as count FROM datasiswa WHERE nis = ? AND tanggal = ?";
    $stCek = $dbh->prepare($sqlCek);
    $stCek->execute([$nis, $tanggal]);
    $resultCek = $stCek->fetch();

    if ($resultCek['count'] > 0) {
        // Data presensi sudah ada, lakukan update
        $sql = "UPDATE datasiswa SET ket = ? WHERE nis = ? AND tanggal = ?";
        $st = $dbh->prepare($sql);
        $st->execute([$ket, $nis, $tanggal]);
    } else {
        // Data presensi belum ada, lakukan insert
        $sql = "INSERT INTO datasiswa (nama, nis, tanggal, ket) VALUES (?, ?, ?, ?)";
        $st = $dbh->prepare($sql);
        $st->execute([$nama, $nis, $tanggal, $ket]);
    }
}

header('location:../index.php');
?>
