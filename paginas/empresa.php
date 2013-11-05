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
                            <img src="../img/bmw_3.jpg" />
                        </div>
                    </div>            

                    <div class="empresa-texto-content">
                        <p>
                            A <b>Full Mottors</b>, inaugurada em
                            Setembro de 2012 , traz para Ponta Grossa e região um 
                            <b>novo conceito</b> em loja de motos, acessórios, 
                            equipamentos e manutenção. 
                        </p>

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
                                <img src="<?php print $path_img . '/foto-fachada.jpg' ?>" />
                            </div>

                            <div class="clear"></div> 
                        </div>  

                        <div class="divisor"></div>
                        <div class="degrade"></div>

                        <div class="empresa-texto-content-secao empresa-texto-content-secao-impar">

                            <div class="coluna5 coluna-inicial">
                                <img src="../img/bmw_3.jpg" />
                            </div>

                            <div class="coluna7 ">
                                <h3>NOSSAS <b>MOTOS</b></h3>
                                A <b>Full Mottors</b> foi inaugurada em
                                Setembro de 2012 , é uma empresa que 
                                traz para Ponta Grossa e região um 
                                <b>novo conceito</b> em loja de motos, acessórios, 
                                equipamentos e manutenção. 
                            </div>

                            <div class="clear"></div> 
                        </div>  

                        <div class="divisor"></div>
                        <div class="degrade"></div>

                        <div class="empresa-texto-content-secao">
                            <div class="coluna7 coluna-inicial">
                                <h3>NOSSA <b>BOUTIQUE</b></h3>
                                A <b>Full Mottors</b> foi inaugurada em
                                Setembro de 2012 , é uma empresa que 
                                traz para Ponta Grossa e região um 
                                <b>novo conceito</b> em loja de motos, acessórios, 
                                equipamentos e manutenção. 
                            </div>

                            <div class="coluna5">
                                <img src="../img/bmw_3.jpg" />
                            </div>

                            <div class="clear"></div> 
                        </div>  

                        <div class="divisor"></div>
                        <div class="degrade"></div>

                        <div class="empresa-texto-content-secao">

                            <div class="coluna5 coluna-inicial">
                                <img src="../img/bmw_3.jpg" />
                            </div>

                            <div class="coluna7 ">
                                <h3>NOSSA <b>OFICINA</b></h3>
                                A <b>Full Mottors</b> foi inaugurada em
                                Setembro de 2012 , é uma empresa que 
                                traz para Ponta Grossa e região um 
                                <b>novo conceito</b> em loja de motos, acessórios, 
                                equipamentos e manutenção. 
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