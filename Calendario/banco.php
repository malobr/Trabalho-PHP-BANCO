<?php

$host = 'localhost:3308'; // Ajuste a porta conforme necessário
$user = 'root';
$password = ''; // Coloque sua senha do MySQL se houver
$dbname = 'login';

$banco = new mysqli($host, $user, $password, $dbname);

// Verifica se houve algum erro na conexão
if ($banco->connect_error) {
    die("Erro de conexão com o banco de dados: " . $banco->connect_error);
} else {
    echo "Conexão bem-sucedida!";
}



function createOnDB($into, $values)
{
    global $banco;

    $q = "INSERT INTO $into VALUES $values";

    $resp = $banco->query($q);
    echo "<br> Query: $q";
    echo var_dump($resp);
}

/**
 * Função para criar um usuário.
 * @param string $usuario - Nome do usuário.
 * @param string $nome - Nome completo do usuário.
 * @param string $senha - Senha do usuário.
 * @param string $tipo - Tipo de usuário (padrão: 'visualizador').
 * @param bool $debug - Flag para debug (padrão: false).
 */



    function criarUsuario($usuario, $nome, $senha) {
    
        global $banco; 
    
        $usuario = $banco->real_escape_string($usuario);
        $nome = $banco->real_escape_string($nome);
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO usuarios (usuario, nome, senha) VALUES ('$usuario', '$nome', '$senha_hash')";
        if ($banco->query($sql)) {
            return true; // Sucesso na inserção
        } else {
            return false; // Falha na inserção
        }
    }




/**
 * Função para deletar um usuário.
 * @param string $usuario - Nome do usuário a ser deletado.
 */

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

/**
 * Função para atualizar os dados de um usuário.
 * @param string $usuario - Nome do usuário a ser atualizado.
 * @param string $nome - Novo nome do usuário (opcional).
 * @param string $senha - Nova senha do usuário (opcional).
 * @param string $tipo - Novo tipo de usuário (opcional).
 * @param bool $debug - Flag para debug (padrão: false).
 */
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

/**
 * Função para buscar o tipo de usuário.
 * @param string $usuario - Nome do usuário.
 * @return string|null - Retorna o tipo de usuário ou null se não encontrado.
 */
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

/**
 * Função para criar um evento.
 * @param string $nome - Nome do evento.
 * @param string $data - Data do evento.
 * @param string $local - Local do evento.
 */

function criarEvento(string $nome, date $data, string $local): void
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

/**
 * Função para deletar um evento.
 * @param string $nome - Nome do evento a ser deletado.
 */
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

/**
 * Função para atualizar os dados de um evento.
 * @param string $nome - Nome do evento a ser atualizado.
 * @param string $novoNome - Novo nome do evento (opcional).
 * @param string $data - Nova data do evento (opcional).
 * @param string $local - Novo local do evento (opcional).
 */
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

/**
 * Função para buscar os dados de um evento.
 * @param string $nome - Nome do evento.
 * @return array|null - Retorna os dados do evento ou null se não encontrado.
 */
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
