<?php
    require_once '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>
          Motos 0 KM - Full Mottors
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="og:title" content=" BMW F 800 GS - Full Mottors">


    <meta name="description" content="Confira a BMW F 800 GS 0 Km na Full Mottors - Multimarcas"/>
    <meta name="og:description" content="Confira a BMW F 800 GS 0 Km na Full Mottors - Multimarcas"/>
    <meta property="og:site_name" content="Full Mottors"/>
    <meta property="og:type" content="article"/>
    <meta property="og:img" content="http://www.fmottors.com.br/new/img/logo_mini.png"/>
    <meta property="og:locale" content="pt_BR">

    <?php
    require_once APP_TEMPLATE . 'css_scripts.php';
    ?>
    <script type="text/javascript" src="<?php print $path_js . 'motos.js' ?>"></script>
</head>

<body>
    <?php
    require_once APP_TEMPLATE . 'header.php';
    ?>
    <div class ="motos_content">
        <div id="motos_novas">
            <div class="wrapper">
                <div class="titulo_pagina">
                    <h1> MOTOS 0 KM</h1>
                    <div id="btn_troca_para_semi" class="cantoneira">
                        <a href="<?php echo $path_paginas.'/motos_seminovas.php' ?>">
                            <div class="cantoneira_texto">
                                CONHEÇA AS<br /> SEMI-NOVAS
                            </div>
                        </a>
                    </div></div>
                <div class="motos_categorias">
                    <ul>
                        <li><a href="javascript:;"><div class="enduro motos_categorias_ativa"></div></a></li>
                        <li><a href="javascript:;"><div class="sport"></div></a></li>
                        <li><a href="javascript:;"><div class="roadster"></div></a></li>
                        <li><a href="javascript:;"><div class="tour"></div></a></li>
                    </ul>
                </div>
                <div class="motos_painel">
                    <div class="motos_titulo">
                        <h2>ENDURO</h2>
                    </div>
                    <div class="motos_lista">
                        <ul>
                            <li><a href="<?php echo $path_paginas.'/motos/r1200gsa.php'?>"><img src="<?php echo $path_img.'/enduro/r1200gsa.jpg' ?>" /><div class="motos_nome">BMW R 1200 GS Adventure</div></a></li>
                            <li><a href="<?php echo $path_paginas.'/motos/r1200gs.php'?>"><img src="<?php echo $path_img.'/enduro/200gs.jpg' ?>" /><div class="motos_nome">BMW R 1200 GS</div></a></li>
                            <li><a href="<?php echo $path_paginas.'/motos/f800gs.php'?>"><img src="<?php echo $path_img.'/enduro/f800gs.jpg' ?>" /><div class="motos_nome">BMW F 800 GS</div></a></li>
                            <li><a href="<?php echo $path_paginas.'/motos/g650gs.php'?>"><img src="<?php echo $path_img.'/enduro/g650.jpg' ?>" /><div class="motos_nome">BMW G 650 GS</div></a></li>
                            <li><a href="<?php echo $path_paginas.'/motos/g650gs_sertao.php'?>"><img src="<?php echo $path_img.'/enduro/GS_sertao.jpg' ?>" /><div class="motos_nome">BMW G 650 GS SERTÃO</div></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once APP_TEMPLATE . 'footer.php';
    ?>
</body>
</html>