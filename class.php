<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container text-center mt-5">
        <h1 class="mb-4"><?= htmlspecialchars($classData['name']) ?></h1>

        <div class="d-grid gap-4">

            <div class="btn btn-warning p-3 text-decoration-none text-dark fw-bold">
                Daftar Siswa <?= htmlspecialchars(implode(", ", $classData['siswa'])) ?>
            </div>

            <?php foreach ($classData['tugas'] as $task): ?>
                <a href="tugas.php?id=<?= $classData['id'] ?>&tugas=<?= $task['id'] ?>" 
                   class="btn btn-warning p-3 text-decoration-none text-dark fw-bold">
                    <?= htmlspecialchars($task['judul']) ?>
                </a>
            <?php endforeach; ?>

        </div>
    </div>

    <button class="btn btn-dark rounded-circle position-fixed bottom-0 end-0 m-4 btn-lg">+</button>
</body>
</html>
