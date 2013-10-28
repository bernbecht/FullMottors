<!DOCTYPE html>
<html>
    <?php
    require_once '../config.php';
    require_once '../template/head.php';
    ?>
    <body>
        <?php
        require_once '../template/header.php';
        ?>

        <div class="motos_content">
            <div id="moto_modalidade_control">
                <div class="moto_novas_btn">
                    <a href="<?php echo $path_paginas.'/motos_novas.php'?>">
                        <div class="wrapper">
                            <div class="motos-texto">
                                <h1>MOTOS <span>0 KM</span></h1>
                                <p>A Full Mottors é especializada em motos de alta cilindrada.
                                    Aqui você encontra toda a linha da BMW e Kawasaki</p>
                            </div>

                            <div class="motos-divisor">
                                <div class="triangulo-direita"></div>
                            </div>

                            <div class="motos-img">
                                <img src="../img/bmw_3.jpg" />
                            </div>

                            <div class="clear"></div>
                        </div> 
                    </a>
                </div>

                <div class="moto_semi_btn">
                    <a href="<?php echo $path_paginas.'/motos_seminovas.php'?>">
                        <div class="wrapper">
                            <div class="motos-img">
                                <img src="../img/bmw_1.jpg" />
                            </div>

                            <div class="motos-divisor">
                                <div class="triangulo-esquerda"></div>
                            </div>

                            <div class="motos-texto">
                                <h1><span class="text_color_black">MOTOS </span><span class="text_color_white">SEMI-NOVAS</span></h1>
                                <p>Também contamos com vários modelos semi-novos de várias marcas. Clique aqui e conheça as motos na nossa garagem.</p>
                            </div>

                            <div class="clear"></div>
                        </div> 
                    </a>
                </div>

            </div>

        </div>

        <?php
        require_once '../template/footer.php';
        ?>


    </body>
    <script type="text/javascript" src="<?php print $path_js . 'motos.js' ?>"></script>
</html>
