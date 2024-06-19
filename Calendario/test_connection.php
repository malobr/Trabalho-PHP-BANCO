<?php
    $host = 'localhost:3308'; // Ajuste conforme necessário
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
?>
