<?php
require_once APP_CLASSES . 'CNoticia.php';
require_once APP_CLASSES . 'CImagem.php';

$noticia = new CNoticia;
$img = new CImagem;

$consulta = $noticia->getNoticiasRecentes(3);
$consulta_img = $img->getImgNoticiasRecentes(3);

$num_rows_recentes = pg_num_rows($consulta);
?>


<div class="body-coluna">
    <div class="coluna-content">
        <?php
        if ($num_rows_recentes>0){
            while($fetch = pg_fetch_object($consulta)){
                $fetch_img = pg_fetch_object($consulta_img);
                setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
                date_default_timezone_set('America/Sao_Paulo');
                $date = $fetch->data;
                $date = utf8_encode(strftime("%d de %B de %Y", strtotime($date)));

                print "<div class='noticia'>
            <a href='$path_paginas/noticia.php?id=$fetch->id_noticia'>
                <div class='noticia-foto'>
                    <img src='$path_img/noticias/$fetch_img->nome_img' />
                </div>

                <div class='noticia-texto'>
                    <div class='manchete_noticia'><p>$fetch->manchete</p></div>
                    <div class='data_noticia'>$date</div>
                </div>
                <div class='clearfix'></div>
            </a>
        </div>";
            }
        }
        else{
            print '<div class="erro_consulta_noticia_recente"><h5>Não há publicações recentes.</h5></div>';
        }?>
    </div>
</div>
<div class="footer-coluna">

</div>