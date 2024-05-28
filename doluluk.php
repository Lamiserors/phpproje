<?php
include 'bas.php';
session_start();

$sql = "SELECT COUNT(*) as animal_count FROM animals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Sonucu al
    $row = $result->fetch_assoc();
    $animalCount = $row["animal_count"];
    // Doluluk oranını hesapla
    $capacity = 120; // Toplam kapasite
    $fillPercentage = ($animalCount / $capacity) * 100; // Yüzde olarak doluluk oranı
} else {
    $animalCount = 0;
    $fillPercentage = 0;
}

// Veritabanı bağlantısını kapat
$conn->close();

// JSON formatında veriyi döndür
echo json_encode(array("animalCount" => $animalCount, "fillPercentage" => number_format($fillPercentage, 2)));
?>
