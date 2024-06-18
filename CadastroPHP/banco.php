<?php

// Conexão com o banco de dados
$banco = new mysqli("localhost", "root", "your_password_here", "bancophp");

if ($banco->connect_error) {
    die("Connection failed: " . $banco->connect_error);
}

/**
 * Função para criar registros no banco de dados.
 * @param string $into - Nome da tabela.
 * @param string $values - Valores a serem inseridos.
 */
function createOnDB($into, $values) {
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
function criarUsuario(string $usuario, string $nome, string $senha, string $tipo = 'visualizador', $debug = false): void {
    global $banco;

    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $q = "INSERT INTO usuarios(cod, usuario, nome, senha, tipo) VALUES (NULL, '$usuario', '$nome', '$senha', '$tipo')";

    $resp = $banco->query($q);

    if ($debug) {
        echo "<br> Query: $q";
        echo var_dump($resp);
    }
}

/**
 * Função para deletar um usuário.
 * @param string $usuario - Nome do usuário a ser deletado.
 */
function deletarUsuario(string $usuario): void {
    global $banco;

    $q = "DELETE FROM usuarios WHERE usuario='$usuario'";

    $resp = $banco->query($q);
    echo "<br> Query: $q";
    echo var_dump($resp);
}

/**
 * Função para atualizar os dados de um usuário.
 * @param string $usuario - Nome do usuário a ser atualizado.
 * @param string $nome - Novo nome do usuário (opcional).
 * @param string $senha - Nova senha do usuário (opcional).
 * @param string $tipo - Novo tipo de usuário (opcional).
 * @param bool $debug - Flag para debug (padrão: false).
 */
function atualizarUsuario(string $usuario, string $nome = "", string $senha = "", string $tipo = "", bool $debug = false): void {
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
}

/**
 * Função para buscar o tipo de usuário.
 * @param string $usuario - Nome do usuário.
 * @return string|null - Retorna o tipo de usuário ou null se não encontrado.
 */
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
