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
        Boutique - Full Mottors
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="og:title" content=" Boutique- Full Mottors">


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

<div class="boutique_content">
    <div class="wrapper">
        <div class="coluna-row">
            <div class="coluna3 coluna-inicial">
                <?php
                require_once '../template/menu_lateral_boutique.php';
                ?>

            </div>
            <div class="coluna9">
                <div class="titulo_categoria_boutique">
                    <h1 >Lançamentos</h1>
                </div>

                <div class="janela_produtos">

                    <?php
                    if (pg_num_rows($lancamentos) > 0) {

                        while ($fetch_lancamentos = pg_fetch_object($lancamentos)) {
                            $preco = number_format($fetch_lancamentos->preco, 2, ',', '');
                            $par = number_format($fetch_lancamentos->parcelas, 2, '.', '');
                            $prazo = $fetch_lancamentos->prazo / $par;
                            $prazo = number_format($prazo, 2, ',', '');

                            echo '<a href="descricao_produto.php?produto=' . $fetch_lancamentos->id_produto . '">
                                            <div class="produto">
                                                <div class="produto_img">
                                                    <img src="../img/boutique/' . $fetch_lancamentos->nome_img . '" />
                                                </div>
                                                <div class="produto_nome">
                                                ' . $fetch_lancamentos->nome . '
                                                </div>
                                                <div class="produto_preco">
                                                R$ ' . $preco . '
                                                </div>
                                                <div class="produto_preco">
                                                ou ' . $fetch_lancamentos->parcelas . "x R$ " . $prazo . '
                                                </div>

                                            </div>
                                        </a>';
                        };
                    } else {
                        print '<div class="consulta_erro">Não há itens no momento.</div>';
                    }
                    ?>



                    <div class="clear"></div>
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
<script type="text/javascript" src="<?php print $path_js . 'boutique.js' ?>"></script>
</html>