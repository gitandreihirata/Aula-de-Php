<html>
    <body>
        <?php 
         /* 
         	Funções
			Função sem Parâmetro e Sem retorno de Valor
            Operacoes matematicas : Somar, subtrair, multiplicar,
            dividir
        */

        $num1 = 5;
        $num2 = 3; 

        function somar(){
        	global $num1;
            global $num2;
            $somar = $num1+$num2;
            echo "Soma: $somar";

        }
        
        function sub(){
        	global $num1;
            global $num2;
            $sub = $num1-$num2;
            echo "Sub: $sub";
        }
        
        function mult(){
        	global $num1;
            global $num2;
            $sub = $num1*$num2;
            echo "Mult: $sub";
        }
        
        function div(){
        	global $num1;
            global $num2;
            $sub = $num1/$num2;
            echo "Div: $sub";
        }
        
		somar();
        echo "<br>";
        sub();	
        echo "<br>";
        mult();
        echo "<br>";
		div();
        
        ?>
    </body>
</html>