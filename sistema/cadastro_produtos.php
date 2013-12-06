<?php
require_once '../template/head_sistema.php';
?>

<div class="container content">

    <legend>
        <h1>Adicionar Produto</h1>
        <div class="clear"</div>
    </legend>

    <div class="erro_incluir">
        <div class="alert alert-warning fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Os itens em <b>AMARELO</b> são obrigatórios.
        </div>
    </div>

    <form id="produto-form" class="form-horizontal" action="../operacoes/CProduto/incluir_produto.php" method="post" enctype="multipart/form-data" name="cadastro" >           


        <div class="control-group input-warming">
            <label class="control-label" for="input-modelo">Modelo</label>
            <div class="controls">
                <input class="input-large" type="text" name="nome" id="input-modelo" placeholder="Ex: Rx-30">
            </div>
        </div>        


        <div class="control-group input-warming">
            <label class="control-label" for="input-marca">Marca</label>
            <div class="controls">
                <input class="input-large" type="text" name="marca"  name="nome" id="input-marca" placeholder="Ex: AlpineStar">
            </div>
        </div>

        <div class="control-group input-warming">
            <label class="control-label" for="input-preco">Preço a Vista</label>
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on">R$</span>
                    <input class="span2" id="prependedInput" type="text" name="preco" id="input-preco" placeholder="Ex: 3000,00">
                    <span class="help-inline" id="">Deve conter os centavos. Ex: 1200,00</span>
                </div>           
            </div>
        </div>
        
        <div class="control-group input-warming">
            <label class="control-label" for="input-preco">Preço a Prazo</label>
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on">R$</span>
                    <input class="span2"  type="text" name="prazo" id="input-prazo" placeholder="Ex: 3000,00">
                    <span class="help-inline" id="">Deve conter os centavos. Ex: 1200,00</span>
                </div>           
            </div>
        </div>
        
        
        <div class="control-group input-warming">
            <label class="control-label" >Número de Parcelas</label>
            <div class="controls">
                <select class="input-small" name="parcelas">
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
                <textarea name="descricao" class="input-xxlarge textarea_produto"></textarea>
            </div>
        </div>

        <div class="control-group ">
            <label class="control-label" for="input-observacoes">Características</label>
            <div class="controls">
                <textarea  name="caracteristica" class="input-xxlarge textarea_produto"></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputManchete"></label>
            <div class="controls">
                <button type="button" class="btn btn-primary"  data-toggle="modal" href="#modal_img_upload_post">+ Adicionar Imagens ao Anúncio</button>
                <span class="help-inline" id="foto_legenda-1"></span>             
            </div>
        </div>

        <div id="modal_img_upload_post" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Upload de Imagens</h3>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label class="control-label" for="inputManchete">Imagem Miniatura</label>
                    <div class="controls">
                        <input id="foto_miniatura" type="file" name="foto_miniatura" />
                        <span class="help-inline" id="">Foto que será usada como miniatura para página inicial de semi-novas. Dica: use imagens retangulares 130x152</span>
                    </div>
                </div>    
                <div class="control-group">
                    <label class="control-label" for="inputManchete">Imagens de Descrição</label>
                    <div id="fotos_semi_desc_input_container" class="controls">
                        <input type="file" name="foto0" />
                        <input type="file" name="foto1" />
                        <input type="file" name="foto2" />
                        <input type="file" name="foto3" />
                        <input type="file" name="foto4" />
                        <input type="file" name="foto5" />
                        <input type="file" name="foto6" />
                        <input type="file" name="foto7" />
                        <span class="help-inline" id="">Fotos que serão usadas para ilustrar a moto. Dica: Use imagens quadradas de pelo menos 500x500 </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="confirma_miniatura_btn" type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Ok</button>
            </div>
        </div>


        <div class="form-actions">
            <a href="main_sistema.php" id="cancelar" type="button" class="btn">Cancelar</a>
            <button id="enviar-new" type="button" class="btn btn-warning">Enviar e Adicionar Outra Moto</button>
            <button id="enviar" type="button" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>


<script type="text/javascript" src="../js/cadastro_produto.js"></script>


<?php
require_once '../template/footer_sistema.php';
?>
