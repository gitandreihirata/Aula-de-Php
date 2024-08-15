<html>
    <body>
        <?php 
         /* 
         	Funções
			Função com Parâmetro e Com retorno de Valor
            Operacoes matematicas : Somar, subtrair, multiplicar,
            dividir

        */

        function somar($num1,$num2){
            $somar = $num1+$num2;
            return $somar;
        }
        
        function sub($num1,$num2){
            $sub = $num1-$num2;
            return $sub;
        }
        
        function mult($num1,$num2){
            $mult = $num1*$num2;
            return $mult;
        }
        
        function div($num1,$num2){
            $div = $num1/$num2;
            return $div;
        }
        
		$somar = somar(5,2);
        echo "Soma: $somar";
        echo "<br>";

        $sub = sub(5,2);
        echo "Sub: $sub";
        echo "<br>";

        $mult = mult(5,2);
        echo "Mult: $mult";
        echo "<br>";

        $div = div(5,2);
        echo "Div: $div";
        echo "<br>";



        
        ?>
    </body>
</html>