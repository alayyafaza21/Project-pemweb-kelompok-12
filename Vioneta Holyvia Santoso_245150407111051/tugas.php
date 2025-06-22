<!-- hal contoh soal yang udh diupload -->

<?php
require_once 'modelgabungan.php';
$tugasId = $_GET['tugas'] ?? 0;
$model = new ClassModel();
$tugas = $model->Coso($tugasId);

if (!$tugas) {
    echo "<h2>Tugas kosong.</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <tittle></tittle>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1><?= htmlspecialchars($tugas['judul']) ?></h1>
        <div class="mt-4 border rounded p-4 bg-white">
            <p><?= nl2br(htmlspecialchars($tugas['soal'])) ?></p>
        </div>
        <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Kelas</a>
    </div>
</body>
</html>
