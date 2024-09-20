<?php
include 'connection.php'; // Inclui o arquivo de conexão

// Verifica se o ID foi passado via GET
if (isset($_GET['idpessoa'])) {
    $idpessoa = $_GET['idpessoa'];

    // Consulta o registro pelo ID
    $sql = "SELECT * FROM pessoa WHERE idpessoa=:idpessoa";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idpessoa', $idpessoa);
    $stmt->execute();

    // Obtém o resultado da consulta
    $pessoa = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o registro existe
    if (!$pessoa) {
        echo "Pessoa não encontrada!";
        exit();
    }
} else {
    // Redireciona para a página principal se o ID não for passado
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form action="update_action.php" method="post">
        <input type="hidden" name="idpessoa" value="<?php echo $pessoa['idpessoa']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($pessoa['nome']); ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($pessoa['email']); ?>" required><br><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
