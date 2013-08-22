<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Berzuca
 * Date: 11/08/13
 * Time: 14:38
 * To change this template use File | Settings | File Templates.
 */

class CProdutoDao {


    public static function insertObjectBD($object, $connection){
        $nome = $object->getNome();
        $data = $object->getData();
        $descricao = $object->getDescricao();
        $view_status = $object->getViewStatus();
        $lancamento = $object->getLancamento();
        $preco = $object->getPreco();
        $id_categoria = $object->getCategoria()->getID();
        $id_marca = $object->getMarca()->getID();

        if($object->getImagens() != null){

        }


    }
}