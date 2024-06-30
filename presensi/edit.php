<?php
require_once '../dbkoneksi.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "SELECT * FROM presensi WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $presensi = $stmt->fetch();

    if (!$presensi) {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Presensi</title>
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

        .form-group {
            margin-bottom: 20px;
            text-align: left;
            display: flex;
            align-items: center;
        }

        .form-group label {
            flex: 0 0 100px; /* Adjust width of label */
            margin-right: 10px; /* Adjust spacing between label and input */
            color: #333;
        }

        .form-group input[type="text"],
        .form-group input[type="date"] {
            flex: 1; /* Take up remaining space */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: 100%; /* Fill remaining space */
        }

        .button-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-align: center;
            cursor: pointer;
        }

        .button-link:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Presensi</h2>
        <form method="POST" action="proses.php">
            <input type="hidden" name="idedit" value="<?= $presensi['id'] ?>">
            <input type="hidden" name="proses" value="Update">
            <div class="form-group">
                <label for="materi">Materi :</label>
                <input type="text" id="materi" name="materi" value="<?= $presensi['materi'] ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal :</label>
                <input type="date" id="tanggal" name="tanggal" value="<?= $presensi['tanggal'] ?>" required>
            </div>
            <div>
                <button class="button-link" type="submit">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
