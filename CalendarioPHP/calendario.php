<?php
function construcao_calendario($mes, $ano) {
    $diasDaSemana = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb');
    $primeiroDiaDoMes = mktime(0, 0, 0, $mes, 1, $ano);
    $numeroDeDias = date('t', $primeiroDiaDoMes);
    $componentesData = getdate($primeiroDiaDoMes);
    $nomeDoMes = $componentesData['month'];
    $diaDaSemana = $componentesData['wday'];

    echo "<h2>$nomeDoMes $ano</h2>";
    echo "<table>";
    echo "<tr>";

    foreach($diasDaSemana as $dia) {
        echo "<th>$dia</th>";
    }

    echo "</tr><tr>";

    if ($diaDaSemana > 0) {
        for ($k = 0; $k < $diaDaSemana; $k++) {
            echo "<td></td>";
        }
    }

    $diaAtual = 1;

    while ($diaAtual <= $numeroDeDias) {
        if ($diaDaSemana == 7) {
            $diaDaSemana = 0;
            echo "</tr><tr>";
        }

        $dataAtual = date('d-m-a');
        $diaAtualFormatado = sprintf('%02d', $diaAtual);
        $hoje = ($dataAtual == "$ano-$mes-$diaAtualFormatado") ? 'hoje' : '';

        echo "<td class='$hoje'>$diaAtual</td>";

        $diaAtual++;
        $diaDaSemana++;
    }

    if ($diaDaSemana != 7) {
        $diasRestantes = 7 - $diaDaSemana;
        for ($i = 0; $i < $diasRestantes; $i++) {
            echo "<td></td>";
        }
    }

    echo "</tr>";
    echo "</table>";
}

$mes = date('m');
$ano = date('Y');

if (isset($_GET['mes']) && isset($_GET['ano'])) {
    $mes = $_GET['mes'];
    $ano = $_GET['ano'];
}

construcao_calendario($mes, $ano);
?>
