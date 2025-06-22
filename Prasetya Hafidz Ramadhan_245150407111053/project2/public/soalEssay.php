<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Essay</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="soal.css">
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="phone p-4">
        <h1 class="text-center mb-3">EDUKIDS</h1>
        <div class="pertanyaan bg-light p-3 border rounded-3 mb-3">
            <?php echo $pertanyaan; ?>
        </div>
        <form method="POST">
            <textarea class="form-control jawaban mb-3" name="jawaban" rows="4" required></textarea>
            <button class="btn btn-primary w-100" type="submit">Selanjutnya</button>
        </form>
    </div>
</body>
</html>