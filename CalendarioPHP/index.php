<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário PHP</title>
    <style>
        table {
            width: 100%;
            border-collapse: separate;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #ddd;
        }
        #form-calendario {
            text-align: center;
            margin-bottom: 20px;
        }
        #form-calendario label {
            font-weight: bolder;
            margin-right: 10px;
        }
        #form-calendario select {
            padding: 5px;
            margin-right: 10px;
        }
        .botao-calendario {
            text-align: center;
            color: blanchedalmond;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        
        
    </style>
</head>
<body>
    <h1 style="text-align: center;">Calendário 📆 </h1>
    <form id="form-calendario" method="GET" action="" class="form">
        <label for="mes">Mês:</label>
        <select id="mes" name="mes">
            <?php
            for ($i = 1; $i <= 12; $i++) {
                $selected = ($i == date('m')) ? 'selected' : '';
                echo "<option value='$i' $selected>$i</option>";
            }
            ?>
        </select>
        <label for="ano">Ano:</label>
        <select id="ano" name="ano">
            <?php
            $anoAtual = date('Y');
            for ($i = $anoAtual; $i <= $anoAtual + 5; $i++) {
                $selected = ($i == $anoAtual) ? 'selected' : '';
                echo "<option value='$i' $selected>$i</option>";
            }
            ?>
        </select>
        <br>
        <button class ="botaoCalendario "type="submit">Mostrar Calendário</button>
    </form>
    <?php include 'calendario.php'; ?>
    
</body>
</html>