<?php
include 'connection.php'; // Inclui o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idpessoa = $_POST["idpessoa"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    try {
        // Preparando a consulta SQL para atualizar os dados
        $sql = "UPDATE pessoa SET nome=:nome, email=:email WHERE idpessoa=:idpessoa";
        $stmt = $conn->prepare($sql);

        // Associando os parâmetros da consulta SQL aos valores enviados pelo formulário
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':idpessoa', $idpessoa);

        // Executando a consulta
        $stmt->execute();

        // Redireciona para a página principal após a atualização
        echo "Registro atualizado com sucesso";
        header("Location: index.php");
        exit();
        
    } catch(PDOException $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
    }
}
?>
