<?php
require_once '../template/head_sistema.php';
?>

<div class="container content">
    <legend><h1>Produtos da Boutique</h1></legend>

    <div class="coluna3 coluna-inicial">
        <div class="view_produtos-menu_lateral">                    
            <ul class="nav nav-tabs nav-stacked ">
                <li><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#capacetes">Capacetes</a></li>
                <div id="capacetes" class="accordion-body collapse" style="height: 0px;">
                    <div class="accordion-inner">
                        <ul>
                            <li><a class="capacete" href="javascript:;">Todos</a></li>
                            <li><a class="capacete" href="javascript:;">AGV</a></li>
                            <li><a class="capacete" href="javascript:;">Arai</a></li>                                                                
                            <li><a class="capacete" href="javascript:;">Mormai</a></li>  
                            <li><a class="capacete" href="javascript:;">Shark</a></li>
                        </ul>
                    </div>
                </div>
                <li><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#luvas">Luvas</a></li>
                <div id="luvas" class="accordion-body collapse" style="height: 0px;">
                    <div class="accordion-inner">
                        <ul>
                            <li><a class="luva" href="javascript:;">Todas</a></li>
                            <li><a class="luva" href="javascript:;">Alpinestar</a></li>
                            <li><a class="luva" href="javascript:;">Arai</a></li>                                                                
                            <li><a class="luva" href="javascript:;">Mormai</a></li>  
                            <li><a class="luva" href="javascript:;">Shark</a></li>
                        </ul>
                    </div>
                </div>
                <li><a href="#">Jaquetas</a></li>
                <li><a href="#">Botas</a></li>
                <li><a href="#">Macacões</a></li>
            </ul>
        </div>
    </div>

    <div class="coluna9">        
        <div class="alert alert-block alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <h3>Sobre esta seção:</h3>
            Esta página permite que você <b>liste, edite, exclua e acompanhe</b> as visualizações
            dos produtos da boutique que estão cadastrados no sistema.
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



<script type="text/javascript" src="../js/produtos.js"></script>
<script type="text/javascript" src="../js/grafico.js"></script>
<script type="text/javascript" src="../js/popover_excluir.js"></script>



<script type="text/javascript">
   
     
</script>

<?php
require_once '../template/footer_sistema.php';
?>
