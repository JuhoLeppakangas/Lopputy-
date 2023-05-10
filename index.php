<?php 
$host = 'localhost';
$dbname = 'chinook';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Tietokantayhteys muodostettu onnistuneesti. <br>";
    return $conn;
} catch (PDOException $e) {
    echo "Tietokantayhteyden muodostaminen epäonnistui: " . $e->getMessage();
}
