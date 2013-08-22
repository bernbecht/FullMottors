<!DOCTYPE html>
<html>
    <?php
    require_once '../config.php';
    require_once '../template/head.php';
    require_once '../classes/CProduto.php';
    require_once '../classes/CNoticia.php';

    $produto = new CProduto;

    $noticia = new CNoticia;

    $lancamentos = $produto->consutaRecentes(4);

    $consulta = $noticia->getNoticiasRecentes(10);

    $num_rows = pg_num_rows($consulta);

    setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
    date_default_timezone_set('America/Sao_Paulo');
    ?>
    <body>
        <?php
        require_once '../template/header.php';
        ?>
        <div class="noticia_content">
            <div class="wrapper">      
                <h2>Notícias</h2>
                <div class="coluna8 coluna-inicial">

                    <?php
                    if ($num_rows > 0) {

                        $fetch = pg_fetch_object($consulta);

                        $date = $fetch->data;
                        $date = utf8_encode(strftime("%A, %d de %B de %Y", strtotime($date)));

                        print '<div class="noticia_teaser_main"> 
                <a href="noticia.php?id=' . $fetch->id_noticia . '">
                    <div class="noticia_teaser_main-img">
                        <img src="../img/noticias/' . $fetch->nome_img . '" />
                    </div>
                    <div class="noticia_teaser_main-texto">
                        <div class="noticia_teaser_main-manchete">
                            <h4>' . $fetch->manchete . '</h4>
                        </div>
                        <div class="noticia_teaser_main-data">' . $date . '</div>
                        <div class="noticia_teaser_main-post">' . $fetch->post . '</div>
                    </div>
                    <div class="clear"></div>
                </a>
            </div>';
                    } else {
                        print 'Não há notícias no momento.';
                    }
                    ?>



                    <div class="noticia_teaser_mini-content">

                        <?php
                        if ($num_rows > 1) {

                            $i = 0;

                            while ($i < 4) {
                                $fetch = pg_fetch_object($consulta);

                                if ($i == 0) {
                                    $classe = 'coluna-inicial';
                                } else {
                                    $classe = '';
                                }

                                $date = $fetch->data;
                                $date = utf8_encode(strftime("%A, %d de %B de %Y", strtotime($date)));

                                print ' <a href="noticia.php?id=' . $fetch->id_noticia . '">
                    <div class="coluna3 ' . $classe . '">
                        <div class="noticia_teaser_mini-img">
                            <img src="../img/noticias/' . $fetch->nome_img . '" />
                        </div>
                        <div class="noticia_teaser_mini-texto">
                            <div class="noticia_teaser_mini-manchete">
                                <h4>' . $fetch->manchete . '</h4>
                            </div>
                            <div class="noticia_teaser_mini-data">
                                ' . $date . '
                            </div>                        
                        </div>
                    </div>
                </a>';
                                $i++;
                            }
                        }
                        ?>                   
                        <div class="clear"></div>
                    </div>


                    <div class="noticia_teaser_lista">

                        <?php
                        if ($num_rows > 5) {
                            while ($fetch = pg_fetch_object($consulta)) {

                                $date = $fetch->data;
                                $date = utf8_encode(strftime("%A, %d de %B de %Y", strtotime($date)));

                                print '<a href="noticia.php?id=' . $fetch->id_noticia . '">
                    <div class="noticia_teaser_lista-content">
                        <div class="noticia_teaser_lista-manchete">
                            <h4>' . $fetch->manchete . '</h4>
                        </div>
                        <div class="noticia_teaser_lista-data">' . $date . '</div>  
                    </div>   
                </a>';
                            }
                        }
                        ?>

                    </div>
                </div>

                <div class="coluna4">

                    <div class="top-coluna news">
                        Lançamentos Boutique
                    </div>

                    <div class="noticia_teaser_vitrine_produtos">
                        <?php
                        if (pg_num_rows($lancamentos) > 0) {

                            while ($fetch_lancamentos = pg_fetch_object($lancamentos)) {
                                echo '<a href="descricao_produto.php?produto=' . $fetch_lancamentos->id_produto . '">
                                            <div class="produto">
                                                <div class="produto_img">
                                                    <img src="../img/boutique/' . $fetch_lancamentos->nome_img . '" />
                                                </div>
                                                <div class="produto_nome">
                                                ' . $fetch_lancamentos->nome . '
                                                </div>

                                            </div>  
                                        </a>';
                            };
                        } else {
                            print '<div class="consulta_erro">Não há itens no momento.</div>';
                        }
                        ?>
                    </div>

                </div>

                <div class="clear"></div>


            </div>
        </div>

        <?php
        require_once '../template/footer.php';
        ?>
    </body>
</html>