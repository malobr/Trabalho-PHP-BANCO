<?php
require_once "banco.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'] ?? '';
    $data = $_POST['data'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    if (empty($titulo) || empty($data)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
        exit();
    }

    $titulo = $banco->real_escape_string($titulo);
    $data = $banco->real_escape_string($data);
    $descricao = $banco->real_escape_string($descricao);

    $q = "INSERT INTO eventos (titulo, data, descricao) VALUES ('$titulo', '$data', '$descricao')";

    $resultado = $banco->query($q);

    if ($resultado) {
        header("Location: calendario-admin.php");
        exit();
    } else {
        echo "Erro ao cadastrar evento: " . $banco->error;
    }
} else {
    header("Location: formulario-cadastrar-evento.php");
    exit();
}
?>
