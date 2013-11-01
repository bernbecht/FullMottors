<?php

require_once APP_CLASSES . "CConexao.php";

class CMarcaDao {

    public static function getAll() {
        $conexao = new CConexao();
        $conexao->novaConexao();

        $sql = "select *
               from marca";

        $query = pg_query($conexao->getConnection(), $sql);

        $conexao->closeConexao();

        return $query;
    }

    public static function getByID($id) {
        $conexao = new CConexao();
        $conexao->novaConexao();

        $sql = "select *
               from marca
               where id_marca=$id";

        $query = pg_query($conexao->getConnection(), $sql);

        $conexao->closeConexao();

        return $query;
    }

    public static function insertObjectBD($object, $connection){

        $nome = $object->getNome();

        $sql = "INSERT INTO marca (nome)
                VALUES ('$nome')";

        $query = pg_query($connection, $sql);

        return $query;

    }

}