<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/create_account.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <h1>Cadastro</h1>
            <p>Crie sua conta</p>
        </div>

        <?php
            if($_SESSION['success_register']){
                echo "
                    <div class='success-message' id='successMessage'>
                        Cadastro realizado com sucesso! ✓
                    </div>
                ";
            }
            
            $_SESSION['success_register'] = false;
        ?>

        <?php
            if(!empty($_SESSION['error_register'])){
                echo "
                    <div class='erro-message' id='successMessage'>
                        {$_SESSION['error_register']} ❌
                    </div>
                ";
            }

            $_SESSION['error_register'] = null;
        ?>

        <form id="registrationForm" action="register.php" method="POST">
            <div class="form-group">
                <label for="name">Nome de Usuário</label>
                <input type="text" id="name" name="user" required minlength="3" placeholder="Digite seu nome completo">
                <div class="error-message" id="nameError">Nome deve ter pelo menos 3 caracteres</div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Digite seu email">
                <div class="error-message" id="emailError">Digite um email válido</div>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required minlength="6" placeholder="Digite sua senha">
                <div class="error-message" id="passwordError">Senha deve ter pelo menos 6 caracteres</div>
            </div>

            <button type="submit" class="submit-btn">Criar Conta</button>

        </form>
        <br>
        <a href="index.php" class="back-btn">
            Voltar ao Login
        </a>
    </div>

    <script src="script.js"></script>
</body>
</html>