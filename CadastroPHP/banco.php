<?php

// Conexão com o banco de dados
$banco = new mysqli("localhost", "root", "", "bancophp");

if ($banco->connect_error) {
    die("Connection failed: " . $banco->connect_error);
}

function createOnDB($into, $values){
    global $banco;

    $q = "INSERT INTO $into VALUES $values";

    $resp = $banco->query($q);
    echo "<br> Query: $q"; 
    echo var_dump($resp);
}

function criarUsuario(string $usuario, string $nome, string $senha, string $tipo = 'visualizador', $debug=false) : void {
    global $banco;

    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $q = "INSERT INTO usuarios(cod, usuario, nome, senha, tipo) VALUES (NULL, '$usuario', '$nome', '$senha', '$tipo')";

    $resp = $banco->query($q);

    if($debug){
        echo "<br> Query: $q"; 
        echo var_dump($resp);
    }
}

function deletarUsuario(string $usuario) : void {
    global $banco;

    $q = "DELETE FROM usuarios WHERE usuario='$usuario'";

    $resp = $banco->query($q);
    echo "<br> Query: $q";
    echo var_dump($resp);
}

function atualizarUsuario(string $usuario, string $nome="", string $senha="", string $tipo="", bool $debug=false) : void {
    global $banco;

    $set = [];
    if($nome != ""){
        $set[] = "nome='$nome'";
    }
    if ($senha != ""){
        $novaSenha = password_hash($senha, PASSWORD_DEFAULT);
        $set[] = "senha='$novaSenha'";
    }
    if ($tipo != ""){
        $set[] = "tipo='$tipo'";
    }

    $set = implode(', ', $set);

    $q = "UPDATE usuarios SET $set WHERE usuario='$usuario'";

    $resp = $banco->query($q);

    if($debug){
        echo "<br> Query: $q"; 
        echo var_dump($resp);
    }
}

function buscarTipoUsuario(string $usuario) {
    global $banco;

    $q = "SELECT tipo FROM usuarios WHERE usuario='$usuario'";
    $resultado = $banco->query($q);

    if ($resultado && $resultado->num_rows > 0) {
        $tipo = $resultado->fetch_assoc()['tipo'];
        return $tipo;
    } else {
        return null;
    }
}
?>
