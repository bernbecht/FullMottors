<?php
require_once '../template/head_sistema.php';

require_once '../classes/CProduto.php';
require_once '../classes/CImagem.php';
$id_produto = $_GET['id'];

$produto = new CProduto;
$imagem = new CImagem;

$consulta = $produto->consultaProdutoSemFoto($id_produto);
$fetch = pg_fetch_object($consulta);

$consultaImg = $imagem->consultaImg($id_produto);
$fetchImg = pg_fetch_object($consultaImg);
$num_rows_img = pg_num_rows($consultaImg);

//pega a miniatura relacionada ao produto
$consultaMiniatura = $imagem->consultaImgGenerico($id_produto, 1, 1);
$num_rows_miniatura = pg_num_rows($consultaMiniatura);
$fetchMiniatura = pg_fetch_object($consultaMiniatura);


$preco = number_format($fetch->preco, 2, ',', '');
$prazo = number_format($fetch->prazo, 2, ',', '');
?>

<div class="container content">

    <legend><h1>Editar Produto</h1> <div class="clear"</div></legend>

    <div class="erro_incluir">
        <div class="alert alert-warning fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Os itens em <b>AMARELO</b> são obrigatórios.
        </div>
    </div>

    <form id="produto-form" class="form-horizontal" action="../operacoes/CProduto/editar_produto_op.php" method="post" enctype="multipart/form-data" name="cadastro" >           

        <input type="hidden" name="id" value="<?php print $id_produto; ?>" />

        <input id="miniatura_modificada" value="0" type="hidden" name="miniatura_modificada"/>

        <div class="control-group input-warming">
            <label class="control-label" for="input-modelo">Modelo</label>
            <div class="controls">
                <input class="input-large" type="text" name="nome" id="input-modelo" value="<?php print $fetch->nome ?>" placeholder="Ex: Rx-30" />
            </div>
        </div>        


        <div class="control-group input-warming">
            <label class="control-label" for="input-marca">Marca</label>
            <div class="controls">
                <input class="input-large" type="text" name="marca"  name="nome" id="input-marca" value="<?php print $fetch->marca ?>" placeholder="Ex: AlpineStar" />
            </div>
        </div>

        <div class="control-group input-warming">
            <label class="control-label" for="input-preco">Preço à Vista</label>
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on">R$</span>
                    <input class="span2" id="prependedInput" type="text"name="preco" id="input-preco" value="<?php print $preco; ?>" placeholder="Ex: 3000,00" />
                    <span class="help-inline" id="">Deve conter os centavos. Ex: 1200,00</span>
                </div>           
            </div>
        </div>

        <div class="control-group input-warming">
            <label class="control-label" for="input-preco">Preço à Prazo</label>
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on">R$</span>
                    <input class="span2"  type="text" name="prazo" id="input-prazo" placeholder="Ex: 3000,00" value="<?php print $prazo; ?>" />
                    <span class="help-inline" id="">Deve conter os centavos. Ex: 1200,00</span>
                </div>           
            </div>
        </div>


        <div class="control-group input-warming">
            <label class="control-label" >Número de Parcelas</label>
            <div class="controls">
                <select class="input-small" name="parcelas">
                    <?php print'<option value="' . $fetch->parcelas . '">' . $fetch->parcelas . 'x</option>' ?>
                    <option value="1">1x</option>
                    <option value="2">2x</option>
                    <option value="3">3x</option>
                    <option value="4">4x</option>
                    <option value="5">5x</option>
                    <option value="6">6x</option>
                    <option value="7">7x</option>
                    <option value="8">8x</option>
                    <option value="9">9x</option>
                    <option value="10">10x</option>
                    <option value="11">11x</option>
                    <option value="12">12x</option>
                </select>
            </div>
        </div>

        <div class="control-group input-warming">
            <label class="control-label" >Categoria</label>
            <div class="controls">
                <select name="categoria">
                    <?php print'<option value="' . $fetch->categoria . '">' . $fetch->categoria . '</option>' ?>
                    <option value="Capacete">Capacete</option>
                    <option value="Luva">Luva</option>
                    <option value="Bota">Bota</option>
                    <option value="Macacao">Macacão</option>
                    <option value="outro">Outro</option>
                </select>
            </div>
        </div>

        <div class="control-group ">
            <label class="control-label" for="input-observacoes">Descrição</label>
            <div class="controls">
                <textarea name="descricao" class="input-xxlarge textarea_produto"><?php print $fetch->descricao ?></textarea>
            </div>
        </div>

        <div class="control-group ">
            <label class="control-label" for="input-observacoes">Características</label>
            <div class="controls">
                <textarea  name="caracteristica" class="input-xxlarge textarea_produto"><?php print $fetch->caract ?></textarea>
            </div>
        </div>        


        <div class="control-group">
            <label class="control-label" for="inputManchete"></label>
            <div class="controls">
                <button type="button" class="btn btn-primary"  data-toggle="modal" href="#modal_img_upload_post">Gerenciar Imagens do Produto</button>
                <span class="help-inline" id="foto_legenda-1"></span>             
            </div>
        </div>

        <div id="modal_img_upload_post" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Imagens do Produto</h3>
            </div>
            <div class="modal-body">

                <h4 id="labelModal">Imagem Miniatura do Produto</h4>

                <div id="miniatura_container">                    

                    <?php
                    $botao = "<div>
                                <a href='javascript:;' class='btn btn-mini  cancela_deletacao_mini'>Cancelar</a>
                                <a href='javascript:;' class='btn btn-danger btn-mini popover_remove_img_btn'>Deletar</a>
                                </div>";

                    if ($num_rows_miniatura > 0) {



                        print '
                                          <div id= "miniatura" class="img_produto_container">
                                                <img src = "../img/boutique/' . $fetchMiniatura->nome_img . '"/>                    
                                                <a id="foto_miniatura" type="button" class="btn btn-danger btn-mini remove_img" 
                                                    data-toggle="popover" 
                                                    data-html="true"
                                                    title="" data-content="A imagem será 
                                                                apagada imediatamente do sistema. 
                                                                Tem certeza que deseja continuar?' . $botao . '" 
                                                    data-original-title="Deletar Imagem">
                                                    <i class="icon-remove"></i>
                                                </a>
                                          </div>';
                    } else {
                        print '<div class="control-group">
                    <label class="control-label" for="inputManchete">Imagem Miniatura</label>
                    <div class="controls">
                        <input id="foto_miniatura" type="file" name="foto_miniatura" />
                        <span class="help-inline" id="">Foto que será usada como miniatura para página inicial de semi-novas. Dica: use imagens retangulares 130x152</span>
                    </div>
                </div>   ';
                    }
                    ?>               

                </div>
                
                <div class="clear"></div>

                <h4>Imagens do Produto</h4>

                <div class="lista_imagens_produto">
                    <ul>

                        <?php
                        if ($num_rows_img > 0) {
                            $id = 0;
                            do {
                                print '<li>
                                          <div id="'.$id.'" class="img_produto_container">
                                                <img src = "../img/boutique/' . $fetchImg->nome_img . '"/>                    
                                                <a  type="button" class="btn btn-danger btn-mini remove_img" 
                                                    data-toggle="popover" 
                                                    data-html="true"
                                                    title="" data-content="A imagem será 
                                                                apagada imediatamente do sistema. 
                                                                Tem certeza que deseja continuar?' . $botao . '" 
                                                    data-original-title="Deletar Imagem">
                                                    <i class="icon-remove"></i>
                                                </a>
                                          </div>
                                      </li>';
                                $id++;
                            } while ($fetchImg = pg_fetch_object($consultaImg));
                        } else {
                            print 'Não há imagens do produto';
                        }
                        ?>
                    </ul>
                    <div class="clear"></div>
                </div>

                <?php
                $imagensParaInserir = 8 - $num_rows_img;
                if ($imagensParaInserir > 0) {
                    print '<h4>Você ainda pode inserir mais ' . $imagensParaInserir . '</h4>';
                }
                ?>

                <div class="control-group">
                    <label class="control-label" for="inputManchete">Insira Imagens</label>
                    <div class="controls controls_img_produto_desc">  
                        <?php
                        $i = 0;
                        while ($i < $imagensParaInserir) {
                            print '<input type="file" name="foto' . ($i + $num_rows_img) . '" />';
                            $i++;
                            if ($i == $imagensParaInserir)
                                print '<span id="help-inline" class="help-inline" id="">Foto que será usada como miniatura para página inicial de semi-novas. Dica: use imagens quadradas 500x500</span>';
                        }
                        ?>                        

                    </div>
                </div>    

            </div>            

            <div class="modal-footer">
                <button id="confirma_miniatura_btn" type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Ok</button>
            </div>
        </div>


        <div class="form-actions">
            <a href="view_produtos.php" id="cancelar" type="button" class="btn">Cancelar</a>
            <button id="enviar" type="button" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>


<script type="text/javascript" src="../js/produtos.js"></script>


<?php
require_once '../template/footer_sistema.php';
?>
