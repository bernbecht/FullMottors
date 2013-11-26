<?php
require_once '../config.php';
require_once APP_TEMPLATE . 'head_sistema.php';
?>


<div class="container content">

    <div class="coluna12 coluna-inicial">
        <div class="titulo_categoria_boutique">
            <h1>Motos em Estoque</h1>
        </div>
        <?php
        include_once APP_OPERACOES . '/Sistema/viewSeminovaOp.php'
        ?>
    </div>

</div>

<!--
<div id="modal_visualizacoes" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Visualizações do Produto</h3>
    </div>
    <div class="modal-body">
        <div id="grafico"></div>

    </div>
    <div class="modal-footer">
        <button  type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Ok</button>
    </div>
</div>

<div id="chart_container"style="opacity:0;">
    <div id="chart" style="width:0; height:0;"></div>
</div>-->

<script type="text/javascript" src="<?php print $path_js . 'seminovas.js' ?>"></script>

<!--
<script type="text/javascript" src="../js/grafico.js"></script>
-->

<?php
require_once APP_TEMPLATE . 'footer_sistema.php';
?>
