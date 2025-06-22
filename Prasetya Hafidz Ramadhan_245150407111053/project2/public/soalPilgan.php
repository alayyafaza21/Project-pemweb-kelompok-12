<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilgan</title>
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
            <?php foreach ($opsi as $key => $value): ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jawaban" id="opsi_<?php echo $key; ?>" value="<?php echo $key; ?>" required>
                    <label class="form-check-label" for="opsi_<?php echo $key; ?>">
                        <?php echo $key . ". " . $value; ?>
                    </label>
                </div>
            <?php endforeach; ?>
            <button class="btn btn-primary w-100 mt-3" type="submit">Selanjutnya</button>
        </form>
    </div>
</body>
</html>