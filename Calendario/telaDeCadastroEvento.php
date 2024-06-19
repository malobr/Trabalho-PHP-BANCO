<?php
// Inclui o arquivo de conexão com o banco de dados
include 'banco.php';

// Verifica se o formulário foi submetido
if(isset($_POST['submit'])) {
    // Coleta e valida os dados do formulário
    $nomeEvento = $_POST["nome"] ?? null;
    $dataEvento = $_POST["data"] ?? null;
    $localEvento = $_POST["local"] ?? null;

 //   require"form-cadastrar-evento.php";
    require"cadastrar-evento.php";

    // Verifica se algum campo não foi preenchido
    if(is_null($nomeEvento) || is_null($dataEvento) || is_null($localEvento)) {
        echo "Preencha todos os campos!";
    } else {
        // Converte a data para o formato correto (opcional se já estiver no formato correto)
        $dataFormatada = date('Y-m-d', strtotime($dataEvento));

        // Chama a função para criar o evento
        criarEvento($nomeEvento, $dataFormatada, $localEvento);
        echo "Evento criado com sucesso!";
        
        // Redirecionamento para a página desejada após o cadastro
        header("Location: telaCalendario.php");
        exit(); // Certifique-se de sair após o redirecionamento
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Cadastro de Eventos</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body>
    <div class="box">
        <span class="borderLine"></span>
        <form method="POST" action="sua_pagina_de_cadastro.php">
            <h2>Cyber Cadastro de Eventos</h2>
            <div class="inputBox">
                <input type="text" required="required" name="nome" id="nome">
                <span>Nome do Evento</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="date" required="required" name="data" id="data">
                <span>Data do Evento</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" required="required" name="local" id="local">
                <span>Local do Evento</span>
                <i></i>
            </div>
            <div class="link">
                <a href="telaDeLogin.php">Login</a>
                <a href="telaDeCadastro.php">Cadastrar Usuário</a>
            </div>
            <input type="submit" name="submit" value="Cadastro">
        </form>
    </div>
</body>

</html>
