<?php
include 'connection.php'; // Inclui o arquivo de conexão

// Verifica se o ID foi passado via GET
if (isset($_GET['idpessoa'])) {
    $idpessoa = $_GET['idpessoa'];

    try {
        // Preparando a consulta SQL para deletar o registro
        $sql = "DELETE FROM pessoa WHERE idpessoa=:idpessoa";
        $stmt = $conn->prepare($sql);

        // Associando o parâmetro da consulta SQL ao valor passado via GET
        $stmt->bindParam(':idpessoa', $idpessoa);

        // Executando a consulta
        $stmt->execute();

        // Redireciona para a página principal após a exclusão
        echo "Registro excluído com sucesso";
        header("Location: index.php");
        exit();
        
    } catch(PDOException $e) {
        echo "Erro ao excluir: " . $e->getMessage();
    }
} else {
    // Se o ID não foi passado, redireciona para a página principal
    header("Location: index.php");
    exit();
}
?>
