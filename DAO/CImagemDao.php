<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Berzuca
 * Date: 24/08/13
 * Time: 12:26
 * To change this template use File | Settings | File Templates.
 */

require_once APP_CLASSES . "/CConexao.php";
require_once APP_TESTE. "/CImagem.php";
require_once APP_TESTE. "/Utils.php";

class CImagemDao{

    public static function getAllByID($id, $modalidade)
    {
        $conexao = new CConexao();
        $conexao->novaConexao();

        $sql = "select *
                from imagem
                inner join objeto_imagem
                on imagem.id_imagem = objeto_imagem.id_imagem
                and objeto_imagem.id_objeto = $id
                and objeto_imagem.modalidade = $modalidade";

        $query = pg_query($conexao->getConnection(), $sql);

        $conexao->closeConexao();

        return $query;
    }

    public static function insertObjectBD($object, $connection){

        $imagem_path = $object->getPathImagem();
        $sql = "INSERT INTO imagem (imagem_path) VALUES ('$imagem_path');";

        $query = pg_query($connection, $sql);

        return $query;
    }

}