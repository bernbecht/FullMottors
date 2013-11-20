<?php
require_once '../config.php';
require_once APP_CLASSES . 'CNoticia.php';

$id = $_GET['id'];

$noticia = new CNoticia;

//consulta a noticia em questão
$consulta = $noticia->getNoticiaId($id);

$num_rows = pg_num_rows($consulta);

//pega data para inserir na VISITA
$data = date("Y-m-d");

//faz fetch da consulta da NOTICIA
$fetch = pg_fetch_object($consulta);
?>

<!DOCTYPE html>
<html>


<head>
    <title>
        <?php print $fetch->manchete . ' | Full Mottors' ?>
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="og:title" content=" Boutique- Full Mottors">


    <meta name="description" content="Confira os melhores equipamentos para a sua moto."/>
    <meta name="og:description" content="Confira os melhores equipamentos para a sua moto."/>
    <meta property="og:site_name" content="Full Mottors"/>
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="http://www.fmottors.com.br/new/img/logo_mini.png"/>
    <meta property="og:locale" content="pt_BR">

    <?php
    require_once APP_TEMPLATE . 'css_scripts.php';
    ?>
</head>

<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<?php
require_once '../template/header.php';
?>

<div class="noticia_content">
    <div class="wrapper">
        <div class="coluna8 coluna-inicial">
            <?php
            if ($num_rows > 0) {

                //$fetch = pg_fetch_object($consulta);

                $consulta2 = $noticia->getNoticiasRecentes(3);

                $num_rows_recentes = pg_num_rows($consulta2);


                print '
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
            </div>';
            } else {
                print '<h1>Página ou publicação inexistente</h1>';
            }
            ?>
        </div>
        <div class="coluna4">
            <div class="top-coluna news">
                Últimas Notícias
            </div>
            <?php
            require_once APP_TEMPLATE . 'ultimas_noticias.php';
            ?>
            <div class="fb-like-box"
                 data-href="http://www.facebook.com/pages/Full-Mottors/433570620033884?fref=ts"
                 data-width="304" data-show-faces="true" data-stream="false" data-header="true"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>




<?php
require_once '../template/footer.php';
?>

</body>
</html>