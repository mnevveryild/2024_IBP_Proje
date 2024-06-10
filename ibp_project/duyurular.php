<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$database = "javatpoint";

$conn = new mysqli($db_host, $db_user, $db_password);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Veritabanını oluştur
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === false) {
    die("Error creating a database: " . $conn->error);
}

// Veritabanını seç
$conn->select_db($database);

// Tabloyu oluştur
$sql = "CREATE TABLE IF NOT EXISTS duyurular (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    textt TEXT NOT NULL,
    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === false) {
    die("Error creating a table: " . $conn->error);
}
?>

