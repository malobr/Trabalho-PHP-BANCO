<?php

if(!isset($_SESSION)){

    session_start(); // Inicia a sessão
}

require_once "banco.php";

/*if (!isset($_SESSION['usuario'])) {
    echo "Você precisa estar logado para acessar esta página.";
    exit();
}*/

//$usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html lang="en">
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
    <h1 id = "Calendario">Cyber Calendário</h1>
    Bem vindo(a), <?php echo $_SESSION['nome']; ?>

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
