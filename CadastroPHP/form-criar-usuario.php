<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
</head>
<body>
    <form action="criar-usuario.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <input type="submit" value="Criar">
    </form>
</body>
</html>
