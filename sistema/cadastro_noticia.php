<?php
require_once '../template/head_sistema.php';
?>


<div class="container content">

    <div>
        <legend><h1>Adicionar Nova Notícia</h1></legend>

        <div class="erro_incluir">

        </div>

        <form  id="noticia_form" class="form-horizontal" action="../operacoes/CNoticia/incluir_noticia.php" method="post" enctype="multipart/form-data" name="cadastro" >


            <div class="control-group">
                <label class="control-label" for="inputManchete">Adicionar a foto miniatura</label>
                <div class="controls">
                    <button type="button" class="btn btn-primary"  data-toggle="modal" href="#modal_img_upload_post">Upload</button>
                    <span class="help-inline" id="foto_miniatura_noticia_legenda"></span>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputManchete">Manchete</label>
                <div class="controls">
                    <input class="input-xxlarge" type="text" name="manchete" id="inputManchete" placeholder="Manchete">
                </div>
            </div>

            <script type="text/javascript">
                bkLib.onDomLoaded(function() { 
                    var myNicEditor = new nicEditor({
                        iconsPath : '../img/nicEditorIcons.gif',
                        buttonList : ['bold','italic','underline','strikeThrough','image','fontSize','center','justify','right','left','indent','outdent','link','unlink']
                    });
                    myNicEditor.setPanel('editor_controles');
                    myNicEditor.addInstance('edicao_post');
                    
                });
            </script>

            <div class="control-group">
                <label class="control-label" for="inputPost">Post</label>
                <div class="controls">
                    <div id="editor_controles"></div>
                    <div name="name" id="edicao_post"></div>                  
                </div>
            </div>




            <div class="form-actions">
                <a href="main_sistema.php" id="cancelar" type="button" class="btn">Cancelar</a>
                <button id="preview_noticia_btn" type="button" class="btn btn-warning" data-toggle="modal" href="#modal_preview_post">Visualizar Notícia</button>
                <button id="enviar" type="button" class="btn btn-primary">Enviar</button>
            </div>


            <div id="modal_img_upload_post" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Escolha uma imagem para a miniatura</h3>
                </div>
                <div class="modal-body">
                    <input id="input_foto" type="file" name="foto_miniatura" />
                </div>
                <div class="modal-footer">
                    <button id="cancela_miniatura_btn" type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button id="confirma_miniatura_btn" type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Ok</button>
                </div>
            </div>
        </form>
    </div>


    <div id="modal_preview_post" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Visualização do Post</h3>
        </div>
        <div class="modal-body">

            <div class="coluna8 coluna-inicial">
                <h1>

                </h1>
                <div class="social-likes">
                    <ul>
                        <li>sexta-feira, 01 de março de 2013</li>
                        <li><div class="fb-like fb_edge_widget_with_comment fb_iframe_widget" data-href="" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" fb-xfbml-state="rendered"><span style="height: 20px; width: 141px;"><iframe id="fd14f3808" name="fc39ea56c" scrolling="no" style="border: none; overflow: hidden; height: 20px; width: 141px;" title="Like this content on Facebook." class="fb_ltr" src="http://www.facebook.com/plugins/like.php?api_key=&amp;locale=pt_BR&amp;sdk=joey&amp;channel_url=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D18%23cb%3Df228b0ae1c%26origin%3Dhttp%253A%252F%252Flocalhost%253A8012%252Ff3493a91c8%26domain%3Dlocalhost%26relation%3Dparent.parent&amp;href=http%3A%2F%2Ffmottors.com.br%2Fpaginas%2Fnoticia.php%3Fid%3D4&amp;node_type=link&amp;width=450&amp;layout=button_count&amp;colorscheme=light&amp;show_faces=false&amp;send=true&amp;extended_social_context=false"></iframe></span></div></li>
                    </ul>
                </div>
                <div class="post">

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Sair</button>            
        </div>
    </div>

</div>

<script type="text/javascript" src="../js/cadastro_noticia_js.js"></script>


<?php
require_once '../template/footer_sistema.php';
?>
