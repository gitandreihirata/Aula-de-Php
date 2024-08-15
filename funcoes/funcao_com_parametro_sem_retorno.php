<html>
    <body>
        <?php 
         /* 
         	Função com Parâmetro e sem Retorno de Valor:
            Esta função aceita um ou mais parâmetros que podem ser utilizados dentro da função, mas não retorna nenhum valor.
        */
         	
        function saudacaoPersonalizada($nome) {
            echo "Olá, " . $nome . "!";
        }
        
        saudacaoPersonalizada("Carlos"); // Chama a função e imprime "Olá, Carlos!"
 
        ?>
    </body>
</html>