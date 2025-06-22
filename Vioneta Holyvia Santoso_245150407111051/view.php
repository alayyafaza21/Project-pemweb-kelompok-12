<!-- ini halaman pertama btw -->


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
        }
        .card-container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            max-width: 500px;
            margin: 50px auto 100px auto; 
        }
        .header-area { 
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-box { 
            border: 1px solid #e0e0e0; 
            border-radius: 25px;
            padding: 5px 15px;
            flex-grow: 1;
            display: flex;
            align-items: center;
        }
        .search-box input {
            border: none;
            outline: none;
            flex-grow: 1;
            padding: 5px;
            background: transparent;
        }
        .profile-box { 
            border: 1px solid #e0e0e0; 
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 10px;
        }
        .profile-box i { 
            color: #000; 
            font-size: 1.2rem;
        }

        .judulygy {
            color: #000; 
        }

        .class-button {
            background-color: #FFC107; 
            border-color: #FFC107;
            color: #000!important; 
            padding: 15px;
            text-decoration: none; 
            font-weight: bold; 
            border-radius: 0.375rem; 
        }
        .class-button:hover {
             filter: brightness(90%); 
             color: #000!important;
        }

        .bottom-nav-bar { 
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            border-top: 1px solid #e9ecef;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px 0;
            box-shadow: 0 -4px 8px rgba(0,0,0,0.05);
        }
        .nav-button { 
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #6c757d;
            background-color: #f8f9fa; 
            border: 1px solid #dee2e6; 
            border-radius: 50%; 
        }
     
      
    </style>
</head>

<body class="bg-light">
    <div class="card-container">
        <div class="header-area">
            <div class="search-box">
                <input type="text" placeholder="Search...">
            </div>
            <div class="profile-box">
                <i class="fas fa-user"></i>
            </div>
        </div>

        <h1 class="mb-4 text-center judulygy">Daftar Kelas</h1>

        <div class="d-grid gap-3">
            <?php
            if (isset($classes) && is_array($classes) && !empty($classes)) {
                foreach ($classes as $class):
            ?>
                    <a href="index.php?action=showDetail&class=<?= urlencode($class) ?>"
                       class="btn class-button">
                        <?= htmlspecialchars($class) ?>
                    </a>
            <?php
                endforeach;
            } else {
                echo "<p class='text-center'>Soal berhasil dibuat</p>";
            }
            ?>
        </div>
    </div>

    <div class="bottom-nav-bar">
        <a href="index.php" class="nav-button">
            <i class="fas fa-home-alt"></i>
        </a>
        <a href="new.php" class="nav-button">
            <i class="fas fa-file-alt"></i>
        </a>
        <a href="" class="nav-button">
            <i class="fas fa-user-alt"></i>
        </a>
    </div>
</body>
</html>