<?php
$usuario = "root";
$senha = "marcelo";
$database = "login";
$host = "localhost";

$banco = new mysqli($host, $usuario, $senha, $database);

if ($banco->connect_error) {
    die("Connection failed: " . $banco->connect_error);
}
?>

/*
function criarUsuario(string $usuario, string $nome, string $senha, string $tipo = 'visualizador', $debug = false): void
{
    global $banco;

    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario', '$nome', '$senha', '$tipo')";
    $resp = $banco->query($q);

    if ($debug) {
        echo "<br> Query: $q";
        echo var_dump($resp);
    }

    if ($resp === TRUE) {
        echo "Usuário criado com sucesso.<br>";
    } else {
        echo "Erro ao criar usuário: " . $banco->error . "<br>";
    }
}

function deletarUsuario(string $usuario): void
{
    global $banco;

    $q = "DELETE FROM usuarios WHERE usuario='$usuario'";
    $resp = $banco->query($q);

    if ($resp === TRUE) {
        echo "Usuário deletado com sucesso.<br>";
    } else {
        echo "Erro ao deletar usuário: " . $banco->error . "<br>";
    }
}

function atualizarUsuario(string $usuario, string $nome = "", string $senha = "", string $tipo = "", bool $debug = false): void
{
    global $banco;

    $set = [];
    if ($nome != "") {
        $set[] = "nome='$nome'";
    }
    if ($senha != "") {
        $novaSenha = password_hash($senha, PASSWORD_DEFAULT);
        $set[] = "senha='$novaSenha'";
    }
    if ($tipo != "") {
        $set[] = "tipo='$tipo'";
    }

    $set = implode(', ', $set);

    $q = "UPDATE usuarios SET $set WHERE usuario='$usuario'";
    $resp = $banco->query($q);

    if ($debug) {
        echo "<br> Query: $q";
        echo var_dump($resp);
    }

    if ($resp === TRUE) {
        echo "Usuário atualizado com sucesso.<br>";
    } else {
        echo "Erro ao atualizar usuário: " . $banco->error . "<br>";
    }
}

function buscarTipoUsuario(string $usuario)
{
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

// Funções para manipular os Eventos
function criarEvento(string $nome, string $data, string $local): void
{
    global $banco;

    $q = "INSERT INTO eventos (nome, data, local) VALUES ('$nome', '$data', '$local')";
    $resp = $banco->query($q);

    if ($resp === TRUE) {
        echo "Evento criado com sucesso.<br>";
    } else {
        echo "Erro ao criar evento: " . $banco->error . "<br>";
    }
}

function deletarEvento(string $nome): void
{
    global $banco;

    $q = "DELETE FROM eventos WHERE nome='$nome'";
    $resp = $banco->query($q);

    if ($resp === TRUE) {
        echo "Evento deletado com sucesso.<br>";
    } else {
        echo "Erro ao deletar evento: " . $banco->error . "<br>";
    }
}

function atualizarEvento(string $nome, string $novoNome = "", string $data = "", string $local = ""): void
{
    global $banco;

    $set = [];
    if ($novoNome != "") {
        $set[] = "nome='$novoNome'";
    }
    if ($data != "") {
        $set[] = "data='$data'";
    }
    if ($local != "") {
        $set[] = "local='$local'";
    }

    $set = implode(', ', $set);

    $q = "UPDATE eventos SET $set WHERE nome='$nome'";
    $resp = $banco->query($q);

    if ($resp === TRUE) {
        echo "Evento atualizado com sucesso.<br>";
    } else {
        echo "Erro ao atualizar evento: " . $banco->error . "<br>";
    }
}

function buscarEvento(string $nome)
{
    global $banco;

    $q = "SELECT * FROM eventos WHERE nome='$nome'";
    $resultado = $banco->query($q);

    if ($resultado && $resultado->num_rows > 0) {
        $evento = $resultado->fetch_assoc();
        return $evento;
    } else {
        return null;
    }
}
?>
*/