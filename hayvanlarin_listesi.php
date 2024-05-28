<?php
include 'bas.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM animals ORDER BY species, name";
$result = $conn->query($sql);

$animals_by_species = [];
while ($row = $result->fetch_assoc()) {
    $species = $row['species'];
    if (!isset($animals_by_species[$species])) {
        $animals_by_species[$species] = [];
    }
    $animals_by_species[$species][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Hayvanların Listesi</title>
    <style>
        body {
            background: linear-gradient(to bottom,#98FB98 , #006400);
            color: white;
        }

        #back-button {
            background-color: #f44336; /* Red */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
        }

        #back-button:hover {
            background-color: #d32f2f;
        }

        .container {
            background-color: rgba(34,139,34); /* Siyah arka plan, şeffaf */
            padding: 20px;
            border-radius: 10px;
        }

        table th, table td {
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hayvanların Listesi</h2>
        <a href="hayvan_ekle.php" class="btn btn-primary mb-3">Hayvan Ekle</a>
        
        <?php foreach ($animals_by_species as $species => $animals): ?>
            <h3><?= htmlspecialchars($species) ?></h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Diet</th>
                        <th>Habitat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($animals as $animal): ?>
                    <tr>
                        <td><?= htmlspecialchars($animal['name']) ?></td>
                        <td><?= htmlspecialchars($animal['age']) ?></td>
                        <td><?= htmlspecialchars($animal['diet']) ?></td>
                        <td><?= htmlspecialchars($animal['habitat']) ?></td>
                        <td>
                            <a href="hayvan_duzenle.php?id=<?= $animal['id'] ?>" class="btn btn-warning">Düzenle</a>
                            <a href="hayvan_sil.php?id=<?= $animal['id'] ?>" class="btn btn-danger" onclick="return confirm('Hayvanı silmek istediğinize emin misiniz?');">Sil</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>

        <!-- Geri Al butonu -->
        <button id="back-button" onclick="window.location.href='index.html'">Ana Sayfaya Dön</button>
    </div>
</body>
</html>
