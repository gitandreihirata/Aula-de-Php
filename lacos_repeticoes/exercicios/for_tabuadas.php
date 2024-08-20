<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
    
        /* 
         	Fazer todas as tabuadas usando uma unica funcao
             para gerar as tabuadas , usar com parametro e sem retorno de valor
            }

        */   

        function tabuada($num){
            for($i = 1; $i <= 10; $i++){
                $res = $num *$i;
                echo"$num x $i = $res</br>";
            }
        }

        for($g = 1; $g <= 10;$g++){
           tabuada($g);
           echo"</br>"; 
           echo"</br>";
           echo"</br>";
        }
        
            
        ?>
    </body>
</html>