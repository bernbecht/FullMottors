<!DOCTYPE html>
<html>
    <?php
    require_once '../template/head.php';
    require_once '../template/header.php';
    ?>
    <body>
        <?php
        require_once '../template/header.php';
        ?>

        <div class="motos_content">
            <div id="moto_modalidade_control">
                <div class="moto_novas_btn">
                    <a href="javascript:;">
                        <div class="wrapper">
                            <div class="motos-texto">
                                <h1>MOTOS <span>0 KM</span></h1>
                                A FULL MOTTORS é a única loja da cidade que possui os modelos 0 KM das motos BMW. 
                                <div>Clique aqui e confira o nosso catálogo.</div>
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
                    <a href="javascript:;">
                        <div class="wrapper">
                            <div class="motos-img">
                                <img src="../img/bmw_1.jpg" />
                            </div>

                            <div class="motos-divisor">
                                <div class="triangulo-esquerda"></div>
                            </div>

                            <div class="motos-texto">
                                <h1><span>MOTOS</span> SEMI-NOVAS</h1>

                                Além dos modelos 0 KM, a FULL MOTTORS possui vários modelos de semi-novas 
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
