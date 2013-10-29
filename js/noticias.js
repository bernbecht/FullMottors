/*--------------------------------------------------------------------
 * JAVASCRIPT para a página de visualização de NOTÍCIAS cadastradAs
 * no sistema e para EDIÇÃO DE NOTÍCIAS * 
 * 
 -------------------------------------------------------------------*/



function previewNoticiaModal(){
    $("#preview_noticia_btn").click(function(){
        
        var manchete = $('#inputManchete').val();
        
        var post = $('#edicao_post').html(); 
        
        $('#modal_preview_post .modal-body h1').text(manchete);
        $('#modal_preview_post .modal-body .post').html(post);
        
        
    });
}

function retiraImagemColocaInputImagem(obj){
   
    var id = $(obj).attr('class');
    var pai = $(obj).parent();
    var irmao= $(obj).prev();
    
    //alert(id);
    
    var input = ' <h4 id="myModalLabel">Você deve Inserir uma Imagem de Miniatura</h4>\
                    <div class="control-group">\n\
                    <label class="control-label" for="inputManchete">Insira a Imagem</label>\n\
                    <div class="controls">\n\
                       <input id="foto_miniatura" type="file" name="foto_miniatura" />\n\
                        <span class="help-inline" id="">Foto que será usada como capa para a notícia. Dica: use imagens retangulares 100x100</span>\n\
                    </div>\n\
                </div>'; 
        
    $('#miniatura_modificada').val('1'); 
  
       
    $(obj).transition({
        opacity: 0
    }, 500);        
             
    setTimeout(function(){
        
        $(obj).remove();     
        
        $(input).appendTo('.modal-body');
            
    },500);   
      
}


//deleta a imagem do BD
function deletaImagemdoBD(){
    
    $('.popover_remove_img_btn').click(function(){        
        
        
        var obj= $(this);
        
        var obj_deletavel = $(this).parent().parent().parent().parent().parent().parent();
        
        var src_imagem = $(this).parent().parent().parent().parent().parent().parent().children().first().attr('src');
        
        var nome_imagem = src_imagem.split('/'); 
        
        var pasta = 'noticias';       
        
        
        var url = '../operacoes/CImagem/excluir_foto.php';          
             
       
        $.post(url,{
            nome:nome_imagem[3],
            pasta:pasta
        },function(data){
            if(data==0){
                alert('Não foi possível deletar a foto do servidor. A foto foi apenas desvinculada\n\
            do produto');        
            }
            if(data==1){
                $('#label_tipo_imagem').remove();
                retiraImagemColocaInputImagem(obj_deletavel);
        
            }
        });
        
    });
}

function editaNoticia(){
    $('#enviar').click(function(){        
        var id = $('#id').val();
        var post = $('#edicao_post').html();

        $('#noticia_form').ajaxSubmit( {
            data: {
                id:id,
                post:post
            },

            beforeSubmit: function() {

            },
            success: function(data) {
                $('.erro_incluir').children().first().remove();

                //alert(data);

                if(data != 1){

                    $('<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">×</button>'+data+'</div>').appendTo('.erro_incluir');
                }
                else{

                    $('<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">×</button>Notícia editada com sucesso</div>').appendTo('.erro_incluir');

                    setTimeout(function(){

                        document.location.reload(true);
                    },800);

                }
            }
        });
    });
}


/*Função que faz a requisição AJAX para pegar as NOTICIAS EM VIEW_NOTICIAS.PHP*/
function getNoticias(data){
    
    var url = '../operacoes/Sistema/viewNoticiaOp.php';
    
    $.post(url,{
        data:data
    },function(data){
            
        $('.alert').remove();
        $('.coluna9').children().remove();
        $('.consulta_erro').remove();
            
        if(data ==1){                
            var consulta_erro = '<div class="consulta_erro">\n\
                                        Não há notícias.\n\
                                     </div>';
            $(consulta_erro).appendTo('.coluna9');
        }
        else{
            $(data).appendTo('.coluna9');
            getDadosdeVisualziacaoAjax();
        }
        
    });   
    
}

//função que contém o comportamento do menu lateral do VIEW NOTÍCIAS
function getNoticiasMenuSistema(){ 
    
    $('.noticia-data').click(function(){
        
        var id = $(this).attr('id');
        getNoticias(id);
        
    });
    
    

}

function deletaImgPopover(){
    $('.remove_img').popover('hide');   
    
     o = 0;
  
    $('.remove_img').click(function(){   
        if(o==0){
            $('.remove_img').popover('show'); 
            o=1;
        }
        else{
           $('.remove_img').popover('hide');
           o=0;
        }
        
        
        setTimeout(function(){
        
            deletaImagemdoBD();
            cancelaDeletaImg();
            
        },200);  
        
       
    });
}

function cancelaDeletaImg(){

    $('.cancela_deletacao_mini').click(function(){
        //alert($(this).parent().parent().parent().parent().parent().attr('class'));
        //$(this).parent().parent().parent().parent().parent().popover('hide');
         $('.remove_img').popover('hide');
         o=0;
    });


}

$(document).ready(function(){
    getNoticiasMenuSistema();
    editaNoticia();
    deletaImagemdoBD();
    previewNoticiaModal();
    deletaImgPopover();    

});