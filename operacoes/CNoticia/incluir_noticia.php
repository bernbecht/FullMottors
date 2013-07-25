<?php

//não mostrar erros de banco
ini_set('display_errors', 0);

require_once '../../classes/CNoticia.php';

require_once '../../classes/CConexao.php';

require_once '../../classes/CImagem.php';

$post = $_POST['post'];

$manchete = $_POST['manchete'];

$mini = $_FILES['foto_miniatura'];

$data = date("Y-m-d");


if ($mini["name"] == null)
    $erro[] = "Você deve incluir uma miniatura <br />";

if (strlen($post) < 1)
    $erro[] = "Você deve escrever uma notícia <br />";

if (strlen($manchete) < 1)
    $erro[] = "Você deve escrever uma manchete <br />";

if (count($erro) > 0) {
    foreach ($erro as $erro) {
        echo $erro;
    }
} else {
    $conexao1 = new CConexao();

    $conexao = $conexao1->novaConexao();
    
    pg_query($conexao, "begin");

    //variável que vai nos dizer se foi incluído ou não
    $incluir = null;

    $noticia = new CNoticia;

    $incluir = $noticia->incluirNoticia($conexao, $post, $manchete, $data);

    $id_noticia = $incluir;

    if ($incluir != false) {


        $img = new CImagem;

        $incluir = $img->incluirImgNoticia($conexao, $mini, $id_noticia, 3, 1);

        if ($incluir != 1) {
            if ($incluir == 0)
                $erro = 'Não foi possível inserir a imagem';
            else
                $erro = $incluir;
        }
    }

    if (($incluir == FALSE) || ($incluir != 1)) {
        pg_query($conexao, "rollback");
        pg_close($conexao);

        echo $erro;
    }
    else{
        pg_query($conexao, "commit");
        pg_close($conexao);
        echo 1;
    }
}
?>
