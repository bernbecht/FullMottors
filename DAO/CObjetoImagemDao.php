<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Berzuca
 * Date: 10/09/13
 * Time: 18:02
 * To change this template use File | Settings | File Templates.
 */

class CObjetoImagemDao {

    public static function insertObjectBD($object, $connection){

        $id_objeto = $object->getIDObj();
        $id_imagem = $object->getIDImg();
        $modalidade = $object->getModalidade();

        $sql = "INSERT INTO objeto_imagem (id_objeto, modalidade, id_imagem)
                VALUES($id_objeto,$modalidade,$id_imagem)";

        $query = pg_query($connection,$sql);

        return $query;

    }

}