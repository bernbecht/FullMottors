<?php

require_once 'CConexao.php';

class CCategoria {

    private $id_categoria;
    private $nome;
    private $conexao;   
    
   
    
    public function __construct($id, $nome) {
        $this->id_categoria = $id;
        $this->nome= $nome;
    }
    
    public function setID($id){
        $this->id_categoria = $id;
    }
    
    public function getID(){
        return $this->id_categoria;
    }
    
    public function setNome($nome){
         $this->nome= $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }


    /*public function getAllCategories() {
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
    }*/
    

}

?>
