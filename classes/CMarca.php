<?php

class CMarca {
    private $id_marca;
    private $nome;
    private $conexao;

    public function getAllMarcas() {
        $this->conexao = new CConexao();
        $this->conexao->novaConexao();

        $sql = "select * 
               from marca";

        $query = pg_query($this->conexao->getConnection(), $sql);

        $this->conexao->closeConexao();

        return $query;
    }

    public function getMarcaByID($id) {
        $this->conexao = new CConexao();
        $this->conexao->novaConexao();

        $sql = "select * 
               from categoria
               where id_marca=$id";
        
        $query = pg_query($this->conexao->getConnection(), $sql);

        $this->conexao->closeConexao();

        return $query;
    }
}

?>
