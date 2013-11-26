<?php
require_once '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Empresa | Full Mottors
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta name="description" content="A Full Mottors é uma loja especializada em motos de alta cilindrada e equipamentos."/>
    <meta property="og:title" content=" Empresa |Full Mottors">
    <meta name="og:description" content="A Full Mottors é uma loja especializada em motos de alta cilindrada e equipamentos."/>
    <meta property="og:site_name" content="Full Mottors"/>
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="http://www.fmottors.com.br/new/img/logo_mini.png"/>
    <meta property="og:locale" content="pt_BR">

    <?php
    require_once APP_TEMPLATE . 'css_scripts.php';
    ?>
</head>
    <body>
        <?php
        require_once APP_TEMPLATE . 'header.php';
        ?>

        <div class="empresa_content">
            <div class="wrapper">
                <h1>A Empresa</h1>
                <div class="empresa-texto"> 

                    <div>
                        <h1> <b>FULL</b> MOTTORS - VICIADOS EM <b>VELOCIDADE</b></h1>

                        <div class="empresa-texto-img_head">
                            <img src="<?php print $path_img . '/empresa_logo.jpg' ?>" />
                        </div>
                    </div>

                    <div class="empresa-texto-content">
                        <div class="empresa-texto-content-secao">
                            <div class="coluna7 coluna-inicial">
                                <h3>NOSSA <b>LOJA</b></h3>
                                A <b>Full Mottors</b> foi inaugurada em
                                Setembro de 2012 , é uma empresa que 
                                traz para Ponta Grossa e região um 
                                <b>novo conceito</b> em loja de motos, acessórios, 
                                equipamentos e manutenção. 
                            </div>

                            <div class="coluna5">
                                <img src="<?php print $path_img . '/empresa_fachada.jpg' ?>" />
                            </div>

                            <div class="clear"></div> 
                        </div>  

                        <div class="divisor"></div>
                        <div class="degrade"></div>

                        <div class="empresa-texto-content-secao empresa-texto-content-secao-impar">

                            <div class="coluna5 coluna-inicial">
                                <img src="<?php print $path_img . '/empresa_motos.jpg' ?>" />
                            </div>

                            <div class="coluna7 ">
                                <h3>NOSSAS <b>MOTOS</b></h3>
                                A <b>Full Mottors</b> é especializada em motos de alta cilindrada. Na nossa
                                garagem você encontra motos BMW, Kawasaki e diversas outras grandes marcas.
                            </div>

                            <div class="clear"></div> 
                        </div>  

                        <div class="divisor"></div>
                        <div class="degrade"></div>

                        <div class="empresa-texto-content-secao">
                            <div class="coluna7 coluna-inicial">
                                <h3>NOSSA <b>BOUTIQUE</b></h3>
                             Os equipamentos vendidos em nossa loja sã reconhecidos mundialmente,
                                marcas famosas utilizadas pelos diversos pilotos do mundial <b>MotoGP</b> e <b>WSBK</b>.
                            </div>

                            <div class="coluna5">
                                <img src="<?php print $path_img . '/empresa_boutique.jpg' ?>" />
                            </div>

                            <div class="clear"></div> 
                        </div>  

                        <div class="divisor"></div>
                        <div class="degrade"></div>

                        <div class="empresa-texto-content-secao">

                            <div class="coluna5 coluna-inicial">
                                <img src="<?php print $path_img . '/empresa_oficina.jpg' ?>" />
                            </div>

                            <div class="coluna7 ">
                                <h3>NOSSA <b>OFICINA</b></h3>
                                Uma <b>oficina multimarcas</b>, disponibilizando uma grande variedade de
                                serviços - desde a aparência até a performance - utilizando da mais alta tecnologia presente no
                                mercado.
                            </div>                    

                            <div class="clear"></div> 
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once '../template/footer.php'
        ?>
    </body>
</html>