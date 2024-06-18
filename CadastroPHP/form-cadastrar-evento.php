<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Evento</title>
</head>
<body>
    <h2>Cadastrar Evento</h2>
    <form action="cadastrar-evento.php" method="post">
        <label for="titulo">Título do Evento:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="data">Data do Evento:</label><br>
        <input type="date" id="data" name="data" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Cadastrar Evento">
    </form>
</body>
</html>
