<?php
    include_once 'config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Full Mottors - Multimarcas
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="og:title" content=" Full Mottors - Multimarcas">


    <meta name="description" content="A Full Mottors é uma loja especializada em motos de alta cilindrada e equipamentos."/>
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
require_once APP_TEMPLATE.'header.php';
?>

 <div class="carosel">
            <div id="backBtnCarosel" class="arrow left_arrow"></div>
            <div class="wrapper">
                <div class="carosel-content">
                    <div class="slide1">
                        <div class="slide_text">
                            <div class="manchete">
                                <h1>Linha de <span>Motos</span></h1>
                            </div>
                            <div class="texto-carosel">
                                A <b>Full Mottors</b> é especializada em motos de <b>alta cilindrada</b>.
                                Na nossa garagem, você encontra motos <b>BMW</b> e <b>Kawasaki 0 KM</b>  e diversas outras <b>semi-novas</b>.
                            </div>
                            <div class="link_carosel_container">
                                <a href="<?php print $path_paginas."/motos.php"?>" class=""><div class="link_carosel_texto">Conheça as nossas Motos</div></a>
                            </div>
                        </div>
                        <div class="slide_img">
                            <img src="img/bmw_1.jpg" />
                        </div>
                    </div>
                    <div class="slide2">
                        <div class="slide_text">
                            <div class="manchete">
                                <h1><span>Boutique</span><br>e Acessórios</h1>
                            </div>
                            <div class="texto-carosel">
                                Os <b>equipamentos</b> vendidos na nossa loja são <b>reconhecidos mundialmente</b>, utilizados pelos
                                pilotos do mundial do <b>MotoGP</b> e do <b>WSBK</b>.
                            </div>
                            <div class="link_carosel_container">
                                <a href="<?php print $path_paginas."/boutique.php"?>" class=""><div class="link_carosel_texto">Em Breve Catálogo Online</div></a>
                            </div>
                        </div>
                        <div class="slide_img">
                            <img src="img/bmw_2.jpg" />
                        </div>
                    </div>
                    <div class="slide3">
                        <div class="slide_text">
                            <div class="manchete">
                                <h1>Serviços e <span>Manutenção</span></h1>
                            </div>
                            <div class="texto-carosel">
                                <p>A nossa oficina está preparada para cuidar da sua moto do jeito que ela merece.</p>
                            </div>
                            <div class="link_carosel_container">
                                <a href="<?php print $path_paginas."/servicos.php"?>" class=""><div class="link_carosel_texto">Em Breve Catálogo Online</div></a>
                            </div>
                        </div>
                        <div class="slide_img">
                            <img src="img/bmw_3.jpg" />
                        </div>
                    </div>
                </div>
                <div class="controle_carrosel">
                    <div id="control_carosel-1" class="control control-active"></div>
                    <div id="control_carosel-2" class="control"></div>
                    <div id="control_carosel-3" class="control"></div>
                </div> 
            </div>
            <div id="nextBtnCarosel" class="arrow right_arrow"></div>
        </div>



        <div class="main">
            <div class="wrapper">
                <div class="triangulo-sem-borda"></div>
                <div class="coluna-row">
                    <div class="coluna4 coluna-inicial">
                        <a href="<?php print $path_paginas."/empresa.php"?>">
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
                        <a href="<?php print $path_paginas."/boutique.php"?>">
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
                        <div class="body-coluna">
                            <div class="coluna-content">
                                <div class="noticia">
                                    <a href="#">
                                        <div class="noticia-foto">
                                            <img src="img/bmw_5.jpg" />
                                        </div>

                                        <div class="noticia-texto">
                                            <div class="manchete_noticia"><p>Olá crianças como vão?</p></div>
                                            <div class="data_noticia">21/09/1990</div> 
                                        </div>     
                                        <div class="clearfix"></div>
                                    </a>
                                </div>
                                <div class="noticia">
                                    <a href="#">
                                        <div class="noticia-foto">
                                            <img src="img/bmw_6.jpg" />
                                        </div>

                                        <div class="noticia-texto">
                                            <div class="manchete_noticia"><p>Olá crianças como vão?</p></div>
                                            <div class="data_noticia">21/09/1990</div> 
                                        </div>     
                                        <div class="clearfix"></div>
                                    </a>
                                </div>
                                <div class="noticia">
                                    <a href="#">
                                        <div class="noticia-foto">
                                            <img src="img/bmw_1.jpg" />
                                        </div>

                                        <div class="noticia-texto">
                                            <div class="manchete_noticia"><p>Olá crianças como vão?</p></div>
                                            <div class="data_noticia">21/09/1990</div> 
                                        </div>     
                                        <div class="clearfix"></div>
                                    </a>
                                </div>                                

                            </div>
                        </div>
                        <div class="footer-coluna">

                        </div>                   
                    </div>   
                    <div class="clear"></div>
                </div>
            </div>
        </div>

<?php
require_once APP_TEMPLATE.'footer.php';
?>
    </body>
</html>
