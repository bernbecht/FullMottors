<?php

require_once APP_CLASSES . "/CConexao.php";
require_once APP_TESTE. "/CProduto.php";
require_once APP_TESTE. "/Utils.php";

class CProdutoDao {


    public static function insertObjectBD($object, $connection){
        $nome = $object->getNome();
        $data = $object->getData();
        $descricao = $object->getDescricao();
        $view_status = Utils::booleanPostgresTranslater($object->getViewStatus());
        $lancamento = Utils::booleanPostgresTranslater($object->getLancamento());
        $preco = $object->getPreco();
        $parcelas = $object->getParcelas();
        $prazo = $object->getPrazo();
        $id_categoria = $object->getCategoria()->getID();
        $id_marca = $object->getMarca()->getID();

        $sql = "INSERT INTO produto (nome,
                    data,
                    descricao,
                    view_status,
                    preco,
                    id_categoria,
                    id_marca,
                    prazo,
                    parcelas,
                    lancamento)
                VALUES('$nome',
                        '$data',
                        '$descricao',
                        '$view_status',
                        $preco,
                        $id_categoria,
                        $id_marca,
                        $prazo,
                        $parcelas,
                        '$lancamento')";

        $query = pg_query($connection, $sql);

        return $query;


    }

    public static function getByID($id){
        $conexao = new CConexao();
        $conexao->novaConexao();

        $sql = "select *
               from produto
               where id_produto=$id";

        $query = pg_query($conexao->getConnection(), $sql);

        $conexao->closeConexao();

        return $query;
    }

    public static function getAll(){
        $conexao = new CConexao();
        $conexao->novaConexao();

        $sql = "select *
               from produto";

        $query = pg_query($conexao->getConnection(), $sql);

        $conexao->closeConexao();

        return $query;
    }
}