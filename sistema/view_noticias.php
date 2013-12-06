<?php
require_once '../template/head_sistema.php';
?>

<div class="container content">
    <legend><h1>Lista de Notícias</h1> <div class="clear"</div></legend>

    <div class="coluna3 coluna-inicial">
        <ul class="nav nav-tabs nav-stacked ">
            <li><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#2013">2013</a></li>
            <div id="2013" class="accordion-body collapse" style="height: 0px;">
                <div class="accordion-inner">
                    <ul>
                        <li><a class="noticia-data" id="2013-01" href="javascript:;">Janeiro</a></li>
                        <li><a class="noticia-data" id="2013-02" href="javascript:;">Fevereiro</a></li>
                        <li><a class="noticia-data" id="2013-03" href="javascript:;">Março</a></li>                                                                
                        <li><a class="noticia-data" id="2013-04" href="javascript:;">Abril</a></li>  
                        <li><a class="noticia-data" id="2013-05" href="javascript:;">Maio</a></li>
                        <li><a class="noticia-data" id="2013-06" href="javascript:;">Junho</a></li>
                        <li><a class="noticia-data" id="2013-07" href="javascript:;">Julho</a></li>
                        <li><a class="noticia-data" id="2013-08" href="javascript:;">Agosto</a></li>
                        <li><a class="noticia-data" id="2013-09" href="javascript:;">Setembro</a></li>
                        <li><a class="noticia-data" id="2013-10" href="javascript:;">Outubro</a></li>
                        <li><a class="noticia-data" id="2013-11" href="javascript:;">Novembro</a></li>
                        <li><a class="noticia-data" id="2013-12" href="javascript:;">Dezembro</a></li>
                    </ul>
                </div>
            </div>
            <li><a href="#">2012</a></li>
            <li><a href="#">2011</a></li>
        </ul>
    </div>

    <div class="coluna9">        
        <div class="alert alert-block alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <h3>Sobre esta seção:</h3>
            Esta página permite que você <b>liste, edite, exclua e acompanhe</b>
            as visualizações das <b>notícias</b> que estão cadastrados no sistema.
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


<script type="text/javascript" src="../js/noticias.js"></script>
<script type="text/javascript" src="../js/grafico.js"></script>

<?php
require_once '../template/footer_sistema.php';
?>


