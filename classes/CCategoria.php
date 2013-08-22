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


    

}

?>
