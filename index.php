<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Full Mottors - Multimarcas
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta property="og:title" content=" Full Mottors - Multimarcas"/>


    <meta name="description"
          content="A Full Mottors é uma loja especializada em motos de alta cilindrada e equipamentos."/>
    <meta name="og:description"
          content="A Full Mottors é uma loja especializada em motos de alta cilindrada e equipamentos."/>
    <meta property="og:site_name" content="Full Mottors"/>
    <meta property="og:type" content="article"/>
    <meta property="og:img" content="http://www.fmottors.com.br/new/img/logo_mini.png"/>
    <meta property="og:locale" content="pt_BR"/>

    <?php
    require_once APP_TEMPLATE . 'css_scripts.php';
    ?>
</head>

<body>

<?php
require_once APP_TEMPLATE . 'header.php';
?>
<?php
require_once APP_TEMPLATE . 'carosel.php';
?>

<div class="main">
    <div class="wrapper">
        <div class="triangulo-sem-borda"></div>
        <div class="coluna-row">
            <div class="coluna4 coluna-inicial">
                <a href="<?php print $path_paginas . "/empresa.php" ?>">
                    <div class="top-coluna">
                        Full Mottors
                    </div>
                    <div class="body-coluna">
                        <div class="coluna-content">
                            <div class="coluna-background coluna-bk1"></div>
                            <div class="legenda">
                                <div class="legenda-content">
                                    Somos viciados em velocidade. Conheça mais sobre a nossa loja.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-coluna">

                    </div>
                </a>
            </div>

            <div class="coluna4">
                <a href="<?php print $path_paginas . "/boutique.php" ?>">
                    <div class="top-coluna">
                        Boutique
                    </div>
                    <div class="body-coluna">
                        <div class="coluna-content">
                            <div class="coluna-background coluna-bk2"></div>
                            <div class="legenda">
                                <div class="legenda-content">
                                    As melhores marcas para a melhor proteção. Em breve catálogo online.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-coluna">

                    </div>
                </a>
            </div>

            <div class="coluna4 ">
                <div class="top-coluna news">
                    Últimas Notícias
                </div>
                <?php
                require_once APP_TEMPLATE . 'ultimas_noticias.php';
                ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

<?php
require_once APP_TEMPLATE . 'footer.php';
?>
</body>
<script type="text/javascript" src="<?php print $path_js . 'home.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        alert('index');
    });
</script>
</html>
