<?php
require_once '../template/head_sistema.php';
?>


<div class="container content">
    <legend><h1>Motos Semi-Novas</h1></legend>

    <div class="coluna3 coluna-inicial">
        <div class="view_seminova-menu_lateral">                    
            <ul class="nav nav-tabs nav-stacked ">                
                <li><a id="motos-estoque" href="#">Motos em estoque</a></li>
                <li><a  id="motos-vendidas" href="#">Motos vendidas</a></li>
            </ul>
        </div>
    </div>

    <div class="coluna9">        
            <div class="alert alert-block alert-info">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h3>Sobre esta seção:</h3>
                Esta página permite que você <b>liste, edite, exclua e acompanhe</b> as visualizações
                das motos <b>semi-novas</b> que estão cadastrados no sistema.
                <b>Clique</b> nas categorias no <b>menu</b> ao lado para começar.
            </div>       
        
        
    </div>

</div>

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
</div>


<script type="text/javascript" src="../js/seminovas.js"></script>
<script type="text/javascript" src="../js/grafico.js"></script>

<?php
require_once '../template/footer_sistema.php';
?>
