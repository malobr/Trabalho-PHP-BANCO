<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuario</title>
</head>
<body>
    <h1>Criar Usuario</h1>
    <?php
require_once "banco.php";

function criarUsuario(string $usuario, string $nome, string $senha, string $tipo = 'visualizador', $debug = false) : void {
    global $banco;

    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $q = "INSERT INTO usuarios(cod, usuario, nome, senha, tipo) VALUES (NULL, '$usuario', '$nome', '$senha', '$tipo')";

    $resp = $banco->query($q);

    if ($debug) {
        echo "<br> Query: $q";
        echo var_dump($resp);
    }
}

$usu = $_POST["usuario"] ?? null;
$nom = $_POST["nome"] ?? null;
$sen = $_POST["senha"] ?? null;

if (is_null($usu) || is_null($nom) || is_null($sen)) {
    echo "Por favor, preencha todos os campos.";
} else {
    criarUsuario($usu, $nom, $sen);
    echo "Usuário criado com sucesso!";
}
?>


</body>
</html>
