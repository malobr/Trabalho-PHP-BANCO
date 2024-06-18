<?php
session_start();
include('banco.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {
        $usuario = $banco->real_escape_string($_POST['usuario']);
        $senha = $_POST['senha']; // A senha não deve ser escapada

        $sql_code = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $sql_query = $banco->query($sql_code) or die("Falha na execução: " . $banco->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuarioData = $sql_query->fetch_assoc();
            if (password_verify($senha, $usuarioData['senha'])) {
                $_SESSION['cod'] = $usuarioData['cod'];
                $_SESSION['usuario'] = $usuarioData['usuario'];
                header("Location: telaCalendario.php");
                exit();
            } else {
                echo 'Senha incorreta!';
            }
        } else {
            echo 'Usuário não encontrado!';
        }
    } else {
        echo 'Preencha todos os campos!';
    }
} else {
    echo 'Erro de conexão com o banco de dados!';
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="box">
        <span class="borderLine"></span>
        <form method="POST" action="TelaDeLogin.php">
            <h2>Cyber Login</h2>
            <div class="inputBox">
                <input type="text" required="required" name="usuario" id="usuario">
                <span>Usuário</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" required="required" name="senha" id="senha">
                <span>Senha</span>
                <i></i>
            </div>
            <div class="link">
                <a href="telaDeCadastro.php">Cadastrar Usuário</a>
                <a href="telaDeCadastroEvento.php">Cadastrar Evento</a>
            </div>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
