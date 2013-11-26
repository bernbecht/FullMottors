<?php

require_once '../config.php';

require_once APP_TEMPLATE . 'head_sistema.php';

require_once APP_CLASSES . 'CSemi.php';

require_once APP_CLASSES . 'CImagem.php';

$id = $_GET['id'];

$semi = new CSemi;

$img = new CImagem;

$consulta = $semi->getSemiNovasById($id);

$consultaImg = $img->consultaImgGenerico($id, 3, 2);

$fetch = pg_fetch_object($consulta);

$fetchImg = pg_fetch_object($consultaImg);

$preco = number_format($fetch->preco, 2, ',', '');

$num_rows_img = pg_num_rows($consultaImg);

?>

<div class="container content">

<legend>
    <h1>Editar Semi-Nova</h1>
    <button id='excluir_seminova_btn' class='btn btn-danger'>Excluir</button>
    <div class='clear'></div>
</legend>

<div class="erro_incluir">
    <div class="alert alert-warning fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Os itens em <b>AMARELO</b> são obrigatórios.
    </div>
</div>

<form id="seminova_form" class="form-horizontal" action="../operacoes/CSemi/editar_seminova_op.php" method="post"
      enctype="multipart/form-data" name="cadastro">

<input id='id' type="hidden" name="id" value="<?php print $id; ?>"/>

<input id="miniatura_modificada" value="0" type="hidden" name="miniatura_modificada"/>


<div class="control-group input-warming">
    <label class="control-label" for="input-modelo">Modelo</label>

    <div class="controls">
        <input class="input-large input-warming" type="text" value="<?php print $fetch->modelo; ?>" name="modelo"
               id="input-modelo" placeholder="Ex: CBR 600">
    </div>
</div>

<div class="control-group input-warming">
    <label class="control-label" for="input-marca">Marca</label>

    <div class="controls">
        <input class="input-large" type="text" name="marca" value="<?php print $fetch->marca; ?>" id="input-marca"
               placeholder="Ex: Honda">
    </div>
</div>

<div class="control-group input-warming">
    <label class="control-label" for="input-ano">Ano</label>

    <div class="controls">
        <input class="input-small" type="text" name="ano" id="input-ano" placeholder="Ex: 200"
               value="<?php print $fetch->ano; ?>">
    </div>
</div>


<div class="control-group input-warming">
    <label class="control-label" for="input-preco">Preço</label>

    <div class="controls">
        <div class="input-prepend">
            <span class="add-on">R$</span>
            <input class="span2" id="prependedInput" type="text" name="preco" id="input-preco" placeholder="Ex: 3000,00"
                   value="<?php print $preco; ?>">
            <span class="help-inline" id="">Deve conter os centavos. Ex: 1200,00</span>
        </div>
    </div>
</div>


<div class="control-group input-warming">
    <label class="control-label" for="input-potencia">Potência (CV)</label>

    <div class="controls">
        <input class="input-small" type="text" name="potencia" id="input-potencia" placeholder="Ex: 100"
               value="<?php print $fetch->potencia; ?>">
    </div>
</div>


<div class="control-group input-warming">
    <label class="control-label" for="input-cilindrada">Cilindrada (cc)</label>

    <div class="controls">
        <input class="input-small" type="text" name="cilindrada" id="input-cilindrada" placeholder="Ex: 600"
               value="<?php print $fetch->cilindradas; ?>">
    </div>
</div>


