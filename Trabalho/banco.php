<?php
//cnx com o banco
$banco = new mysqli("localhost", "root", "", "bancophp");

if ($banco->connect_error) {
    die("Connection failed: " . $banco->connect_error);
}

function createOnDB($into, $values)
{
    global $banco;

    $q = "INSERT INTO $into VALUES $values";

    $resp = $banco->query($q);
    echo "<br> Query: $q";
    echo var_dump($resp);
}
?>