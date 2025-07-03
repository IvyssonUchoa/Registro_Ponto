<?php

session_start();
// Destroy todas as variáveis de sessão
session_destroy();

// Retorna ao início do site
header("Location: ../index.php");
?>