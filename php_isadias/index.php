<?php
$servername = "localhost";
$username = "root";
$password = "Senai@118";
$dbname = "cinema_db";

// Conexão
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Criação do banco se não existir
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Criação da tabela se não existir
$conn->query("CREATE TABLE IF NOT EXISTS diretores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    nacionalidade VARCHAR(255),
    filme_mais_famoso VARCHAR(255)
)");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Cadastro de Diretores de Cinema</title>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 8px;
  text-align: left;
}
h1 {
  font-family: Arial, sans-serif;
}
form {
  margin-bottom: 20px;
}
input[type="text"], input[type="submit"] {
  margin: 5px 0;
}
.btn {
  text-decoration: none;
  color: blue;
  margin-right: 10px;
}
.btn:hover {
  text-decoration: underline;
}
</style>
</head>
<body>

<h1>🎥 Cadastro de Diretores de Cinema</h1>

<div class="form-box">
    <div class="form-container">
        <form method="POST">
            <label>Nome do Diretor:</label><br>
            <input type="text" name="nome" required><br>
            <label>Nacionalidade:</label><br>
            <input type="text" name="nacionalidade" required><br>
            <label>Filme Mais Famoso:</label><br>
            <input type="text" name="filme_mais_famoso" required><br>
            <input type="submit" value="Adicionar Diretor">
        </form>
    </div>
</div>

<?php
// Inserção de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $nacionalidade = $_POST["nacionalidade"];
    $filme = $_POST["filme_mais_famoso"];

    if ($nome && $nacionalidade && $filme) {
        $sqlinsert = "INSERT INTO diretores (nome, nacionalidade, filme_mais_famoso)
                      VALUES ('$nome', '$nacionalidade', '$filme')";
        $conn->query($sqlinsert);
    }
}

// Listagem de diretores
echo "<h3>Diretores Cadastrados</h3>";
$result = $conn->query("SELECT * FROM diretores");

if ($result->num_rows > 0) {
    echo "<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Nacionalidade</th>
        <th>Filme Mais Famoso</th>
        <th>Ações</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row["id"]}</td>
                <td>{$row["nome"]}</td>
                <td>{$row["nacionalidade"]}</td>
                <td>{$row["filme_mais_famoso"]}</td>
                <td>
                    <a class='btn' href='update.php?id={$row["id"]}'>Editar</a>
                    <a class='btn' href='delete.php?id={$row["id"]}' onclick='return confirm(\"Deseja excluir este diretor?\")'>Excluir</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhum diretor cadastrado.</p>";
}

// Contagem total
$resCount = $conn->query("SELECT COUNT(*) AS total FROM diretores");
$total = $resCount->fetch_assoc()['total'];
echo "<p><strong>Total de diretores cadastrados:</strong> $total</p>";

$conn->close();
?>
</body>
</html>
