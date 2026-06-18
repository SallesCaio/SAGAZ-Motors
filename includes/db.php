<?php
// includes/db.php
// Conexão com o banco de dados MySQL
// Suporta variáveis de ambiente do Render/PlanetScale e fallback local

$host = getenv('DB_HOST') ?: '127.0.0.1';
$port = getenv('DB_PORT') ?: '3308';
$dbname = getenv('DB_NAME') ?: 'sagaz_motors';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: '';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
