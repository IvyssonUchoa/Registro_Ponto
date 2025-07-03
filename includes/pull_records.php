<?php
    include 'conexao.php';
    include 'verification_login.php';

    session_start();

    $stmt = $conexao->prepare('SELECT * FROM registros WHERE user_id = :user_id ORDER BY data_hora DESC LIMIT 10');
    $stmt->bindValue(':user_id', $_SESSION['usuario_id'], SQLITE3_INTEGER);
    $result = $stmt->execute();

    $records = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $records[] = $row;
    }
?>