# Sistema de Registro de Ponto

Este é um aplicativo web de registro de ponto desenvolvido em **PHP**, **HTML** e **CSS**, utilizando **SQLite** como banco de dados. O sistema permite que usuários cadastrem-se, façam login, registrem entradas e saídas com data, horário e observação, visualizem as últimas batidas e excluam registros de ponto.

## Funcionalidades

- **Cadastro de Usuário:** Crie uma conta informando nome, e-mail e senha.
- **Login:** Acesse o sistema com seu usuário e senha.
- **Registrar Ponto:** Marque entrada ou saída, informando data, horário e uma observação opcional.
- **Listagem Visual:** Veja as 10 últimas batidas de ponto de forma visual e organizada.
- **Excluir Batidas:** Remova registros de ponto indesejados.

## Tecnologias Utilizadas

- **Backend:** PHP
- **Frontend:** HTML5, CSS3
- **Banco de Dados:** SQLite

## Estrutura do Projeto

```
/
├── create_account.php
├── dashboard.php
├── delete_record.php
├── index.php
├── login.php
├── register.php
├── submit_record.php
├── css/
│   ├── create_account.css
│   ├── dashboard.css
│   └── login.css
├── database/
│   └── create_db.php
└── includes/
    ├── conexao.php
    ├── logout.php
    ├── pull_records.php
    └── verification_login.php
```

## Como Executar

1. **Clone o repositório ou baixe os arquivos.**
2. **Crie o banco de dados:**
   - Execute o script [`database/create_db.php`](database/create_db.php) uma vez para criar as tabelas e um usuário padrão.
3. **Configure o servidor local:**
   - Certifique-se de que a extensão SQLite3 está habilitada no PHP.
   - Utilize um servidor, como o embutido do PHP, executando o comando abaixo:
    ``` 
    php -S localhost:8080
    ```
4. **Acesse o sistema:**
   - Abra o navegador e acesse `http://localhost/`.

## Usuário Padrão

Após criar o banco, um usuário padrão estará disponível:
- **Usuário:** admin
- **Senha:** admin

## Observações

- O sistema utiliza sessões para autenticação.
- As senhas são armazenadas em texto simples (apenas para fins didáticos). Para produção, utilize hash de senha.
- O layout é responsivo para dispositivos móveis.