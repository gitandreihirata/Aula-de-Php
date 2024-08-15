<html>
    <body>
        <?php 
           /* 
         	Funções
			Função sem Parâmetro e Com retorno de Valor
            Operacoes matematicas : Somar, subtrair, multiplicar,
            dividir
        */

        $num1 = 5;
        $num2 = 3; 

        function somar(){
        	global $num1;
            global $num2;
            $somar = $num1+$num2;
            return $somar;
        }

        function sub(){
        	global $num1;
            global $num2;
            $sub = $num1-$num2;
            return $sub;
        }

        function mult(){
        	global $num1;
            global $num2;
            $mult = $num1*$num2;
            return $mult;
        }

        function div(){
        	global $num1;
            global $num2;
            $div = $num1/$num2;
            return $div;
        }

        $somar = somar();
        echo "Soma: $somar";
        echo "<br>";

        $sub = sub();
        echo "Sub: $sub";
        echo "<br>";

        $mult = mult();
        echo "Mult: $mult";
        echo "<br>";

        $div = div();
        echo "Div: $div";
        echo "<br>";
            
        ?>
    </body>
</html>