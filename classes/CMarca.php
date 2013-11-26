<?php

class CMarca {
    private $id_marca;
    private $nome;
    private $conexao;

   public function __construct($id_marca, $nome){

       $this->id_marca = $id_marca;
       $this->nome = $nome;
   }

    public function setID($id){
        $this->id_marca = $id;
    }

    public function getID(){
        return $this->id_marca;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }
}

?>
