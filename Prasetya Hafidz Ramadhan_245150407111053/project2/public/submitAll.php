<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submit Semua Jawaban</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="soal.css">
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="phone p-4 text-center">
        <h1 class="mb-3">EDUKIDS</h1>
        <div class="alert alert-info mb-4">
            Semua soal sudah dikerjakan.<br>
            Silakan klik tombol di bawah untuk submit semua jawaban Anda.
        </div>
        <form method="POST" action="index.php?url=soal/submitAll">
            <button class="btn btn-success w-100" type="submit">Submit Semua Jawaban</button>
        </form>
    </div>
</body>
</html>