<?php
include 'bas.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_animal'])) {
    $name = $_POST['name']; 
    $species = $_POST['species'];
    $age = $_POST['age'];
    $diet = $_POST['diet'];
    $habitat = $_POST['habitat'];

    // Tüm gerekli alanların doldurulduğunu kontrol et
    if (!empty($name) && !empty($species) && !empty($age) && !empty($diet) && !empty($habitat)) {
        $sql = "INSERT INTO animals (name, species, age, diet, habitat) 
                VALUES ('$name', '$species', $age, '$diet', '$habitat')";
        $conn->query($sql);
        header("Location: hayvanlarin_listesi.php");
    } else {
        $error_message = "Tüm alanların doldurulması zorunludur.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Hayvan Ekle</title>
    <style>
        body {
            background-color: #e8f5e9; /* Açık yeşil arka plan rengi */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
        }
        h2 {
            color: #2e7d32; /* Daha koyu yeşil renk */
        }
        .btn-primary, .btn-secondary {
            background-color: #4caf50; /* Buton için yeşil renk */
            border: none;
        }
        .btn-primary:hover, .btn-secondary:hover {
            background-color: #388e3c; /* Hover efekti için daha koyu yeşil */
        }
        .btn-secondary {
            margin-top: 10px;
        }
        .form-group label {
            color: #2e7d32;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hayvan Ekle</h2>
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"><?= $error_message ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">İsim:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="species">Tür:</label>
                <input type="text" class="form-control" id="species" name="species" required>
            </div>
            <div class="form-group">
                <label for="age">Yaş:</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="diet">Beslenme:</label>
                <textarea class="form-control" id="diet" name="diet" required></textarea>
            </div>
            <div class="form-group">
                <label for="habitat">Yaşam Alanı:</label>
                <textarea class="form-control" id="habitat" name="habitat" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="add_animal">Hayvan Ekle</button>
        </form>
        <a href="hayvanlarin_listesi.php" class="btn btn-secondary">Hayvanların Listesine Geri Dön</a>
    </div>
</body>
</html>
