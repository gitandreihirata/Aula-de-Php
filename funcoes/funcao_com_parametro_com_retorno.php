<html>
    <body>
        <?php 
         /* 
         	Função com Parâmetro e com Retorno de Valor:
            Esta função aceita parâmetros e retorna um valor baseado nesses parâmetros.
        */
         	
        function soma($a, $b) {
            return $a + $b;
        }
        
        $resultado = soma(5, 10); // Chama a função com 5 e 10 como argumentos
        echo $resultado; // Imprime 15
        
        
        ?>
    </body>
</html>