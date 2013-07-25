

function previewNoticiaModal(){
    $("#preview_noticia_btn").click(function(){
        
        var manchete = $('#inputManchete').val();
        
        var post = $('#edicao_post').html(); 
        
        $('#modal_preview_post .modal-body h1').text(manchete);
        $('#modal_preview_post .modal-body .post').html(post);
        
        
    });
}

/*Inclui uma noticia por AJAX*/
function incluiNoticiaAjax(){    
      
    $('#enviar').click(function(){  
        
        var post = $('#edicao_post').html();         
        
        if(post == '<br>' || post == "&nbsp;")
            post = "";        
        
        var form = $('#noticia_form'),
        manchete = form.find('input[name="manchete"]').val();
        
        $('#noticia_form').ajaxSubmit( {
            
            data: {
                post: post
            },
            
            beforeSubmit: function() {
                
            },
            success: function(data) {
                if(data != 1){
                   
                    $('.erro_incluir').children().first().remove();
                    $('<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">×</button>'+data+'</div>').appendTo('.erro_incluir');
                }
                else{
                    $('.erro_incluir').children().first().remove();
                    $('<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">×</button>Notícia incluída com sucesso</div>').appendTo('.erro_incluir');
                }
            }
           
        }); 
        
    });
}

function controleModalUploadFoto(){
    
    $('#confirma_miniatura_btn').click(function(){
        var nome = $('#input_foto').val();
        
        $('#foto_miniatura_noticia_legenda').text(nome);
    });
    
    $('#cancela_miniatura_btn').click(function(){
        var nome = $('#foto_miniatura_noticia_legenda').text(nome);
        
        $('#input_foto').val(nome);
    });
}

function getImagensModalCadastroNoticiaAjax(){
    
    var url = '../operacoes/CNoticia/getImagensModalCadastroNoticiaAjax.php';
  
    $.post(url,
    {},
        function(data){
            alert(data);
        });
    
}

function mostraImagensModalCadastroNoticia(){
    $("#modal_img_post").on('shown', function () {
        getImagensModalCadastroNoticiaAjax();
    });
    
    $("#modal_img_post").on('hidden', function () {
        alert('fechado');
    });
}

$(document).ready(function(){
    mostraImagensModalCadastroNoticia();
    incluiNoticiaAjax();
    controleModalUploadFoto();
    previewNoticiaModal();
   
});
