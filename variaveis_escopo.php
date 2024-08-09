<html>
    <body>
        <?php 
         /* 
			Escopo de Variáveis
            As variáveis em PHP podem ter escopo global, local ou 					estático:
			Global: Disponível em todo o script.
			Local: Disponível apenas dentro de uma função.
			Estático: Mantém o valor entre chamadas de função.
        */
         	$x = 5; // global
            
            function minhaFuncao(){
   
                $x += 10;
   
            }
            minhaFuncao();
            echo $x;
            
            echo "<br>";
            
            function minhaFuncao2(){
            	global $x;
                $x += 10;
   
            }
            
            minhaFuncao2();
            echo $x;
           
            
        ?>
    </body>
</html>