<?php

if (isset($_POST['submit'])) {
    require_once "telaDeCadastroEvento.php";

    $nome = $_POST["nome"] ?? null;
    $data = $_POST["data"] ?? null;
    $local = $_POST["local"] ?? null;

    //require "form-criar-usuario.php";

    if (is_null($nome) || is_null($data) || is_null($local)) {
        // digitar info
    } else {
        // criando
        criarEvento($nome, $data, $local);
        echo "Evento criado com sucesso!";
    }
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
            <!-- <div class="inputBox">
                <select name="tipo" required="required">
                    <option value="visualizador">Visualizador</option>
                    <option value="administrador">Administrador</option>
                </select>
                <span>Tipo de Usuário</span>
                <i></i>
            </div>
            <div class="link">
                <a href="telaDeLogin.php">Login</a>
            </div> -->
            <input type="submit" value="Cadastro">
        </form>

    </div>
</body>

</html>