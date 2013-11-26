<?php

require_once '../../config.php';
require_once APP_CLASSES . 'CSemi.php';
require_once APP_CLASSES . 'CImagem.php';

$seminova = new CSemi;
$imagem = new CImagem;
$fotos_consulta = $imagem->getImagensByID($_POST['id'],3);

while($fetch = pg_fetch_object($fotos_consulta)){
    $nomes_imagens[]= $fetch->nome_img;
}



if(($seminova->excluirSeminovaByID($_POST['id']))&&($imagem->excluirFotoByIdDono($_POST['id'],3))){
    foreach($nomes_imagens as $nome){
        unlink($path_img.'/seminovas/'.$nome);
    }
    echo  1;
}
else{
    echo  0;
}

