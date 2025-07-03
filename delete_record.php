<?php
session_start();
include 'includes/conexao.php';
include 'includes/verification_login.php';


if (empty($_POST['record_id'])){
    header('Location: dashboard.php');
    exit();
}

$record_id = $_POST['record_id'];

try{
    $stmt = $conexao->prepare('DELETE FROM registros WHERE id = :id');
    $stmt->bindValue(':id', $record_id, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: dashboard.php');
    exit();
}catch(throwable $e){
    // $_SESSION['error'] = 'Erro ao apagar o registro: ' . $e->getMessage();
    header('Location: dashboard.php');
    exit();
}
?>