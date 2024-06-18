<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start(); 
require_once "banco.php";

$u = $_POST["usuario"] ?? null;
$s = $_POST["senha"] ?? null;

if (is_null($u) || is_null($s)) {
    header("Location: form-login.php"); 
    exit();
}

$q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario='$u'";
$busca = $banco->query($q);

if ($busca && $busca->num_rows > 0) {
    $usu = $busca->fetch_object();

    if (password_verify($s, $usu->senha)) {
        $_SESSION['usuario'] = $u;
        $_SESSION['tipo'] = $usu->tipo;

        if ($usu->tipo === 'administrador') {
            header("Location: calendario-admin.php");
        } else {
            header("Location: calendario-visualizador.php");
        }
        exit();
    } else {
        header("Location: form-login.php?erro=senha"); 
        exit();
    }
} else {
    header("Location: form-login.php?erro=usuario"); 
    exit();
}
?>


</body>
</html>
