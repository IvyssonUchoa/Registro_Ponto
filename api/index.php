<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Sistema de Ponto</h1>
            <p>Faça login para acessar sua conta</p>
        </div>

        <?php
            if ($_SESSION['no_autenticated']):
        ?>
            <div class="error-message" id="errorMessage">
                Usuário ou senha incorretos
            </div>
        <?php
            endif;
            $_SESSION['no_autenticated'] = false; // Limpa após exibir
        ?>

        <form id="loginForm" action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="login-btn" id="loginBtn">
                <span class="loading"></span>
                Entrar
            </button>
        </form>

        <div class="divider">
            <br>
            <span>ou</span>
        </div>

        <div class="signup-link">
            Não tem uma conta? <a href="create_account.php">Cadastre-se</a>
        </div>
    </div>
</body>
</html>