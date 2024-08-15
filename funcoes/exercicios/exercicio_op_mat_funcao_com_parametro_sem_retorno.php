<html>
    <body>
        <?php 
         /* 
         	Funções
			Função com Parâmetro e Sem retorno de Valor
            Operacoes matematicas : Somar, subtrair, multiplicar,
            dividir

        */

        function somar($num1,$num2){
            $somar = $num1+$num2;
            echo "Soma: $somar";
        }
        
        function sub($num1,$num2){
            $sub = $num1-$num2;
            echo "Sub: $sub";
        }
        
        function mult($num1,$num2){
            $sub = $num1*$num2;
            echo "Mult: $sub";
        }
        
        function div($num1,$num2){
            $sub = $num1/$num2;
            echo "Div: $sub";
        }
        
		somar(5,2);
        echo "<br>";
        sub(5,2);	
        echo "<br>";
        mult(5,2);
        echo "<br>";
		div(5,2);
        
        ?>
    </body>
</html>