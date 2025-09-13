<?php
// Teste de conexão com banco de dados
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cetesi";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão realizada com sucesso!<br>";
    echo "Banco de dados: " . $dbname . "<br>";
    echo "Host: " . $servername . "<br>";
    echo "Usuário: " . $username . "<br>";
} catch(PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage() . "<br>";
}
?>