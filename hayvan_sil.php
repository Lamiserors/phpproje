<?php
include 'bas.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM animals WHERE id=$id";
    $conn->query($sql);
    header("Location: hayvanlarin_listesi.php");
}
?>
