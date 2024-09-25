<?php
include 'connection.php'; // Inclui o arquivo de conexão

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    try {
        $sql = "SELECT * FROM pessoa WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $pessoa = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se a pessoa existe e se a senha está correta
        if ($pessoa && password_verify($senha, $pessoa['senha'])) {
            // Sessão para manter a pessoa logado
            $_SESSION['idpessoa'] = $pessoa['idpessoa'];
            $_SESSION['nome'] = $pessoa['nome'];
            echo "Login realizado com sucesso!";
            header("Location: dashboard.php"); // Redireciona para a página principal
            exit();
        } else {
            echo "Email ou senha incorretos!";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Pessoa</title>
</head>
<body>
    <h2>Login de Pessoa</h2>
    <form action="login.php" method="post">
        Email: <input type="email" name="email" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
