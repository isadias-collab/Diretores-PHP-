<?php
include 'conexao.php'; // Inclui o arquivo de conexão

if (isset($_GET['id'])) { // Verifica se o ID foi passado
    $id = $_GET['id']; // Recebe o ID
    $sql = "SELECT * FROM diretores WHERE id=$id"; // Consulta o usuário
    $result = $conn->query($sql); // Executa a consulta
    $usuario = $result->fetch_assoc(); // Obtém os dados do usuário
}

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome']; // Recebe o novo nome
    $email = $_POST['email']; // Recebe o novo email
    $sql = "UPDATE diretores SET nome='$nome', email='$email' WHERE id=$id"; // Prepara a atualização

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redireciona se a atualização for bem-sucedida
    } else {
        echo "Erro: " . $conn->error; // Mostra erro, se houver
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Usuário</title>
</head>
<body>
    <h1>Atualizar Usuário</h1>
    <form action="" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required>
        <input type="submit" value="Atualizar">
    </form>
    <a href="index.php">Cancelar</a> <!-- Link para voltar -->
</body>
</html>
