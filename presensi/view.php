<?php
require_once '../dbkoneksi.php';

if (isset($_GET['tanggal'])) {
    $tanggal = $_GET['tanggal'];
    $sql = "SELECT * FROM datasiswa WHERE tanggal = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$tanggal]);
    $presensi = $stmt->fetchAll();
} else {
    echo "Tanggal tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Presensi</title>
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

        .button-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-align: center;
            margin-top: 20px;
        }

        .button-link:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Presensi Pada Tanggal <?= htmlspecialchars($tanggal) ?></h2>
        <table id="presensi-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Nomor Induk Siswa</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($presensi) {
                    $nomor  = 1;
                    foreach ($presensi as $row) {
                        ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['nis']) ?></td>
                            <td><?= htmlspecialchars($row['ket']) ?></td>
                        </tr>
                        <?php
                        $nomor++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4">Tidak ada data presensi untuk tanggal tersebut.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <a href="../index.php" class="button-link">Back</a>
    </div>
</body>

</html>
