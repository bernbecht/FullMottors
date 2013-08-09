<?php

require_once APP_CLASSES . "/CConexao.php";

class CCategoriaDao {

    public static function getAll() {
        $conexao = new CConexao();
        $conexao->novaConexao();

        $sql = "select * 
               from categoria";

        $query = pg_query($conexao->getConnection(), $sql);

        $conexao->closeConexao();

        return $query;
    }

    public static function getByID($id) {
        $conexao = new CConexao();
        $conexao->novaConexao();

        $sql = "select * 
               from categoria
               where id_categoria=$id";

        $query = pg_query($conexao->getConnection(), $sql);

        $conexao->closeConexao();

        return $query;
    }

    public static function insertObjectBD($object, $connection) {

        $nome = $object->getNome();

        $sql = "INSERT INTO categoria (nome) 
                VALUES ('$nome')";

        $query = pg_query($connection, $sql);

        return $query;
    }

}

?>
