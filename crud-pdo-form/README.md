# Sistema de Gerenciamento de Registros com PHP

Este projeto é uma aplicação simples de gerenciamento de registros com funcionalidades de **Listagem**, **Edição**, **Exclusão** e **Inserção** de dados usando **PHP** e **MySQL**. A interface do sistema exibe uma tabela com os registros e fornece botões para editar ou deletar cada registro. Também há um botão para adicionar um novo registro, que redireciona o usuário para uma página com um formulário de inserção.

## Funcionalidades

- **Listagem de Registros**: Exibe todos os registros em uma tabela.
- **Edição de Registros**: Permite a atualização de um registro específico.
- **Exclusão de Registros**: Remove um registro específico da base de dados.
- **Inserção de Registros**: Adiciona novos registros por meio de um formulário.
- **Uso de PDO**: Todas as interações com o banco de dados são feitas com `PDO` (PHP Data Objects), proporcionando segurança e flexibilidade.

## Estrutura do Projeto

- `index.php`: Página principal que lista os registros em uma tabela e fornece botões para editar e deletar cada registro. Também contém um botão para adicionar novos registros.
- `create.php`: Página com um formulário para inserir novos registros.
- `insert.php`: Script responsável por inserir os dados no banco de dados após o preenchimento do formulário.
- `update.php`: Página para editar um registro específico.
- `update_action.php`: Script responsável por atualizar o registro no banco de dados.
- `delete.php`: Script que exclui um registro específico.
- `connection.php`: Arquivo de conexão com o banco de dados.

## Procedimentos

### 1. Listagem de Registros (`index.php`)

A página principal exibe todos os registros da tabela `usuarios`. Ao lado de cada registro, existem botões de **Editar** e **Deletar**. Há também um botão para adicionar novos registros, que redireciona para a página `create.php`.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD com PHP e MySQL</title>
</head>
<body>
    <h1>Lista de Usuários</h1>

    <!-- Botão para inserir novo registro -->
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
            include 'connection.php'; // Inclui o arquivo de conexão

            $sql = "SELECT id, nome, email FROM usuarios";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["id"]). "</td>";
                    echo "<td>" . htmlspecialchars($row["nome"]). "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]). "</td>";
                    echo "<td>
                            <a href='update.php?id=".$row['id']."'><button>Editar</button></a>
                            <a href='delete.php?id=".$row['id']."' onclick='return confirm(\"Tem certeza que deseja deletar este usuário?\")'><button>Deletar</button></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum registro encontrado</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
```

### 2. Inserção de Registros (`create.php` e `insert.php`)

- A página `create.php` exibe um formulário para inserir um novo registro.
- O script `insert.php` processa os dados do formulário e insere o novo registro no banco de dados.

#### `create.php`

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Novo Usuário</title>
</head>
<body>
    <h2>Inserir Novo Usuário</h2>
    <form action="insert.php" method="post">
        Nome: <input type="text" name="nome" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <input type="submit" value="Inserir">
    </form>
</body>
</html>
```

#### `insert.php`

```php
<?php
include 'connection.php'; // Inclui o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        echo "Novo registro criado com sucesso";
        header("Location: index.php");
    } else {
        echo "Erro ao inserir o registro.";
    }
}
?>
```

### 3. Edição de Registros (`update.php` e `update_action.php`)

- A página `update.php` exibe um formulário pré-preenchido com os dados do registro selecionado para edição.
- O script `update_action.php` processa a atualização no banco de dados.

#### `update.php`

```php
<?php
include 'connection.php'; // Inclui o arquivo de conexão

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form action="update_action.php" method="post">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required><br><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
```

#### `update_action.php`

```php
<?php
include 'connection.php'; // Inclui o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "UPDATE usuarios SET nome=:nome, email=:email WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Registro atualizado com sucesso";
        header("Location: index.php");
    } else {
        echo "Erro ao atualizar o registro.";
    }
}
?>
```

### 4. Exclusão de Registros (`delete.php`)

O script `delete.php` exclui um registro específico com base no ID passado pela URL.

```php
<?php
include 'connection.php'; // Inclui o arquivo de conexão

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM usuarios WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Registro excluído com sucesso";
        header("Location: index.php");
    } else {
        echo "Erro ao excluir o registro.";
    }
}
?>
```

## Contribuição

Se quiser contribuir com melhorias ou novas funcionalidades, sinta-se à vontade para abrir uma _issue_ ou _pull request_.

## Licença

Este projeto é de código aberto e está licenciado sob a licença MIT.
