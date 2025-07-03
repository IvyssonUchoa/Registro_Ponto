<?php
    include 'includes/verification_login.php';
    include 'includes/pull_records.php';

    date_default_timezone_set('America/Sao_Paulo');
    $dateTime = date('Y-m-d\TH:i');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ponto</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div class="container">
        <!-- Formulário de Registro -->
        <div class="card registro-form">
            <h1>Registro de Ponto</h1>

            <?php
                // Exibe mensagem de sucesso
                if ($_SESSION['success']) {
                    echo '<div class="success-message" id="errorMessage">
                            Registro de ponto realizado com sucesso!
                        </div>';
                }

                $_SESSION['success'] = false;
            ?>

            <?php
                // Exibe menasgem de erro
                if (!empty($_SESSION['error'])) {
                    echo '<div class="error-message" id="errorMessage">
                            Erro ao realizar o registro!
                        </div>';
                }

                $_SESSION['error'] = null;
            ?>

            <form id="pontoForm" action="submit_record.php" method="POST">
                <div class="form-group">
                    <label>🔄 Tipo de Marcação:</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="entrada" name="tipo" value="entrada" required>
                            <label for="entrada" class="radio-label">🟩 Entrada</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="saida" name="tipo" value="saida" required>
                            <label for="saida" class="radio-label">🟥 Saída</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="dataHora">📅 Data e Hora:</label>
                    <input type="datetime-local" id="dataHora" name="dataHora" value=<?php echo $dateTime; ?> required>
                </div>

                <div class="form-group">
                    <label for="observacao">📝 Observação (opcional):</label>
                    <textarea id="observacao" name="observacao" placeholder="Digite aqui qualquer observação sobre este registro..."></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    Registrar Ponto
                </button>
            </form>
        </div>

        <!-- Histórico de Registros -->
        <div class="card">
            <h2><span class="icon">📊</span> Últimas 10 Batidas</h2>
            <div class="historico" id="historico">
                <?php
                    for($ind = 0; $ind < count($records); $ind++){
                        $id = $records[$ind]['id'];
                        $tipo = $records[$ind]['tipo'];
                        $dataHora = date('d/m/Y H:i', strtotime($records[$ind]['data_hora']));  
                        $observacao = $records[$ind]['observacao'];
                        
                         echo "
                            <div class='batida-card {$tipo}'>
                                <div class='batida-header'>
                                    <div class='batida-tipo {$tipo}'>
                                        <span class='batida-icone'>▶</span>
                                        <span>{$tipo}</span>
                                    </div>
                                    <div class='batida-data'>
                                        <span class='batida-dia'>{$dataHora}</span>
                                    </div>
                                    <form method='POST' action='delete_record.php'>
                                        <input type='hidden' name='record_id' value='{$id}'>
                                        <button type='submit' class='delete-btn'>Apagar</button>
                                    </form>
                                </div>";
                        if (!empty($observacao)) {
                            echo "
                                <div class='batida-observacao'>
                                    <strong>Observação:</strong> {$observacao}
                                </div>";
                        }
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Barra Inferior -->
    <div class="bottom-bar">
        <div class="user-info">
            <div class="user-avatar">
                <span>👤</span>
            </div>
            <div class="user-details">
                <span class="user-name"><?php echo $_SESSION['usuario']; ?></span>
                <span class="user-role">Usuário</span>
            </div>
        </div>
        
        <div class="bottom-actions">
            <a href="includes/logout.php" class="action-btn logout-btn">
                <span class="btn-icon">🚪</span>
                <span class="btn-text">Sair</span>
            </a>
        </div>
    </div>
</body>
</html>   