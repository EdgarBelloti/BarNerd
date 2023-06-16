<?php
$dbhost = '54.94.33.196';
$dbname = 'barnerd';
$dbuser = 'nerdrei';
$dbpass = 'O86nVv6kj80xggW';

try {
    // Conexão com o banco de dados usando PDO
    $dsn = "pgsql:host=$dbhost;dbname=$dbname";
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Tratamento de erro na conexão com o banco de dados
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    exit();
}

