<?php
include 'connection.php'; // Inclui o arquivo de conexão

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    try {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o usuário existe e se a senha está correta
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Sessão para manter o usuário logado
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_name'] = $usuario['nome'];
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
    <title>Login de Usuário</title>
</head>
<body>
    <h2>Login de Usuário</h2>
    <form action="login.php" method="post">
        Email: <input type="email" name="email" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
