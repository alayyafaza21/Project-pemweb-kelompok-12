<!-- halaman tempat guru buat soalnya -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kuis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            max-width: 480px;
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 20px;
            background-color: white;
        }
        .option-button {
            background-color: #FFC107; 
            color: black;
            border: none;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            width: 100%;
            text-align: center;
            font-size: 1.1rem;
            font-weight: 500;
        }
        .action-button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            border: none;
        }
        .green-bg {
            background-color: #28a745;
            color: white;
        }
        .red-bg {
            background-color: #dc3545;
            color: white;
        }
        .blue-btn {
            background-color: #007bff; 
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 1.1rem;
        }
        .editable-header {
            min-height: 1.2em; 
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2 class="text-center mb-4 editable-header" contenteditable="true">Apa nama lain katak</h2>

        <button class="option-button">cicak</button>
        <button class="option-button">kodok</button>
        <button class="option-button">babi</button>
        <button class="option-button">kucing</button>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <button class="action-button green-bg">+</button>
            <button class="action-button red-bg">🗑️</button>
        </div>

        <div class="text-center mt-3">
              <a href="view.php" class="btn btn-light border rounded-circle btn-nav">Done</a>
        </div>
    </div>
</body>
</html>

