<html>
    <body>
        <?php 
         /* 
         	Função sem Parâmetro e com Retorno de Valor:
            Esta função não recebe parâmetros, mas retorna um valor que pode ser usado posteriormente.
        */
         	
        function obterSaudacao() {
            return "Olá, mundo!";
        }
        
        $mensagem = obterSaudacao(); // Chama a função e armazena "Olá, mundo!" em $mensagem
        echo $mensagem; // Imprime "Olá, mundo!"
        
        
            
        ?>
    </body>
</html>