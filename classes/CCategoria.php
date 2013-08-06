<?php

require_once 'CConexao.php';

class CCategoria {

    private $id_categoria;
    private $nome;
    private $conexao;

    public function getAllCategories() {
        $this->conexao = new CConexao();
        $this->conexao->novaConexao();

        $sql = "select * 
               from categoria";

        $query = pg_query($this->conexao->getConnection(), $sql);

        $this->conexao->closeConexao();

        return $query;
    }

    public function getCategoryByID($id) {
        $this->conexao = new CConexao();
        $this->conexao->novaConexao();

        $sql = "select * 
               from categoria
               where id_categoria=$id";
        
        $query = pg_query($this->conexao->getConnection(), $sql);

        $this->conexao->closeConexao();

        return $query;
    }

}

?>
