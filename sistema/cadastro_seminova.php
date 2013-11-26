<?php
require_once '../template/head_sistema.php';
?>


<div class="container content">

    <legend><h1>Adicionar Semi-Nova</h1></legend>

    <div class="erro_incluir">
        <div class="alert alert-warning fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Os itens em <b>AMARELO</b> são obrigatórios.
        </div>
    </div>

    <form id="seminova_form" class="form-horizontal" action="../operacoes/CSemi/incluir_seminova.php" method="post" enctype="multipart/form-data" name="cadastro" >           


        <div class="control-group input-warming">
            <label class="control-label" for="input-modelo">Modelo</label>
            <div class="controls">
                <input class="input-large input-warming" type="text" name="modelo" id="input-modelo" placeholder="Ex: CBR 600">
            </div>
        </div>

        <div class="control-group input-warming">
            <label class="control-label" for="input-marca">Marca</label>
            <div class="controls">
                <input class="input-large" type="text" name="marca" id="input-marca" placeholder="Ex: Honda">
            </div>
        </div>        

        <div class="control-group input-warming">
            <label class="control-label" for="input-ano">Ano</label>
            <div class="controls">
                <input class="input-small" type="text" name="ano" id="input-ano" placeholder="Ex: 200">
            </div>
        </div>


        <div class="control-group input-warming">
            <label class="control-label" for="input-preco">Preço</label>
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on">R$</span>
                    <input class="span2" id="prependedInput" type="text"name="preco" id="input-preco" placeholder="Ex: 3000,00">
                    <span class="help-inline" id="">Deve conter os centavos. Ex: 1200,00</span>
                </div>
            </div>
        </div>


        <div class="control-group input-warming">
            <label class="control-label" for="input-potencia">Potência (CV)</label>
            <div class="controls">
                <input class="input-small" type="text" name="potencia" id="input-potencia" placeholder="Ex: 100">
            </div>
        </div>


        <div class="control-group input-warming">
            <label class="control-label" for="input-cilindrada">Cilindrada (cc)</label>
            <div class="controls">
                <input class="input-small" type="text" name="cilindrada" id="input-cilindrada" placeholder="Ex: 600">
            </div>
        </div>


        <div class="control-group input-warming">
            <label class="control-label" for="input-km">Km</label>
            <div class="controls">
                <input class="input-small" type="text" name="km" id="input-km" placeholder="Ex: 5000">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="input-refrigeracao">Refrigeração</label>
            <div class="controls">
                <input class="input-small" type="text" name="refrigeracao" id="input-refrigeracao" placeholder="Ex: Ar">
            </div>
        </div>



        <div class="control-group">
            <label class="control-label" for="input-motor">Motor</label>
            <div class="controls">
                <input class="input-small" type="text" name="motor" id="input-motor" placeholder="Ex: 4 tempos">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="input-cor">Cor</label>
            <div class="controls">
                <input class="input-small" type="text" name="cor" id="input-cor" placeholder="Ex: Amarelo">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input-estilo">Estilo</label>
            <div class="controls">
                <select class="input-small" name="estilo">
                    <option value="null">-</option>
                    <option value="sport">Sport</option>
                    <option value="enduro">Enduro</option>  
                    <option value="tour">Tour</option>   
                    <option value="roadster">Roadster</option>                    
                    <option value="outro">Outro</option>                    
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input-transmissao">Transmissão</label>
            <div class="controls">
                <select class="input-medium" name="transmissao">
                    <option value="null">-</option>
                    <option value="Elétrica">Cardã</option>
                    <option value="Corrente">Corrente</option>                    
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input-partida">Partida</label>
            <div class="controls">
                <select class="input-medium" name="partida">
                    <option value="null">-</option>
                    <option value="Elétrica">Elétrica</option>
                    <option value="Carburador">Carburador</option>                    
                </select>
            </div>
        </div>
      

        <div class="control-group">
            <label class="control-label" for="input-abs">Suspesão eletrônica (ESA)</label>
            <div class="controls">
                <select class="input-small" name="esa">
                    <option value="false">Não</option>
                    <option value="true">Sim</option>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input-ascs">Controle de tração (ASC)</label>
            <div class="controls">
                <select class="input-small" name="ascs">
                    <option value="false">Não</option> 
                    <option value="true">Sim</option>                     
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input-rdc">Controle de pressão dos pneus (RDC)</label>
            <div class="controls">
                <select class="input-small" name="rdc">
                    <option value="false">Não</option>
                    <option value="true">Sim</option>                      
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input-bc">Computador de bordo (BC)</label>
            <div class="controls">               
                <select class="input-small" name="bc"> 
                    <option value="false">Não</option> 
                    <option value="true">Sim</option>                     
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input-bolsas">Bolsas</label>
            <div class="controls">               
                <select class="input-small" name="bolsas">
                    <option value="0">0</option>
                    <option value="1">1</option> 
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input-observacoes">Observações</label>
            <div class="controls">
                <textarea name="observacoes" class="input-xxlarge"></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputManchete"></label>
            <div class="controls">
                <button type="button" class="btn btn-primary"  data-toggle="modal" href="#modal_img_upload_post">+ Adicionar Imagens ao Anúncio</button>
                <span class="help-inline" id="foto_legenda-1"></span>
                <span class="help-inline" id="foto_legenda-2"></span>
                <span class="help-inline" id="foto_legenda-3"></span>
                <span class="help-inline" id="foto_legenda-4"></span>
                <span class="help-inline" id="foto_legenda-5"></span>
                <span class="help-inline" id="foto_legenda-6"></span>
                <span class="help-inline" id="foto_legenda-7"></span>
                <span class="help-inline" id="foto_legenda-8"></span>
                <span class="help-inline" id="foto_legenda-9"></span>
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
                        <span class="help-inline" id="">Foto que será usada como miniatura para página inicial de semi-novas. Dica: use imagens quadradas de pelo menos 200x200</span>
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
                        <span class="help-inline" id="">Fotos que serão usadas para ilustrar a moto. Sugere-se que a primeira foto seja igual a miniatura só que dimensões retangulares e maior. </span>
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

<script type="text/javascript" src="../js/cadastro_semi-nova.js"></script>




<?php
require_once '../template/footer_sistema.php';
?>
