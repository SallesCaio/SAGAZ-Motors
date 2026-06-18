<?php
// includes/db.php
// Conexão com o banco de dados MySQL

$host = 'localhost';
$dbname = 'sagaz_motors';
$username = 'root';
$password = ''; // Sem senha (modo standalone)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
