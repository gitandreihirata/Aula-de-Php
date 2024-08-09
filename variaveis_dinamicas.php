<html>
    <body>
        <?php     
            /* 
			Variáveis Dinâmicas
            Onde o nome da variável é determinado a partir 
            de outra variável
            */
            //$nome = "João";
            $var = "nome";
            $$var = "João";
            echo $nome;
           //Imprimi João        
        ?>
    </body>
</html>