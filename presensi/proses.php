<?php
require_once '../dbkoneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi dan bersihkan input
    $_materi = htmlspecialchars($_POST['materi']);
    $_tanggal = htmlspecialchars($_POST['tanggal']);
    $_proses = htmlspecialchars($_POST['proses']);
    $_idedit = $_POST['idedit'] ?? null;

    if ($_proses == "Simpan") {
        // Periksa apakah tanggal sudah ada sebelumnya
        $sql_check = "SELECT * FROM presensi WHERE tanggal = :tanggal";
        $stmt_check = $dbh->prepare($sql_check);
        $stmt_check->bindParam(':tanggal', $_tanggal);
        $stmt_check->execute();
        $row_count = $stmt_check->rowCount();

        if ($row_count > 0) {
            echo "Tanggal ini telah tersedia, silahkan tambahkan tanggal lain!";
        } else {
            // Insert data baru jika tanggal belum ada
            $sql_insert = "INSERT INTO presensi (materi, tanggal) VALUES (:materi, :tanggal)";
            $stmt_insert = $dbh->prepare($sql_insert);
            $stmt_insert->bindParam(':materi', $_materi);
            $stmt_insert->bindParam(':tanggal', $_tanggal);

            if ($stmt_insert->execute()) {
                header('location:../index.php');
                exit;
            } else {
                echo "Gagal menyimpan data presensi.";
            }
        }
    } elseif ($_proses == "Update" && $_idedit !== null) {
        // Update data jika idedit valid
        $sql_update = "UPDATE presensi SET materi = :materi, tanggal = :tanggal WHERE id = :id";
        $stmt_update = $dbh->prepare($sql_update);
        $stmt_update->bindParam(':materi', $_materi);
        $stmt_update->bindParam(':tanggal', $_tanggal);
        $stmt_update->bindParam(':id', $_idedit);

        if ($stmt_update->execute()) {
            header('location:../index.php');
            exit;
        } else {
            echo "Gagal mengupdate data presensi.";
        }
    } else {
        echo "Data tidak valid atau parameter edit tidak ditemukan.";
    }
    exit;
}
?>