<div class="control-group input-warming">
    <label class="control-label" for="input-km">Km</label>

    <div class="controls">
        <input class="input-small" type="text" name="km" id="input-km" placeholder="Ex: 5000"
               value="<?php print $fetch->km; ?>">
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="input-refrigeracao">Refrigeração</label>

    <div class="controls">
        <input class="input-small" type="text" name="refrigeracao" id="input-refrigeracao" placeholder="Ex: Ar"
               value="<?php print $fetch->refrigeracao; ?>">
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="input-motor">Motor</label>

    <div class="controls">
        <input class="input-small" type="text" name="motor" id="input-motor" placeholder="Ex: 4 tempos"
               value="<?php print $fetch->motor; ?>">
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="input-cor">Cor</label>

    <div class="controls">
        <input class="input-small" type="text" name="cor" id="input-cor" placeholder="Ex: Amarelo"
               value="<?php print $fetch->cor; ?>">
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="input-estilo">Estilo</label>

    <div class="controls">
        <select class="input-small" name="estilo">
            <?php
            if ($fetch->estilo == null)
                $nome_select = '-';
            else
                $nome_select = $fetch->estilo;
            print '<option value="' . $fetch->estilo . '">' . $nome_select . '</option>';
            ?>
            <option value="null">-</option>
            <option value="Sport">Sport</option>
            <option value="Enduro">Enduro</option>
            <option value="Tour">Tour</option>
            <option value="Roadster">Roadster</option>
            <option value="Outro">Outro</option>
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="input-transmissao">Transmissão</label>

    <div class="controls">
        <select class="input-medium" name="transmissao">
            <?php
            if ($fetch->transmissao == null)
                $nome_select = '-';
            else
                $nome_select = $fetch->transmissao;
            print '<option value="' . $fetch->transmissao . '">' . $nome_select . '</option>';
            ?>
            <option value="null">-</option>
            <option value="Cardã">Cardã</option>
            <option value="Corrente">Corrente</option>
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="input-partida">Partida</label>

    <div class="controls">
        <select class="input-medium" name="partida">
            <?php
            if ($fetch->partida == null)
                $nome_select = '-';
            else
                $nome_select = $fetch->partida;
            print '<option value="' . $fetch->partida . '">' . $nome_select . '</option>';
            ?>
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
            <?php
            if ($fetch->esa == 'f')
                $nome_select = 'Não';
            else
                $nome_select = 'Sim';
            print '<option value="' . $fetch->esa . '">' . $nome_select . '</option>';
            ?>
            <option value="false">Não</option>
            <option value="true">Sim</option>
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="input-ascs">Controle de tração (ASC)</label>

    <div class="controls">
        <select class="input-small" name="ascs">
            <?php
            if ($fetch->ascs == 'f')
                $nome_select = 'Não';
            else
                $nome_select = 'Sim';
            print '<option value="' . $fetch->ascs . '">' . $nome_select . '</option>';
            ?>
            <option value="false">Não</option>
            <option value="true">Sim</option>
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="input-rdc">Controle de pressão dos pneus (RDC)</label>

    <div class="controls">
        <select class="input-small" name="rdc">
            <?php
            if ($fetch->rdc == 'f')
                $nome_select = 'Não';
            else
                $nome_select = 'Sim';
            print '<option value="' . $fetch->rdc . '">' . $nome_select . '</option>';
            ?>
            <option value="false">Não</option>
            <option value="true">Sim</option>
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="input-bc">Computador de bordo (BC)</label>

    <div class="controls">
        <select class="input-small" name="bc">
            <?php
            if ($fetch->bc == 'f')
                $nome_select = 'Não';
            else
                $nome_select = 'Sim';
            print '<option value="' . $fetch->bc . '">' . $nome_select . '</option>';
            ?>
            <option value="false">Não</option>
            <option value="true">Sim</option>
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="input-bolsas">Bolsas</label>

    <div class="controls">
        <select class="input-small" name="bolsas">
            <?php
            if ($fetch->bolsas == null)
                $nome_select = '-';
            else
                $nome_select = $fetch->bolsas;
            print '<option value="' . $fetch->bolsas . '">' . $nome_select . '</option>';
            ?>
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
        <textarea name="observacoes" class="input-xxlarge"><?php print $fetch->observacao; ?></textarea>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="inputManchete"></label>

    <div class="controls">
        <button type="button" class="btn btn-primary" data-toggle="modal" href="#modal_img_upload_post">Gerenciar
            Imagens
        </button>
    </div>
</div>

<div id="modal_img_upload_post" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Upload de Imagens</h3>
    </div>
    <div class="modal-body">
        <h4 id="myModalLabel">Imagem Miniatura do Produto</h4>

        <div class="img_produto_container">
            <?php print'<img src="../img/seminovas/' . $fetch->nome_img . '"/>' ?>
            <button id="foto_miniatura" type="button" class="btn btn-danger btn-mini remove_img"><i
                    class="icon-remove"></i></button>
        </div>

        <div class="clear"></div>

        <h4 id="myModalLabel">Imagens do Produto</h4>

        <div class="lista_imagens_produto">
            <ul>

                <?php
                if ($num_rows_img > 0) {
                    $id = 0;
                    do {
                        print '<li>
                                          <div class="img_produto_container">
                                                <img src = "../img/seminovas/' . $fetchImg->nome_img . '"/>                    
                                                <button id="' . $id . '" type="button" class="btn btn-danger btn-mini remove_img"><i class="icon-remove"></i></button>
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
                        print '<span id="help-inline" class="help-inline" id="">Foto que será usada como miniatura para página inicial de semi-novas. Dica: use imagens retangulares</span>';
                }
                ?>

            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button id="confirma_miniatura_btn" type="button" class="btn btn-primary" data-dismiss="modal"
                aria-hidden="true">Ok
        </button>
    </div>
</div>


<div class="form-actions">
    <a href="view_seminova.php" id="cancelar" type="button" class="btn">Cancelar</a>
    <button id="enviar" type="button" class="btn btn-primary">Salvar</button>
</div>
</form>

</div>

<script type="text/javascript" src="<?php print $path_js . 'seminovas.js' ?>"></script>
<?php
require_once APP_TEMPLATE.'footer_sistema.php';
?>
