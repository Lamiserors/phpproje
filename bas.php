<?php
$servername = "localhost";
$username = "dbusr21360859012";
$password = "UzO1vL31wlSS";
$dbname = "dbstorage21360859012";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
