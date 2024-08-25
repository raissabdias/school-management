<h2 align="center">School Management</h2>
<p>
    Uma aplicação para gestão de matrículas de alunos em turmas.
</p>

### :hammer: Funcionalidades do projeto

- `Autenticação`: somente usuários cadastrados podem acessar as funcionalidades
- `Alunos`: cadastro, edição e exclusão de alunos
- `Turmas`: cadastro, edição e exclusão de turmas
- `Matrículas`: associação de um aluno com uma turma

### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Git](https://git-scm.com), [MySQL](https://www.mysql.com/), e a versão mais recente do [PHP](https://www.php.net/downloads.php).

### 🎲 Rodando a aplicação

```bash
# Clone este repositório
$ git clone https://github.com/raissabdias/school-management.git

# Acesse a pasta do projeto no terminal/cmd
$ cd school-management

# Atualize as variáveis de ambiente com os dados do seu banco de dados local
$ nano .env

# Rode as queries indicadas dentro da pasta database/dump.sql (criar banco, tabelas e seeders)

# Acesse a pasta public
$ cd public

# Inicie o servidor PHP
$ php -S localhost:8000

# O servidor inciará na porta:8000 - acesse <http://localhost:8000>
```

### 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

- [PHP](https://www.php.net/downloads.php)
- [MySQL](https://www.mysql.com/)
- [Bootstrap](https://getbootstrap.com/)
- [DataTables](https://datatables.net/)
