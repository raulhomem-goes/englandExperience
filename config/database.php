<?php

$host = "localhost";
$dbName = "inglesver";
$userName = "root";
$password = "";

try {
    $conexao = new PDO("mysql:host=$host; dbname=$dbName", $userName, $password);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
