<?php
include 'includes/conexao.php';
include 'includes/verification_login.php';

// Garante que o usuário não acesse essa página antes de enviar o formulário
if(empty($_POST['tipo']) || empty($_POST['dataHora'])) {
    header('Location: index.php');
    exit();
}

// Pega o tipo de entrada, data e hora e observação do formulário
$tipo = trim($_POST['tipo']);
$dataHora = trim($_POST['dataHora']);
$observacao = isset($_POST['observacao']) ? trim($_POST['observacao']) : '';

try{
    // INsere o registro no banco de dados
    $stmt = $conexao->prepare('INSERT INTO registros (user_id, tipo, data_hora, observacao) VALUES (:user_id, :tipo, :data_hora, :observacao)');
    $stmt->bindValue(':user_id', $_SESSION['usuario_id'], SQLITE3_INTEGER);
    $stmt->bindValue(':tipo', $tipo, SQLITE3_TEXT);
    $stmt->bindValue(':data_hora', $dataHora, SQLITE3_TEXT);
    $stmt->bindValue(':observacao', $observacao, SQLITE3_TEXT);
    $stmt->execute();

    // Alerta sucesso ao registrar
    $_SESSION['success'] = true;

    // Redireciona para a página de dashboard
    header('Location: dashboard.php');
    exit();

}catch (Throwable $e){ //Captura erros fatais e exceções
    $_SESSION['error'] = $e->getMessage();
    $_SESSION['success'] = false;

    // ======= LEMBRAR: Guardar em log os erros =========

    header('Location: dashboard.php');
    exit();
}
?>