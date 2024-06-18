<?php
include 'banco.php';
    if(isset($_POST['submit']))
    {

        require_once "telaDeCadastro.php";

        $usu = $_POST["usuario"] ?? null;
        $nom = $_POST["nome"] ?? null;
        $sen = $_POST["senha"] ?? null;

        require "form-criar-usuario.php";
        
        if(is_null($usu) || is_null($nom) || is_null($sen)){
            // digitar info
        }else{
            // criando
            criarUsuario($usu, $nom, $sen);
            echo "Usuario criado com sucesso!";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Cadastro</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
    <div class="box">
        <span class="borderLine"></span>
        <form method="POST" action="sua_pagina_de_cadastro.php">
    <h2>Cyber Cadastro</h2>
    <div class="inputBox">
        <input type="text" required="required" name="nome" id="nome">
        <span>Nome Completo</span>
        <i></i>
    </div>
    <div class="inputBox">
        <input type="text" required="required" name="usuario" id="usuario">
        <span>Usuario</span>
        <i></i>
    </div>
    <div class="inputBox">
        <input type="password" required="required" name="senha" id="senha">
        <span>Senha</span>
        <i></i>
    </div>
    <div class="inputBox">
        <select name="tipo" required="required">
            <option value="administrador">Administrador</option>
            <option value="visualizador">Usuário</option>

        </select>
        
    </div>
    <br>
    <div class="link">
        <a href="telaDeLogin.php">Login</a>
        <a href="telaDeCadastroEvento.php">Cadastrar Evento</a>
    </div>
    <input type="submit" value="Cadastro">
</form>

    </div>
</body>
</html>