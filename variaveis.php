<html>
    <body>
        <?php 
         /* Tipos de Dados:
            As variáveis em PHP podem conter diferentes tipos de dados:
            String: Cadeias de texto.
            Integer: Números inteiros.
            Float (ou double): Números decimais.
            Boolean: Valores verdadeiros ou falsos (true ou false).
            Array: Conjunto de valores.
            Object: Instância de uma classe.
            NULL: Representa uma variável sem valor.

        */
            $nome = "João"; // String
            $idade = 30; // Integer
            $salario = 1500.50; // Float
            $casado = true; // Boolean
            $frutas = array("Maçã", "Banana", "Laranja"); // Array
            
            echo $nome;
            echo "</br>";
            echo $idade;
            echo "</br>";
            echo $salario;
            echo "</br>";
            echo $casado;
            echo "</br>";
            foreach ($frutas as $fruta){
            	echo($fruta."<br>");
            } 
        ?>
    </body>
</html>