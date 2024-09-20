<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <style>

        table{
            width: 50%;
            border-collapse: collapse;
        }

        table th,td{
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

    </style>


</head>
<body>

<H1>Listagem de Usuários</H1>

<a href="create.php"><button>Incluir Novo Usuário</button></a>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include 'connection.php';
    if (isset($conn)) {

        $sql = "SELECT idPessoa,nome,email FROM pessoa";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            // Output dos dados de cada linha
            foreach ($result as $row) {
                echo  "<tr>";
                echo  "<td>" . $row["idPessoa"]. "</td>";
                echo  "<td>" . $row["nome"]. "</td>";
                echo  "<td>" . $row["email"]. "</td>";

                echo  "<td>
                            <a href='update.php?idpessoa=".$row['idPessoa']."'>
                                <button>Editar</button>
                           </a>
                         
                           <a href='delete.php?idpessoa=".$row['idPessoa']."'
                              onclick ='return confirm(\"Deseja deletar?\")'>
                                <button>Deletar</button>
                           </a> 
                        </td>";
                
                echo  "</tr>";
            }
        }else{
            echo "<tr> Nenhum registro encontrado. </tr>";
        }
    }
    ?>
    </tbody>
</table>
</body>
</html>