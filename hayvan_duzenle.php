<?php
include 'bas.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE id=$id";
    $result = $conn->query($sql);
    $animal = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_animal'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $species = $_POST['species'];
    $age = $_POST['age'];
    $diet = $_POST['diet'];
    $habitat = $_POST['habitat'];

    $sql = "UPDATE animals SET name='$name', species='$species', age=$age, diet='$diet', habitat='$habitat' WHERE id=$id";
    $conn->query($sql);
    header("Location: hayvanlarin_listesi.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Hayvanı Düzenle</title>
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
        .form-group label {
            color: #2e7d32;
        }
        .btn-secondary {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hayvanı Düzenle</h2>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= htmlspecialchars($animal['id']) ?>">
            <div class="form-group">
                <label for="name">İsim:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($animal['name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="species">Tür:</label>
                <input type="text" class="form-control" id="species" name="species" value="<?= htmlspecialchars($animal['species']) ?>" required>
            </div>
            <div class="form-group">
                <label for="age">Yaş:</label>
                <input type="number" class="form-control" id="age" name="age" value="<?= htmlspecialchars($animal['age']) ?>" required>
            </div>
            <div class="form-group">
                <label for="diet">Beslenme:</label>
                <textarea class="form-control" id="diet" name="diet" required><?= htmlspecialchars($animal['diet']) ?></textarea>
            </div>
            <div class="form-group">
                <label for="habitat">Yaşam Alanı:</label>
                <textarea class="form-control" id="habitat" name="habitat" required><?= htmlspecialchars($animal['habitat']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="update_animal">Hayvanı Güncelle</button>
        </form>
        <a href="hayvanlarin_listesi.php" class="btn btn-secondary">Hayvanların Listesine Geri Dön</a>
    </div>
</body>
</html>
