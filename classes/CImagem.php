<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Berzuca
 * Date: 22/08/13
 * Time: 16:56
 * To change this template use File | Settings | File Templates.
 */

class CImagem {

    protected $id_imagem,
              $path_imagem;

    public function __construct($id, $path){
        $this->id_imagem = $id;
        $this->path_imagem = $path;
    }

    public function setID($id){
        $this->id_imagem = $id;
    }

    public function getID(){
        return $this->id_imagem;
    }

    public function setPathImagem($path){
        $this->path_imagem = $path;
    }

    public function getPathImagem(){
        return $this->path_imagem;
    }

}