<pre>
<?php 

    // $banco = new mysqli("localhost", "root", "", "bancophp");
    $banco = new mysqli("localhost", "root", "", "bancophp");

    function createOnDB($into, $values){
        global $banco;

        $q = "INSERT INTO $into VALUES $values";
    
        $resp = $banco->query($q);
        echo "<br> Query: $q"; 
        echo var_dump($resp);
    }

    function criarUsuario(string $usuario, string $nome, string $senha, $debug=false) : void {
        global $banco;

        $senha = password_hash($senha, PASSWORD_DEFAULT);
        
        // createOnDB("usuarios(cod, usuario, nome, senha)", "(NULL, '$usuario', '$nome', '$senha')");

        // $q = "INSERT INTO usuarios(cod, usuario, nome, senha) VALUES (NULL, 'uteste', 'nteste', 'steste')";
        $q = "INSERT INTO usuarios(cod, usuario, nome, senha) VALUES (NULL, '$usuario', '$nome', '$senha')";
    
        $resp = $banco->query($q);
        
        if($debug){
            echo "<br> Query: $q"; 
            echo var_dump($resp);
        }
    }

    function deletarUsuario(string $usuario) : void {
        global $banco;

        // $q = "DELETE FROM usuarios WHERE usuario='maria_22'";
        $q = "DELETE FROM usuarios WHERE usuario='$usuario'";
        
        $resp = $banco->query($q);
        echo "<br> Query: $q";
        echo var_dump($resp);
    }
    
    function atualizarUsuario(string $usuario, string $nome="", string $senha="", bool $debug=false) : void {

        global $banco;

        $set = "";
        if($nome != "" & $senha != ""){
            // os dois
            $novaSenha = password_hash($senha, PASSWORD_DEFAULT);
            $set = "nome='$nome', senha='$novaSenha'";
        } else if($nome != ""){
            // só o nome
            $set = "nome='$nome'";
        } else if ($senha != ""){
            // só a senha
            $novaSenha = password_hash($senha, PASSWORD_DEFAULT);
            $set = "senha='$novaSenha'";
        }

        
        $q = "UPDATE usuarios SET $set WHERE usuario='$usuario'";
        
        $resp = $banco->query($q);

        if($debug){
            echo "<br> Query: $q"; 
            echo var_dump($resp);
        }

    }

    atualizarUsuario("maria_22", "mariaaaaaa", "", false);

?>
</pre>
