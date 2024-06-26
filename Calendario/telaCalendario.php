<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Inicia a sessão se não foi iniciada
}

require_once "banco.php";

// Verifica se o usuário está logado

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário PHP</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="principal">
        <div class="container">
            <span class="borda"></span>    
            <h1 id="Calendario">Cyber Calendário</h1>
            Bem-vindo(a), <?php echo isset($_SESSION['nome']) ? htmlspecialchars($_SESSION['nome'], ENT_QUOTES, 'UTF-8') : 'Visitante'; ?>

            <form id="form-calendario" method="GET" action="">
                <div class="form-group">
                    <label for="mes">Mês:</label>
                    <select id="mes" name="mes">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            $selected = ($i == date('m')) ? 'selected' : '';
                            echo "<option value='$i' $selected>$i</option>";
                        }
                        ?>
                    </select>
                    <label for="ano">Ano:</label>
                    <select id="ano" name="ano">
                        <?php
                        $anoAtual = date('Y');
                        for ($i = $anoAtual; $i <= $anoAtual + 5; $i++) {
                            $selected = ($i == $anoAtual) ? 'selected' : '';
                            echo "<option value='$i' $selected>$i</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <button class="botaoCalendario" type="submit">Mostrar Calendário</button>
            </form>
        </div>
        <?php include 'calendario.php'; ?>
    </div>
</body>
</html>
