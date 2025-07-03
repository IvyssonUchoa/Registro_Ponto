<?php

// Cria o arquivo de banco
$dbPath = 'database/database.db';
$db = new PDO('sqlite:' . $dbPath);

//Cria a tabela de usuários
$db->exec("CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user TEXT NOT NULL,
    email TEXT NOT NULL,
    password TEXT NOT NULL
)");

// Cria a tabela de registros
$db->exec("CREATE TABLE IF NOT EXISTS registros (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    tipo TEXT NOT NULL,
    data_hora DATETIME DEFAULT CURRENT_TIMESTAMP,
    observacao TEXT,
    FOREIGN KEY (user_id) REFERENCES usuarios(id)
)");

// Inserir um usuário padrão
$db->exec("INSERT INTO usuarios (user, email, password) VALUES ('admin', 'admin@example.com', 'admin')");

// Encerra o programa
echo "Banco de dados criado com sucesso!";

?>