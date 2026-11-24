# ToDo-List

Aplicação web de lista de tarefas com autenticação de usuários e persistência de dados em banco relacional, desenvolvida como trabalho da disciplina de Desenvolvimento Web.

🔗 **Acesse o projeto online:** [https://predo.gamer.free](https://predo.gamer.free)

## Funcionalidades

- Cadastro e login de usuários com controle de sessão (`$_SESSION`)
- Adição, conclusão e exclusão de tarefas vinculadas a cada usuário
- Filtragem de tarefas por status (**Todas**, **Concluídas** e **Não Concluídas**)
- Validação de campos vazios e confirmação de senha

## Tecnologias Utilizadas

- **Back-end:** PHP 8+
- **Banco de Dados:** MySQL
- **ORM:** RedBeanPHP (`rb.php`)
- **Front-end:** HTML5 e CSS3

## Como executar localmente

### Pré-requisitos
- Servidor web local com suporte a PHP e MySQL (ex: **XAMPP**, **WAMP** ou **Laragon**)

### Passo a passo

1. **Clone ou baixe este repositório** para a pasta pública do seu servidor local (ex: `htdocs/` no XAMPP):

    git clone https://github.com/pedroduraesd/ToDo-List.git

2. **Inicie os serviços** do **Apache** e do **MySQL** no painel do seu servidor local.

3. **Crie o banco de dados:**
   - Acesse o **phpMyAdmin** (`http://localhost/phpmyadmin`).
   - Crie um novo banco de dados vazio (ex: `todo_db`).
   - *Nota: Não é necessário importar arquivo `.sql`. O RedBeanPHP está em modo fluido e criará as tabelas (`usuario` e `tarefa`) automaticamente no primeiro uso.*

4. **Configure a conexão com o banco:**
   - Nos arquivos PHP que realizam conexão (`index.php`, `autenticardados.php`, `processardados.php`, `inclusao.php`, `atualizar.php` e `exclusao.php`), ajuste a linha do `R::setup` com as suas credenciais locais:

    require_once 'classes/rb.php';
    R::setup('mysql:host=127.0.0.1;dbname=todo_db', 'root', '');

5. **Acesse no navegador:**
   - Abra `http://localhost/ToDo-List/ToDo/login.php`, crie uma conta em **Cadastrar** e comece a usar.
