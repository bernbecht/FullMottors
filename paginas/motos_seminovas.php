<?php
require_once '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Motos Semi-Novas | Full Mottors
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
    <script type="text/javascript" src="<?php print $path_js . 'motos_seminovas.js' ?>"></script>
</head>

<body>
<?php
require_once APP_TEMPLATE . 'header.php';
?>
<div id="btn_troca_para_0km" class="cantoneira">
    <a href="<?php echo $path_paginas.'/motos_novas.php'?>">
        <div class="cantoneira_texto">
            CONHEÇA AS<br /> MOTOS 0 Km
        </div>
    </a>
</div>


<div class ="motos_content">
    <div class="load_image">
        <img src="<?php echo $path_img.'/load.gif'?>" />
    </div>
</div>
<?php
require_once APP_TEMPLATE . 'footer.php';
?>
</body>
</html>