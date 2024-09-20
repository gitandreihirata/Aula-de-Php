# Sistema de Login com PHP e Hash de Senha

Este é um projeto simples de sistema de login em PHP que utiliza o algoritmo `password_hash()` para codificação de senha e `password_verify()` para verificação de login. O projeto também inclui funcionalidades de registro de usuário, login e logout com interface básica em HTML.

## Funcionalidades

- **Registro de Usuário**: Permite o cadastro de novos usuários com nome, email e senha. A senha é criptografada antes de ser salva no banco de dados.
- **Login de Usuário**: Valida o email e a senha do usuário, comparando a senha digitada com o hash armazenado.
- **Logout de Usuário**: Encerra a sessão do usuário e redireciona para a página de login.
- **Segurança**: As senhas são criptografadas usando `password_hash()` (que por padrão usa o algoritmo bcrypt), garantindo uma camada adicional de segurança.
- **Autenticação de Sessão**: Acesso à página principal (dashboard) só é permitido para usuários autenticados.

## Pré-requisitos

- **PHP 7.0+**
- **MySQL**
- **Servidor Web** (Apache ou Nginx)

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu_usuario/seu_repositorio.git
   ```

2. Navegue até o diretório do projeto:
   ```bash
   cd seu_repositorio
   ```

3. Crie o banco de dados MySQL e a tabela de usuários:
   ```sql
   CREATE DATABASE exercicio;
   USE exercicio;

   CREATE TABLE usuarios (
       id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       nome VARCHAR(50) NOT NULL,
       email VARCHAR(50) NOT NULL UNIQUE,
       senha VARCHAR(255) NOT NULL
   );
   ```

4. Configure o arquivo `connection.php` com as credenciais do banco de dados:
   ```php
   <?php
   $username = 'seu_usuario';
   $password = 'sua_senha';
   $dbname = 'exercicio';

   try {
       $conn = new PDO('mysql:host=localhost;dbname=' . $dbname, $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
       echo 'ERROR: ' . $e->getMessage();
   }
   ?>
   ```

## Estrutura do Projeto

- `register.php`: Página para registrar novos usuários.
- `login.php`: Página de login para usuários já registrados.
- `dashboard.php`: Página inicial, acessível apenas após login.
- `logout.php`: Finaliza a sessão do usuário e redireciona para a página de login.
- `connection.php`: Arquivo de configuração da conexão com o banco de dados.
- `README.md`: Documentação do projeto.

## Fluxo de Funcionamento

1. **Registro**: O usuário acessa a página de registro (`register.php`) e preenche um formulário com nome, email e senha. A senha é criptografada usando `password_hash()` antes de ser salva no banco de dados.

2. **Login**: O usuário insere suas credenciais na página de login (`login.php`). A senha fornecida é verificada usando `password_verify()`, comparando-a com o hash armazenado no banco de dados. Se as credenciais forem válidas, o usuário é redirecionado para a página `dashboard.php`.

3. **Sessão**: Durante o login, uma sessão é iniciada para manter o estado de autenticação do usuário. Somente usuários logados podem acessar a `dashboard.php`.

4. **Logout**: O usuário pode encerrar a sessão a qualquer momento clicando no botão de logout na página principal. A sessão é destruída e o usuário é redirecionado para a página de login.

## Uso

1. Acesse `register.php` para criar uma conta de usuário.
2. Use `login.php` para autenticar-se com email e senha.
3. Acesse a página principal (`dashboard.php`) após efetuar login com sucesso.
4. Faça logout usando o link fornecido na página `dashboard.php`.

## Contribuição

Se quiser contribuir com melhorias ou novas funcionalidades, fique à vontade para abrir uma _issue_ ou _pull request_.

## Licença

Este projeto é de código aberto e está licenciado sob a licença MIT.
