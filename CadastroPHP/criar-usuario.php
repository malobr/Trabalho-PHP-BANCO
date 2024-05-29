<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Criar Usuario</h1>

    <?php 
    
        require_once "banco.php";

        $usu = $_POST["usuario"] ?? null;
        $nom = $_POST["nome"] ?? null;
        $sen = $_POST["senha"] ?? null;

        require "form-criar-usuario.php";
        
        if(is_null($usu) || is_null($nom) || is_null($sen)){
            // digitar info
        }else{
            // criando
            criarUsuario($usu, $nom, $sen);
            echo "Usuario criado com sucesso!";
        }

    
    ?>

    
</body>
</html>
