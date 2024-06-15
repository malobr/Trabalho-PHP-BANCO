<?php

    if(isset($_POST['submit']))
    {
        // print_r('Nome: ' . $_POST['nome']);
        // print_r('<br>');
        // print_r('Email: ' . $_POST['email']);
        // print_r('<br>');
        // print_r('Telefone: ' . $_POST['telefone']);
        // print_r('<br>');
        // print_r('Sexo: ' . $_POST['genero']);
        // print_r('<br>');
        // print_r('Data de nascimento: ' . $_POST['data_nascimento']);
        // print_r('<br>');
        // print_r('Cidade: ' . $_POST['cidade']);
        // print_r('<br>');
        // print_r('Estado: ' . $_POST['estado']);
        // print_r('<br>');
        // print_r('Endereço: ' . $_POST['endereco']);

        include_once('config.php');

        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
    
        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,usuario,senha) 
        VALUES ('$nome','$usuario','$senha')");

        header('Location: telaDeLogin.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Cadastro</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <div class="box">
        <span class="borderLine"></span>
        <form>
            <h2>Cyber Cadastro</h2>
            <div class="inputBox">
                <input type="text"  required="required" name="" id="">
                <span>Nome Completo</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text"  required="required" name="" id="">
                <span>Usuario</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password"  required="required" name="" id="">
                <span>Senha</span>
                <i></i>
            </div>
            
            <div class="link">
                <a href="telaDeLogin.php">Login</a>
            </div>
            <input type="submit" value="Cadastro">
        </form>
    </div>
</body>
</html>