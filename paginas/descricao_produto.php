<!DOCTYPE html>
<html>
    <?php
    require_once '../config.php';
    require_once '../template/head.php';
    require_once '../classes/CProduto.php';
    require_once '../classes/CImagem.php';
    require_once '../classes/CVisitas.php';

    $id_produto = $_GET['produto'];

    $produto = new CProduto;
    $imagem = new CImagem;
    $visita = new CVisitas;

    $consulta = $produto->consultaProduto($id_produto);

    $fetch = pg_fetch_object($consulta);

    $consultaImg = $imagem->consultaImg($id_produto);

    $num_rows_img = pg_num_rows($consultaImg);

    $fetchImg = pg_fetch_object($consultaImg);

    $data = date("Y-m-d");

    $visita->incluirVisita($id_produto, 1, $data);

    $preco = number_format($fetch->preco, 2, ',', '');


    $par = number_format($fetch->parcelas, 2, '.', '');
    $prazo = $fetch->prazo / $par;
    $prazo = number_format($prazo, 2, ',', '');

    /* $output = '<html>
      <head>
      <title>%TITLE%</title>';
      $title = "TITLE";

      $output = str_replace('%TITLE%', $title, $output); */
    ?>

    <body>
        <?php
        require_once '../template/header.php';
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
                            <h1><?php print $fetch->categoria . " " . $fetch->marca . " " . $fetch->nome ?></h1>
                        </div>

                        <div class="janela_produtos">  

                            <?php
                            print ' <div class="coluna8 coluna-inicial">
                        <div class="img_desc_produto">';

                            if ($num_rows_img > 0) {
                                print '<img src="../img/boutique/' . $fetchImg->nome_img . '" />';
                            } else {
                                print 'Não há imagens do produto';
                            }

                            print '</div>
                        <div class="produto_thumbnail">                            
                            <ul class="ul_thumbnail">';

                            if ($num_rows_img > 0) {
                                do {
                                    print '<li class="thumbs"><img src="../img/boutique/' . $fetchImg->nome_img . '" /></li>';
                                } while ($fetchImg = pg_fetch_object($consultaImg));
                            } else {
                                print 'Não há imagens do produto';
                            }

                            print '</ul></div></div>';

                            print '<div class="coluna4">
                        <div class="desc_produto">
                            <h3>Descrição</h3>

                            <p>' . $fetch->descricao . '</p>
                            <h3> <span>Preço</span></h3>
                            <h4>R$' . $preco . ' à vista </h4>
                            <h5>ou</h5>
                            <h4>' . $fetch->parcelas . 'x de R$' . $prazo . '</h4>
                        </div>                        
                    </div>
                    
                    <div class="coluna12 coluna-inicial">
                        <div class="desc_produto">
                            <h3>Características</h3>

                            <p>' . $fetch->caract . '</p>                            
                        </div>                        
                    </div>';
                            ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel"><?php print $fetch->categoria . " " . $fetch->marca . " " . $fetch->nome ?></h3>
                </div>
                <div class="modal-body">
                    <div id="backBtnCaroselModal" class="arrow left_arrow"></div>
                    <div id="nextBtnCaroselModal" class="arrow right_arrow"></div>
                </div>                            
            </div>

        </div>


        <?php
        require_once '../template/footer.php';
        ?>
    </body>
</html>