<?php


require_once APP_CLASSES . "/CConexao.php";

class CategoriaDao {

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

}
?>
