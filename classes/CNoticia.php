<?php

require_once 'CConexao.php';

class CNoticia {

    public function incluirNoticia($conexao, $post, $manchete, $data) {
        //$conexao1 = new CConexao;
        //$conexao = $conexao1->novaConexao();

        $incluir = pg_query($conexao, "INSERT INTO NOTICIA(post, manchete, data)
            VALUES('$post',
                '$manchete',
                '$data')RETURNING id_noticia");

        if ($incluir != null) {
            $resultado = pg_fetch_object($incluir);
            return $resultado->id_noticia;
        }

        //$conexao1->closeConexao();
        else
            return false;
    }
    
    public function editarNoticia($id, $post, $manchete){
        $conexao1 = new CConexao;
        $conexao = $conexao1->novaConexao();

        $incluir = pg_query($conexao, "UPDATE noticia
                SET post='$post',
                    manchete='$manchete'
                WHERE id_noticia = $id");

        
        $conexao1->closeConexao();
        
        return $incluir;
    }

    public function getNoticiasRecentes($limit) {
        $conexao1 = new CConexao;
        $conexao = $conexao1->novaConexao();

        $incluir = pg_query($conexao, "select * 
                from noticia
                inner join img
                on id_noticia = img.id_produto
                and img.funcao_img = 1
                order by data desc 
                limit $limit");

        $conexao1->closeConexao();

        return $incluir;
    }

    public function getNoticiaId($id) {
        $conexao1 = new CConexao;
        $conexao = $conexao1->novaConexao();

        $incluir = pg_query($conexao, "select * 
                from noticia 
                where id_noticia= $id");

        $conexao1->closeConexao();

        return $incluir;
    }

    public function getNoticiaPorMesAno($data) {
        $conexao1 = new CConexao;
        $conexao = $conexao1->novaConexao();

        $incluir = pg_query($conexao, "select * 
                from noticia 
                where data like '$data%'
                order by data desc ");

        $conexao1->closeConexao();

        return $incluir;
    }
    
    

}

?>
