<?php
require_once "banco.php";

// Verifica se o método da requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $data = $_POST['data'] ?? '';
    $local = $_POST['local'] ?? '';

    // Verifica se algum campo obrigatório está vazio
    if (empty($nome) || empty($data) || empty($local)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
        exit();
    }

    // Escapa os dados para prevenir SQL Injection
    $nome = $banco->real_escape_string($nome);
    $data = $banco->real_escape_string($data);
    $local = $banco->real_escape_string($local);

    // Monta a query SQL para inserir o evento
    $q = "INSERT INTO eventos (nome, data, local) VALUES ('$nome', '$data', '$local')";

    // Executa a query no banco de dados
    $resultado = $banco->query($q);

    // Verifica se a inserção foi bem-sucedida
    if ($resultado) {
        // Redireciona para a página de calendário após o cadastro bem-sucedido
        header("Location: telaCalendario.php");
        exit();
    } else {
        // Exibe mensagem de erro em caso de falha na inserção
        echo "Erro ao cadastrar evento: " . $banco->error;
    }
} else {
    // Redireciona de volta para a página de cadastro de eventos se não for uma requisição POST
    header("Location: telaDeCadastroEvento.php");
    exit();
}
?>
