<?php
// includes/db.php
// Conexão com o banco de dados MySQL - InfinityFree

$host = 'sql211.infinityfree.com';
$dbname = 'if0_42215895_sagaz_motors';
$username = 'if0_42215895';
$password = 'salles6990';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
