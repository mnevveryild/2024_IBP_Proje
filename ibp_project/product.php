
<?php
// product.php dosyasındaki bağlantı kodu
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$database = "javatpoint";

$conn = new mysqli($db_host, $db_user, $db_password, $database);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}


$conn->select_db($database);


$sql = "CREATE TABLE IF NOT EXISTS new (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    pr_name VARCHAR(50) NOT NULL,
    stock VARCHAR(50) NOT NULL,
    contents VARCHAR(50) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    pr_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === false) {
    die("Error creating a table: " . $conn->error);
}
?>
