<?php

require_once "banco.php";

if (isset($_POST['submit'])) {
    require_once "telaDeCadastroEvento.php";

    $nome = $_POST["nome"] ?? null;
    $data = $_POST["data"] ?? null;
    $local = $_POST["local"] ?? null;

    if (is_null($nome) || is_null($data) || is_null($local)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        criarEvento($nome, $data, $local);
        echo "Evento criado com sucesso!";
    }

    $nome = $banco->real_escape_string($nome);
    $data = $banco->real_escape_string($data);
    $local = $banco->real_escape_string($local);

    $q = "INSERT INTO eventos (nome, data, local) VALUES ('$nome', '$data', '$local')";

    $resultado = $banco->query($q);

    if ($resultado) {
        header("Location: telaDeLogin.php");
        exit();
    } else {
        echo "Erro ao cadastrar evento: " . $banco->error;
    }
} else {
    header("Location: telaDeCadastroEvento.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Eventos</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body>
    <div class="box">
        <span class="borderLine"></span>
        <form method="POST" action="sua_pagina_de_cadastro.php">
            <h2>Cadastro de Eventos</h2>
            <div class="inputBox">
                <input type="text" required="required" name="nome" id="nome">
                <span>Nome do Evento</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" required="required" name="data" id="data">
                <span>Data do Evento</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" required="required" name="local" id="local">
                <span>Local do Evento</span>
                <i></i>
            </div>

            <input type="submit" value="Cadastro">
        </form>

    </div>
</body>

</html>