<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>
<body>

    <h1>COISAS DE PC</h1>
    
    <pre>
    <?php 

        require_once "banco.php";

        $q = "SELECT * FROM pecas";
        $busca = $banco->query($q);
        // echo print_r($busca);

        $q = "SELECT * FROM marcas";
        $busca2 = $banco->query($q);

        /*while($obj = $busca->fetch_object()){
            echo print_r($obj);
        }*/

    ?>
    </pre>

    <div style="width: 50%;">
        <table>
            <tr>
                <th>COD</th>
                <th>NOME</th>
                <th>MARCA</th>
            </tr>
            
            <?php 
                while($obj = $busca->fetch_object()){
                    echo "<tr>";
                    echo "<td>" . $obj->cod . "</td>";
                    echo "<td>" . $obj->nome . "</td>";
                    echo "<td>" . $obj->marca . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>

    <div style="width: 50%;">
        <table>
            <tr>
                <th>COD</th>
                <th>MARCA</th>
            </tr>
            
            <?php 
                while($obj = $busca2->fetch_object()){
                    echo "<tr>";
                    echo "<td>" . $obj->cod . "</td>";
                    echo "<td>" . $obj->nome . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>

</body>
</html>
