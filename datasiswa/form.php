<?php
require_once '../dbkoneksi.php';

// Ambil semua data tanggal dari tabel presensi
$sql = "SELECT tanggal FROM presensi";
$stmt = $dbh->query($sql);
$tanggals = $stmt->fetchAll(PDO::FETCH_COLUMN);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Presensi</title>
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
            border: none;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .button-link:hover {
            background-color: #218838;
        }

        form textarea,
        form input[type="text"],
        form input[type="number"],
        form input[type="date"],
        form select {
            display: inline-block;
            width: 75%;
            padding: 4px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            vertical-align: top;
        }

        .date-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .date-container label {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Input Presensi</h1>
        <form id="presensiForm" action="proses.php" method="post">
            <div class="date-container">
                <label for="tanggal">Tanggal:</label>
                <select id="tanggal" name="tanggal" onchange="setTanggal()">
                    <?php foreach ($tanggals as $tanggal) : ?>
                        <option value="<?= $tanggal ?>"><?= $tanggal ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Nomor Induk Siswa</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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

                    foreach ($siswa as $item) :
                    ?>
                        <tr>
                            <td><?= $item['id']; ?></td>
                            <td><?= $item['nama']; ?></td>
                            <td><?= $item['nis']; ?></td>
                            <td>
                                <select name="ket_<?php echo $item['id']; ?>" title="Ket untuk <?php echo $item['nama']; ?>">
                                    <option value="Hadir">Hadir</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Alpha">Alpha</option>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button class="button-link" type="submit">Submit</button>
        </form>
    </div>

    <script>
        function setTanggal() {
            var select = document.getElementById('tanggal');
            var tanggalInput = select.value;
        }
    </script>
</body>

</html>