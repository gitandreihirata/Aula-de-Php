<?php

include 'connection.php'; // Inclui o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    try {
        //Preparando SQL
        $sql = "INSERT INTO pessoa (nome, email) VALUES ('$nome', '$email')";
        if (!empty($conn)) {
            $stmt = $conn->prepare($sql);
        }

        //Passando parametros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);

        //Executando consulta
        $stmt->execute();

        //Redireciona index
        echo "Novo registro criado com sucesso";
        header("Location: index.php");
        exit();

    } catch (PDOException $e){
        echo "Erro ao inserir" . $e->getMessage();
    }
}
?>
