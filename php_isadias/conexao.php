<?php
// Definir o endereço do servidor onde o MySQL está sendo executado
$servername = "localhost";

// Nome do usuário do banco de dados MySQL
$username = "root";

// Senha do usuário do banco de dados MySQL
$password = "Senai@118";

// Nome do banco de dados que será usado na conexão
$dbname = "teste_conexao";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida!";
}
?>
