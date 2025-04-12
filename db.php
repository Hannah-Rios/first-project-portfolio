<?php
// Defina as variáveis de conexão com o banco de dados
$servername = "localhost";
$username = "root"; // ou o nome de usuário do seu banco
$password = ""; // ou a senha do seu banco
$dbname = "portfolio"; // nome do banco de dados

// Crie a conexão usando PDO
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Defina o modo de erro do PDO para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
    exit;
}
?>