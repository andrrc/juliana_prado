<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'juliana_prado';
$charset = 'utf8mb4';  

$dsn = "mysql:host=$hostname;dbname=$dbname;charset=$charset";


$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO(dsn: $dsn, username: $username, password: $password, options: $options);
} catch (\PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}

?>