<?php

//não mostrar erros de banco
ini_set('display_errors', 0);

require_once '../../classes/CNoticia.php';

require_once '../../classes/CConexao.php';

require_once '../../classes/CImagem.php';

$id = $_POST['id'];

$post = $_POST['post'];

$manchete = $_POST['manchete'];

$mini = $_FILES['foto_miniatura'];

$miniatura_modificada = $_POST['miniatura_modificada'];

if ($_FILES['foto_miniatura']["name"] == null) {
    $mini = null;
}

$erro = null;

if ($miniatura_modificada == 1) {
    if ($mini["name"] == null)
        $erro[] = "Você deve incluir uma miniatura <br />";
}

if (strlen($post) < 1)
    $erro[] = "Você deve escrever uma notícia <br />";

if (strlen($manchete) < 1)
    $erro[] = "Você deve escrever uma manchete <br />";

if (count($erro) > 0) {
    foreach ($erro as $erro) {
        echo $erro;
    }
} else {

    //variável que vai nos dizer se foi incluído ou não
    $incluir = null;

    $noticia = new CNoticia;

    $incluir = $noticia->editarNoticia($id, pg_escape_string(stripslashes($post)), pg_escape_string(htmlspecialchars(stripslashes($manchete))));

    if ($incluir != false && $miniatura_modificada == 1) {

        $img = new CImagem;

        if ($mini != null) {

            $incluir = $img->incluirImgNoticiaEditMode($mini, $id, 3, 1);

            if ($incluir != 1) {
                if ($incluir == 0)
                    $erro = 'Não foi possível inserir a imagem';
                else
                    $erro = $incluir;
            }
        }
    }

    if($miniatura_modificada == 1){
        if($incluir != 1){
            echo $erro;
        }
    }
    if (($incluir == FALSE)) {
        echo "Ocorreu algum erro na edição da notícia.";
    } else {
        echo 1;
    }
}
?>
