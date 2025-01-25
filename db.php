<?php
$servername = "localhost"; // vagy az adatbázis szerver címe
$username = "root"; // az adatbázis felhasználónév
$password = ""; // az adatbázis jelszó
$dbname = "forum";

// Kapcsolat létrehozása
$conn = new mysqli($servername, $username, $password, $dbname);

// Kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Kapcsolat hiba: " . $conn->connect_error);
}
?>