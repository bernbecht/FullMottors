<?php
require_once '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Serviços | Full Mottors
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta name="description" content="A Full Mottors é uma loja especializada em motos de alta cilindrada e equipamentos."/>
    <meta property="og:title" content=" Serviços |Full Mottors">
    <meta name="og:description" content="A Full Mottors é uma loja especializada em motos de alta cilindrada e equipamentos."/>
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
        require_once APP_TEMPLATE . 'header.php';
        ?>
        <div class="servicos_content">
            <div class="wrapper">
                <h1>Serviços</h1>
            </div>
            <div class="servicos-painel">
                <div class="wrapper">
                    <div class="servicos-conteudo-container">
                        <div class="servicos-conteudo" >
                            <div class="coluna6 coluna-inicial">
                                <h1>VENHA DAR UM <span>TRATO</span></h1>
                                <h1><span>NA SUA</span> MOTO</h1>
                                Nossa loja possui uma oficina multimarcas, disponibilizando uma grande variedade de serviços - desde a 
                                aparência até a performance - utilizando da mais alta
                                tecnologia no mercado. Entre em contato e nos deixe cuidar da sua moto.
                            </div>
                            
                            <div class="coluna6">
                                <img src="<?php print $path_img.'/servicos.jpg'?>" />
                            </div>
                        </div>

                    </div>   
                </div>
            </div>
        </div>

        <?php
        require_once '../template/footer.php';
        ?>
    </body>
</html>