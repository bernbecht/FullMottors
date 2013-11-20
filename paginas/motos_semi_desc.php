<?php
require_once '../config.php';
require_once '../classes/CSemi.php';
require_once '../classes/CImagem.php';
require_once '../classes/CVisitas.php';

$id = $_GET['id'];

$semi = new CSemi;
$img = new CImagem;
$visita = new CVisitas;

$data = date("Y-m-d");

$visita->incluirVisita($id, 3, $data);


$consulta = $semi->getSemiNovasById($id);

$consultaImg = $img->consultaImgGenerico($id, 3, 2);

$fetch = pg_fetch_object($consulta);

$fetchImg = pg_fetch_object($consultaImg);

$preco = number_format($fetch->preco, 2, ',', '');
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        <?php print mb_strtoupper($fetch->marca) . ' ' . mb_strtoupper($fetch->modelo) . ' ' . mb_strtoupper($fetch->cor) . ' ' . mb_strtoupper($fetch->ano) ?>
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="og:title" content=" <?php print mb_strtoupper($fetch->marca) . ' ' . mb_strtoupper($fetch->modelo) . ' ' . mb_strtoupper($fetch->cor) . ' ' . mb_strtoupper($fetch->ano) ?>">


    <meta name="description" content="Confira as motos semi-novas da Full Mottors - Multimarcas"/>
    <meta name="og:description" content="Confira as motos semi-novas da Full Mottors - Multimarcas"/>
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
        require_once '../template/header.php';
        ?>
        <div class="motos_content">
            <div id="moto_desc">
                <div class="wrapper">
                    <div class="titulo_pagina">
                        <h1><?php print mb_strtoupper($fetch->marca) . ' ' . mb_strtoupper($fetch->modelo) . ' ' . mb_strtoupper($fetch->cor) . ' ' . mb_strtoupper($fetch->ano) ?></h1> 
                        <ul class="breadcrumb">
                            <li><a class="retorna_semi" href="<?php echo $path_paginas.'/motos_seminovas.php'?>">Motos Semi-Novas</a> <span class="divider">/</span></li>
                            <li class="active"><?php print mb_strtoupper($fetch->marca) . ' ' . mb_strtoupper($fetch->modelo) ?></li>
                        </ul>

                        <div id="btn_troca_para_0km" class="cantoneira">
                            <a href="javascript:;">
                                <div class="cantoneira_texto">
                                    CONHEÇA AS<br /> MOTOS 0 Km
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="moto_desc-galeria">
                        <div class="moto_desc-thumbMain">
                            <?php print '<img src="../img/seminovas/' . $fetchImg->nome_img . '" />'; ?>
                        </div>
                        <div class="moto_desc-thumb_semi">
                            <ul>

                                <?php
                                do {
                                    print '<li><img src="../img/seminovas/' . $fetchImg->nome_img . '" /></li>';
                                } while ($fetchImg = pg_fetch_object($consultaImg));
                                ?>                        


                            </ul>
                        </div> 
                        <div class="clear"></div>
                    </div>

                    <div class="moto_dados">
                        <div class="lista_dados_moto">
                            <h3>Dados Técnicos</h3>
                            <table class="table table-condensed table-hover">

                                <tr>
                                    <td>Preço</td>
                                    <td>R$ <?php print $preco; ?></td>
                                </tr>
                                <tr>
                                    <td>Quilometragem</td>
                                    <td><?php print mb_strtoupper($fetch->km); ?></td>
                                </tr>
                                <tr>
                                    <td>Estilo</td>
                                    <td><?php print ucfirst($fetch->estilo); ?></td>
                                </tr>
                                <tr>
                                    <td>Tipo de Motor</td>
                                    <td><?php print ucfirst($fetch->motor); ?></td>
                                </tr>
                                <tr>
                                    <td>Cilindrada</td>
                                    <td><?php print mb_strtoupper($fetch->cilindradas); ?></td>
                                </tr>
                                <tr>
                                    <td>Potência (CV)</td>
                                    <td><?php print mb_strtoupper($fetch->potencia); ?></td>
                                </tr>
                                <tr>
                                    <td>Refrigeração</td>
                                    <td><?php print ucfirst($fetch->refrigeracao); ?></td>
                                </tr>
                                <tr>
                                    <td>Partida</td>
                                    <td><?php print ucfirst($fetch->partida); ?></td>
                                </tr> 
                                <tr>
                                    <td>Bolsas</td>
                                    <td><?php print ucfirst($fetch->bolsas); ?></td>
                                </tr>  
                                <tr>
                                    <td>Suspesão eletrônica (ESA)</td>
                                    <td><?php
                                if ($fetch->esa == 'f')
                                    print 'Não';
                                else
                                    print 'Sim';
                                ?></td>
                                </tr>
                                <tr>
                                    <td>Controle de tração (ASC)</td>
                                    <td><?php
                                        if ($fetch->ascs == 'f')
                                            print 'Não';
                                        else
                                            print 'Sim';
                                ?></td>
                                </tr>
                                <tr>
                                    <td>Controle de pressão dos pneus (RDC)</td>
                                    <td><?php
                                        if ($fetch->rdc == 'f')
                                            print 'Não';
                                        else
                                            print 'Sim';
                                ?></td>
                                </tr>
                                <tr>
                                    <td>Computador de bordo (BC)</td>
                                    <td><?php
                                        if ($fetch->bc == 'f')
                                            print 'Não';
                                        else
                                            print 'Sim';
                                ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="descricao">
                            <h3>Observações</h3>

                            <p><?php print ucfirst($fetch->observacao); ?></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require_once '../template/footer.php';
        ?>
    </body>
    <script type="text/javascript" src="<?php print $path_js . 'motos.js' ?>"></script>
</html>