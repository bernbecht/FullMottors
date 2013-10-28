<?php
require_once '../config.php';
require_once APP_CLASSES.'CProduto.php';

$produto = new CProduto;
$lancamentos = $produto->consutaRecentes(8);
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Boutique |Full Mottors
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="og:title" content=" Boutique |Full Mottors">


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
<?php
require_once APP_TEMPLATE.'header.php';
?>

<div class="boutique_content under_construction_page">
    <div class="wrapper">
        <div class="coluna-row">
            <div class="coluna12 coluna-inicial">
                <div class="">
                    <h1>Boutique e Acessórios</h1>
                    <p>Desculpe, mas esta parte está em construção. <br>Mas você conferir as
                        <a href="<?php print $path_paginas.'/motos.php'?>">motos da nossa loja
                        </a> ou <a href="<?php print $path_paginas.'/contato.php'?>">mandar um Oi para nós.</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once APP_TEMPLATE.'footer.php';
?>
</body>
<script type="text/javascript" src="<?php print $path_js . 'boutique.js' ?>"></script>
</html>