<?php
require_once 'dbkoneksi.php';
$sql = "SELECT * FROM presensi";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRESENSI SMP BINA BANGSA</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            padding-top: 5px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 800px;
            text-align: center;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            overflow-x: auto;
        }

        table thead th {
            background-color: #1F90CE;
            color: white;
            text-align: left;
            padding: 10px;
            border: 1px solid #1F90CE;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        table tbody td {
            padding: 10px;
            border: 1px solid black;
        }

        .action-buttons a {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 5px;
            background-color: #1F90CE;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .action-buttons a:hover {
            background-color: #2670B9;
        }

        .button-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .button-link:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>PRESENSI SMP BINA BANGSA</h2>
        <table id="presensi-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Materi</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor  = 1;
                foreach ($rs as $row) {
                ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $row['materi'] ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td class="action-buttons">
                            <a class="button-form" href="datasiswa/form.php">
                                <i class="fas fa-fw fa-list"></i>&nbsp; Input Presensi</a>
                            <a class="button-form" href="presensi/edit.php?id=<?= $row['id'] ?>">
                                <i class="fas fa-fw fa-edit"></i>&nbsp; Edit</a>
                            <a class="button-form" href="presensi/view.php?tanggal=<?= $row['tanggal'] ?>">
                                <i class="fas fa-fw fa-eye"></i>&nbsp; View</a>
                            <a class="button-form" href="presensi/delete.php?iddel=<?= $row['id'] ?>" onclick="if(!confirm('Anda Yakin Ingin Menghapus Data Produk <?= $row['id'] ?>?')) {return false}">
                                <i class="fas fa-fw fa-trash"></i>&nbsp; Delete</a>
                        </td>
                    </tr>
                <?php
                    $nomor++;
                }
                ?>
            </tbody>
        </table>
        <a href="presensi/form.php" class="button-link">Tambah Presensi</a>
    </div>
</body>

</html>