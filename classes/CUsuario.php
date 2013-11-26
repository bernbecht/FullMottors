<?php

require_once 'CConexao.php';


class CUsuario {
    
    public function incluirUser($login, $senha){
        $conexao1 = new CConexao;
        $conexao = $conexao1->novaConexao();
        
        $incluir=null;
        
        $incluir = pg_query($conexao,"
            INSERT INTO usuarios
            (login, senha)
             VALUES(
                    '$login',
                    '$senha')");
        
        $conexao1->closeConexao();
        
        return $incluir;
    }
    
    public function login($l, $s){
        $conexao1 = new CConexao;
        $conexao = $conexao1->novaConexao();
        
        $incluir=null;
        
        $incluir = pg_query($conexao,"
            SELECT *
            FROM usuario
            WHERE login='$l'
                  and senha='$s'");
        
        $conexao1->closeConexao();
        
        return $incluir;
    }
        
}

?>
