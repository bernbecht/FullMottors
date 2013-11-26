
<?php

require_once 'CConexao.php';

class CVisitas {

    public function incluirVisita($id, $tipo, $data) {

        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();
        
        $incluir = null;
        
        $incluir = pg_query($conexao, 
                "INSERT INTO visitas
                (id_dono, tipo, data)
                VALUES(
                        $id,
                        $tipo,
                        '$data')");
        
        $conexao1->closeConexao();
        
        return $incluir;
    }

}
?>
