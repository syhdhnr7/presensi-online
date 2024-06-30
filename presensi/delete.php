<?php
require_once '../dbkoneksi.php';
$conn = mysqli_connect('localhost', 'root', '', 'presensi_online');

if(isset($_GET['iddel']) && !empty($_GET['iddel'])) {
    $id = $_GET['iddel'];
    $query = "DELETE FROM presensi WHERE id = $id";
    mysqli_query($conn, $query);
    header("Location:../index.php");
    exit;
}
?>

<a class="btn btn-primary" href="delete.php?iddel=<?=$row['id']?>"
onclick="if(!confirm('Anda Yakin Ingin Menghapus Data Presensi <?=$row['id']?>?')) {return false}">Delete</a>