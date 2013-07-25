<?php
include($_SERVER['DOCUMENT_ROOT']."/new/config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bernardo</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta property="og:title" content="the definition of yacht">
        <meta name="description" content="Yacht definition, a vessel used for private cruising, racing, or other noncommercial purposes. See more.">
        <meta property="og:image" content="http://static.sfdict.com/sh/i/dict/social_logo.jpg">
        <link rel="stylesheet" href="<?php print $path_css . 'bootstrap.css' ?>"/>
        <link rel="stylesheet" href="<?php print $path_css . 'bootstrap-responsive.css' ?>"/>
        <link rel="stylesheet" href="<?php print $path_css . 'scaffolding.css' ?>"/>
        <link rel="stylesheet" href="<?php print $path_css . 'index_1.css' ?>"/>  
        <link rel="stylesheet" href="<?php print $path_css . 'carosel_1.css' ?>"/>     


        <script type="text/javascript" src="<?php print $path_js . 'jquery.js' ?>"></script>
        <script type="text/javascript" src="<?php print $path_js . 'bootstrap.js' ?>"></script>
        <script type="text/javascript" src="<?php print $path_js . 'index.js' ?>"></script>
        <script type="text/javascript" src="<?php print $path_js . 'transitions.js' ?>"></script>
        <script type="text/javascript" src="<?php print $path_js . 'carosel.js' ?>"></script>
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

        <header>
            <div class="wrapper">
                <div class="content">
                    <p>
                        <a href="<?php print $path . 'index.php' ?>"><img src="<?php print $path . 'img/logo3.png' ?>" /></a>
                    </p>
                    <div class="contato_header">
                        <div class="esquerda">

                        </div>
                        <div class="direira">

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </header>

        <nav>
            <div class="wrapper">
                <div class="content">
                    <ul class="navegacao">
                        <li><a id="motos-nav" href="<?php print $path . 'paginas/motos.php' ?>">Motos</a></li>
                        <li><a id="boutique-nav" href="<?php print $path . 'paginas/boutique.php' ?>">Boutique</a></li>
                        <li><a id="noticia-nav" href="<?php print $path . 'paginas/noticia_teaser.php' ?>">Notícias</a></li>
                        <li><a id="servicos-nav" href="<?php print $path . 'paginas/servicos.php' ?>">Serviços</a></li>                        
                        <li><a id="empresa-nav" href="<?php print $path . 'paginas/empresa.php' ?>">Empresa</a></li>
                        <li><a id="contato-nav" href="<?php print $path . 'paginas/contato.php' ?>">Contato</a></li>
                        <div class="clear"></div>
                    </ul>

                </div>
            </div>
        </nav>