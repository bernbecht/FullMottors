<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Berzuca
 * Date: 22/08/13
 * Time: 17:19
 * To change this template use File | Settings | File Templates.
 */

class CObjetoImagem
{
    protected $id_imagem,
        $id_objeto,
        $type;

    public function __construct($id_img, $id_obj, $type)
    {
        $this->id_imagem = $id_img;
        $this->id_objeto = $id_obj;
        $this->type = $type;
    }

    public function setIdImg($id)
    {
        $this->id_imagem = $id;
    }

    public function getIdImg()
    {
        return $this->id_imagem;
    }

    public function setIdObj($id)
    {
        $this->id_objeto = $id;
    }

    public function getIdObj()
    {
        return $this->id_objeto;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }
}