<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="box">
        <span class="borderLine"></span>
        <form method="POST" action="sua_pagina_de_login.php">
            <h2>Cyber Login</h2>
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
            <div class="link">
                <a href="telaDeCadastro.php">Cadastrar Usuario</a>
                <a href="telaDeCadastroEvento.php">Cadastrar Evento</a>
            </div>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
