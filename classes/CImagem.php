<?php

require_once 'CConexao.php';

class CImagem {

    protected $id_dono,
            $tipo,
            $nome_img;

    //retorna null para SUCESSO ou array de erros
    public function verificaImg($foto) {

        $error = null;

        // Largura máxima em pixels
        $largura = 1000;
        // Altura máxima em pixels
        $altura = 1000;
        // Tamanho máximo do arquivo em bytes
        $tamanho = 10000000;

        // Verifica se o arquivo é uma imagem
        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
            $error[1] = "Isso não é uma imagem.";
        }

        // Pega as dimensões da imagem
        $dimensoes = getimagesize($foto["tmp_name"]);

        // Verifica se a largura da imagem é maior que a largura permitida
        if ($dimensoes[0] > $largura) {
            $error[2] = "A largura da imagem não deve ultrapassar " . $largura . " pixels";
        }

        // Verifica se a altura da imagem é maior que a altura permitida
        if ($dimensoes[1] > $altura) {
            $error[3] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
        }

        // Verifica se o tamanho da imagem é maior que o tamanho permitido
        if ($foto["size"] > $tamanho) {
            $error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
        }

        return $error;
    }

    public function incluirImg($conexao, $foto, $id_produto, $tipo, $funcao) {

        $error = $this->verificaImg($foto);

        if (count($error) == 0) {

            $path_img = $_SERVER['DOCUMENT_ROOT'] . "/new/img/boutique";

            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

            // Caminho de onde ficará a imagem
            $caminho_imagem = $path_img . "/" . $nome_imagem;

            $incluir = null;

            $incluir = pg_query($conexao, "INSERT INTO IMG(id_produto, tipo, nome_img, funcao_img) 
             VALUES($id_produto,                
                 $tipo,
                 '$nome_imagem',
                  $funcao)");

            if ($incluir) {
                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
            }

            return $incluir;
        }

        if (count($error) != 0) {
            foreach ($error as $erro) {
                echo $erro . "<br />";
            }
        }
    }

    public function incluirImgSemiNovas($conexao, $foto, $id_produto, $tipo, $funcao) {

        $error = $this->verificaImg($foto);

        if (count($error) == 0) {

            $path_img = $_SERVER['DOCUMENT_ROOT'] . "/new/img/seminovas";

            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

            // Caminho de onde ficará a imagem
            $caminho_imagem = $path_img . "/" . $nome_imagem;

            $incluir = null;

            $incluir = pg_query($conexao, "INSERT INTO IMG(id_produto, tipo, nome_img, funcao_img) 
             VALUES($id_produto,                
                 $tipo,
                 '$nome_imagem',
                  $funcao)");

            if ($incluir) {
                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
            }

            return $incluir;
        }

        if (count($error) != 0) {
            foreach ($error as $erro) {
                echo $erro . "<br />";
            }
        }
    }

    public function consultaImg($id) {
        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $consulta = pg_query($conexao, "select * from img where id_produto = $id and tipo = 1 and funcao_img = 2");

        $conexao1->closeConexao();

        return $consulta;
    }

    public function consultaImgGenerico($id, $tipo, $funcao) {
        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        if ($id == '') {
            $consulta = pg_query($conexao, "select * from img where tipo = $tipo and funcao_img = $funcao");
        }
        else
            $consulta = pg_query($conexao, "select * from img where id_produto = $id and tipo = $tipo and funcao_img = $funcao");

        $conexao1->closeConexao();

        return $consulta;
    }

    public function incluirImgNoticia($conexao, $foto, $id_produto, $tipo, $funcao) {
        $error = $this->verificaImg($foto);

        //caso não dê erro com as propriedades da foto
        if (count($error) == 0) {

            $path_img = $_SERVER['DOCUMENT_ROOT'] . "/new/img/noticias";

            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

            // Caminho de onde ficará a imagem
            $caminho_imagem = $path_img . "/" . $nome_imagem;

            $incluir = null;

            $incluir = pg_query($conexao, "INSERT INTO img
                    (id_produto, tipo, nome_img, funcao_img) 
             VALUES($id_produto,                
                 $tipo,
                 '$nome_imagem',
                  $funcao)");

            //caso consiga incluir
            if ($incluir) {
                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
                return 1;
            }
            else
                return 0;
        }

        if (count($error) != 0) {
            foreach ($error as $erro) {
                echo $erro . "<br />";
            }
        }
    }

    public function incluirImgNoticiaEditMode($foto, $id_produto, $tipo, $funcao) {
        $error = $this->verificaImg($foto);

        //caso não dê erro com as propriedades da foto
        if (count($error) == 0) {


            $conexao1 = new CConexao();

            $conexao = $conexao1->novaConexao();

            $path_img = $_SERVER['DOCUMENT_ROOT'] . "/new/img/noticias";

            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

            // Caminho de onde ficará a imagem
            $caminho_imagem = $path_img . "/" . $nome_imagem;

            $incluir = null;

            $incluir = pg_query($conexao, "INSERT INTO img
                    (id_produto, tipo, nome_img, funcao_img) 
             VALUES($id_produto,                
                 $tipo,
                 '$nome_imagem',
                  $funcao)");

            $conexao1->closeConexao();

            //caso consiga incluir
            if ($incluir) {
                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
                return 1;
            }
            else
                return 0;
        }

        if (count($error) != 0) {
            foreach ($error as $erro) {
                echo $erro . "<br />";
            }
        }
    }

    public function excluirFotoNome($nome) {
        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $consulta = pg_query($conexao, "DELETE FROM img
             WHERE nome_img='$nome'");

        $conexao1->closeConexao();

        return $consulta;
    }

    public function excluirFotoByIdDono($id,$tipo) {
        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $consulta = pg_query($conexao, "DELETE FROM img
             WHERE id_produto={$id}
             AND tipo={$tipo}");

        $conexao1->closeConexao();

        return $consulta;
    }

    public function getImgNoticiaMesAno($data) {

        $conexao1 = new CConexao;
        $conexao = $conexao1->novaConexao();

        $incluir = pg_query($conexao, "select * 
                from noticia 
                inner join img 
                on id_noticia = img.id_produto 
                and img.funcao_img = 1 
                and data like '$data%'
                order by data desc ");

        $conexao1->closeConexao();

        return $incluir;
    }

    public function getImgProdutoMarcaCategoria($m, $c, $l, $o) {
        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $consulta = pg_query($conexao, "select * 
                from produto  
                inner join img 
                on  produto.id_produto = img.id_produto 
                and img.funcao_img = 1 
                and categoria ~* '$c' 
                and marca  ~* '$m' 
                order by nome  limit $l offset $o");

        $conexao1->closeConexao();

        return $consulta;
    }

    public function getImgNoticiaId($id) {
        $conexao1 = new CConexao;
        $conexao = $conexao1->novaConexao();

        $incluir = pg_query($conexao, "select * 
                from noticia 
                inner join img 
                on id_noticia = img.id_produto 
                and img.funcao_img = 1 
                and id_noticia= $id");

        $conexao1->closeConexao();

        return $incluir;
    }

    public function getImgNoticiasRecentes($limit) {

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

    public function getImagensByID($id,$tipo){
        $conexao1 = new CConexao;
        $conexao = $conexao1->novaConexao();

        $incluir = pg_query($conexao, "select *
                from img
                where id_produto={$id}
                and tipo={$tipo}");

        $conexao1->closeConexao();

        return $incluir;
    }

}

?>
