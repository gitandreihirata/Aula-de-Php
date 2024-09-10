<html>
    <body>
        <?php 
         /* 
         	Pergunta: Escreva um código PHP 
            que verifica o tipo de usuário 
            (admin, editor, ou visitante) 
            e exibe uma mensagem apropriada
             para cada tipo de usuário. 
             O usuário é representado por
              uma variável.

        */

        $usuario_tipo = // insira o tipo de usuário aqui ('admin', 'editor', 'visitante')

if (/* condição para admin */) {
    echo "Acesso completo ao sistema.";
} elseif (/* condição para editor */) {
    echo "Acesso para editar conteúdo.";
} else {
    echo "Acesso apenas para visualizar.";
}
        
        ?>
    </body>
</html>