<?php
include 'includes/conexao.php';
session_start();

if(empty($_POST['user']) || empty($_POST['email']) || empty($_POST['password'])) {
    header('Location: create_account.php');
    exit();
}

// Pega os valores passados no formulário
$user = trim($_POST['user']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Verifica se o usuário já existe
$stmt = $conexao->prepare('SELECT id FROM usuarios WHERE user = :usuario');
$stmt->bindValue(':usuario', $user, SQLITE3_TEXT);

$result = $stmt->execute();
$row = $result->fetchArray(SQLITE3_ASSOC);

if($row) {
    // Usuário já existe
    $_SESSION['error_register'] = 'Usuário já cadastrado';
    $_SESSION['success_register'] = false;

    header('Location: create_account.php');
    exit();
}

try{
    // Usuário não existe, inserindo novo usuário
    $stmt = $conexao->prepare('INSERT INTO usuarios (user, email, password) VALUES (:usuario, :email, :senha)');
    $stmt->bindValue(':usuario', $user, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':senha', $password, SQLITE3_TEXT);

    $stmt->execute();

    // Alerta sucesso ao registrar
    $_SESSION['error_register'] = null;
    $_SESSION['success_register'] = true;

    // Redireciona para a página de dashboard
    header('Location: create_account.php');
    exit();

}catch (Throwable $e) {
    // Captura erros fatais e exceções
    $_SESSION['error_register'] = $e->getMessage();
    $_SESSION['success_register'] = false;

    // ======= LEMBRAR: Guardar em log os erros =========

    header('Location: create_account.php');
    exit();
}



?>