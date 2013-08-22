<?php
    include_once 'config.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Full Mottors - Multimarcas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/bootstrap-responsive.css"/>
        <link rel="stylesheet" href="css/scaffolding.css"/>
        <link rel="stylesheet" href="css/index_1.css"/>  
        <link rel="stylesheet" href="css/carosel_1.css"/>  
        


        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>        
        <script type="text/javascript" src="js/transitions.js"></script>
        <script type="text/javascript" src="js/carosel.js"></script>
    </head>
    <body>
        <header>
            <div class="wrapper">
                <div class="content">
                    <p>
                        <a href="#"><img src="img/logo3.png" /></a>
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
                        <li><a class="" href="paginas/motos.php">Motos</a></li>
                        <li><a href="paginas/boutique.php">Boutique</a></li>
                        <li><a href="paginas/noticia_teaser.php">Notícias</a></li>
                        <li><a href="paginas/servicos.php">Serviços</a></li>                        
                        <li><a href="paginas/empresa.php">Empresa</a></li>
                        <li><a href="paginas/contato.php">Contato</a></li>
                        <div class="clear"></div>
                    </ul>

                </div>
            </div>
        </nav>




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
                                <h1><span>Boutique</span></h1>
                                <h1 class="segundo_h1">e Acessórios</h1>
                            </div>
                            <div class="texto-carosel">
                                Os <b>equipamentos</b> vendidos na nossa loja são <b>reconhecidos mundialmente</b>, utilizados pelos
                                pilotos do mundial do <b>MotoGP</b> e do <b>WSBK</b>.
                            </div>
                            <div class="link_carosel_container">
                                <a href="<?php print $path_paginas."/boutique.php"?>" class=""><div class="link_carosel_texto">Veja mais</div></a>
                            </div>
                        </div>
                        <div class="slide_img">
                            <img src="img/bmw_2.jpg" />
                        </div>
                    </div>
                    <div class="slide3">
                        <div class="slide_text">
                            <div class="manchete">
                                <h1>Serviços e </h1>
                                <h1 class="segundo_h1"><span>Manutenção</span></h1>
                            </div>
                            <div class="texto-carosel">
                                <p>A nossa oficina está preparada para cuidar da sua moto do jeito que ela merece.</p>
                            </div>
                            <div class="link_carosel_container">
                                <a href="<?php print $path_paginas."/servicos.php"?>" class=""><div class="link_carosel_texto">Conheça os nossos Serviços</div></a>
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
                                            As melhores marcas para a melhor proteção. Veja mais.
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
                                            <div class="manchete_noticia">Olá crianças como vão?</div>
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
                                            <div class="manchete_noticia">Olá crianças como vão?</div>
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
                                            <div class="manchete_noticia">Olá crianças como vão?</div>
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



        <footer>
            <div class="wrapper">
                <div class="box-footer-container">
                    <div class="box-footer">
                        <div class="box-footer-top">
                            Entre em Contato
                        </div>
                        <a href="paginas/contato.php">
                            <div class="box-footer-content-bk box-footer-content-bk-msg"></div>
                        </a>  
                    </div>
                    <div class="box-footer">
                        <div class="box-footer-top">
                            Visite nossa Loja
                        </div>
                        <div class="box-footer-content">
                            <p>Av. Ernesto Vilela, 1902</p>
                            <p>Ponta Grossa, PR</p>
                            <p>(42) 3227-1223</p>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="box-footer-top">
                            Curta Full Mottors 
                        </div>
                        <a href="http://www.facebook.com/pages/Full-Mottors/433570620033884" target="_blank">
                            <div class="box-footer-content-bk box-footer-content-bk-fb"></div>
                        </a>                        
                    </div>                    
                    <div class="clear"></div>  
                </div> 
            </div>
            <div class="menu-footer-container">
                <div class="wrapper">
                    <div class="menu-footer">
                        <ul class="">
                            <li><a href="paginas/motos.php">Motos</a></li>
                            <li><a href="paginas/boutique.php">Boutique</a></li>
                            <li><a href="paginas/servicos.php">Serviços</a></li>
                            <li><a href="paginas/notcia_teaser.php">Notícias</a></li>
                            <li><a href="paginas/empresa.php">Empresa</a></li>
                            <li><a href="paginas/contato.php">Contato</a></li>   

                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>
