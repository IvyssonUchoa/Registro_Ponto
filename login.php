<?php
include 'includes/conexao.php';

session_start();

// Garante que o usuário não acesse essa página antes de enviar o formulário
if(empty($_POST['username']) || empty($_POST['password'])) {
    header('Location: index.php');
    exit();
}

// Pega o usuário e senha do formulário
$usuario = trim($_POST['username']);
$senha = trim($_POST['password']);

// Puxa o usuário e senha passados no formulário
$stmt = $conexao->prepare('SELECT id, user FROM usuarios where user = :usuario AND password = :senha');
$stmt->bindValue(':usuario', $usuario, SQLITE3_TEXT);
$stmt->bindValue(':senha', $senha, SQLITE3_TEXT);

// Executa a query e  passa pro result
$result = $stmt->execute();

// Puxa os resultados da query
$row = $result->fetchArray(SQLITE3_ASSOC);

if($row){
    $_SESSION['usuario'] = $row['user'];
    $_SESSION['usuario_id'] = $row['id'];

    $_SESSION['error'] = null;
    $_SESSION['success'] = false;

    header('Location: dashboard.php');
    exit();
} else {
    $_SESSION['no_autenticated'] = true;

    header('Location: index.php');
    exit();
}

?>