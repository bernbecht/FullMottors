<?php
require_once '../config.php';
require_once '../classes/CNoticia.php';
require_once '../classes/CVisitas.php';

$id = $_GET['id'];

$noticia = new CNoticia;
$visita = new CVisitas;

//consulta a noticia em questão
$consulta = $noticia->getNoticiaId($id);

$num_rows = pg_num_rows($consulta);

//pega data para inserir na VISITA
$data = date("Y-m-d");

//inclui visualização
$visita->incluirVisita($id, 2, $data);

//faz fetch da consulta da NOTICIA
$fetch = pg_fetch_object($consulta);
?>

<!DOCTYPE html>
<html>


    <head>
        <title>
            <?php print $fetch->manchete.'|Full Mottors'?>
        </title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta property="og:title" content=" Boutique- Full Mottors">


        <meta name="description" content="Confira os melhores equipamentos para a sua moto."/>
        <meta name="og:description" content="Confira os melhores equipamentos para a sua moto."/>
        <meta property="og:site_name" content="Full Mottors"/>
        <meta property="og:type" content="article"/>
        <meta property="og:img" content="http://www.fmottors.com.br/new/img/logo_mini.png"/>
        <meta property="og:locale" content="pt_BR">

        <?php
        require_once APP_TEMPLATE . 'css_scripts.php';
        ?>
    </head>

    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


        <?php
        require_once '../template/header.php';
        ?>


        <?php
        print '<div class="noticia_content">
    <div class="wrapper">';

        if ($num_rows > 0) {

            //$fetch = pg_fetch_object($consulta);

            $consulta2 = $noticia->getNoticiasRecentes(3);

            $num_rows_recentes = pg_num_rows($consulta2);


            print '<div class="coluna8 coluna-inicial">
            <h1>
                ' . $fetch->manchete . '
            </h1>
            <div class="social-likes">
                <ul>
                    <li>';

            setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
            date_default_timezone_set('America/Sao_Paulo');

            $date = $fetch->data;
            print utf8_encode(strftime("%A, %d de %B de %Y", strtotime($date)));

            print '</li>
               <li><div class="fb-like" data-href="http://fmottors.com.br/paginas/noticia.php?id=' . $id . '" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false"></div></li>
                </ul>
            </div>
            <div class="post">
                ' . $fetch->post . '
            </div>
        </div>';

            print '<div class="coluna4">
            <div>
                <div class="top-coluna news">
                    Últimas Notícias
                </div>';

            if ($num_rows_recentes > 0) {
                while ($fetch_recente = pg_fetch_object($consulta2)) {

                    $date = $fetch_recente->data;
                    $date = utf8_encode(strftime("%d de %B de %Y", strtotime($date)));

                    print '<div class="noticia">
                    <a href="noticia.php?id=' . $fetch_recente->id_noticia . '">
                        <div class="noticia-foto">
                            <img src="../img/noticias/' . $fetch_recente->nome_img . '" />
                        </div>

                        <div class="noticia-texto">
                            <div class="manchete_noticia">' . $fetch_recente->manchete . '</div>
                            <div class="data_noticia">' . $date . '</div> 
                        </div>     
                        <div class="clear"></div>
                    </a>
                </div>';
                }
            } else {
                print '<div class="erro_consulta_noticia_recente"><h5>Não há publicações recentes</h5></div>';
            }

            print' </div>
            <div class="fb-like-box" data-href="http://www.facebook.com/pages/Full-Mottors/433570620033884?fref=ts" data-width="304" data-show-faces="true" data-stream="false" data-header="true"></div>
        </div>
        <div class="clear"></div>';
        } else {
            print '<h1>Página ou publicação inexistente</h1>';
        }

//fechamento DIV do CONTENT e do WRAPPER
        print '</div>
    </div>';
        ?>

        <?php
        require_once '../template/footer.php';
        ?> 

    </body>
</html>