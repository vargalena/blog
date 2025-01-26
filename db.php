<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "forum";


$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die(json_encode(["error" =>"Kapcsolat hiba: " . $conn->connect_error]));
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!$conn->query($sql)) {
    die(json_encode(["error" => "Adatbázis létrehozási hiba: " . $conn->error]));
}



$conn->select_db($dbname);


$sql = "
CREATE TABLE IF NOT EXISTS bejegy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    title VARCHAR(200) NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    die(json_encode(["error" => "Tábla létrehozási hiba: " . $conn->error]));
}


?>