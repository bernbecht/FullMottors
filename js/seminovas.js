
/*--------------------------------------------------------------------
 * JAVASCRIPT usado para as funções de listar e editar SEMINOVAS no 
 * SISTEMA* 
 * 
 -------------------------------------------------------------------*/


function retiraImagemColocaInputImagem(obj){
   
    var id = $(obj).attr('id');
    var pai = $(obj).parent();
    var irmao= $(obj).prev();
    
    //alert(id);
    
    if(id == 'foto_miniatura'){ 
    
        var input = ' <h4 id="myModalLabel">Você deve Inserir uma Imagem de Miniatura</h4>\
                    <div class="control-group">\n\
                    <label class="control-label" for="inputManchete">Insira a Imagem</label>\n\
                    <div class="controls">\n\
                       <input id="foto_miniatura" type="file" name="foto_miniatura" />\n\
                        <span class="help-inline" id="">Foto que será usada como miniatura para página inicial de semi-novas. Dica: use imagens retangulares 130x152</span>\n\
                    </div>\n\
                </div>'; 
        
    $('#miniatura_modificada').val('1');

    }
        
    else{
        var span = $('#help-inline');
        if(span.length <1){
            span= '<span id="help-inline" class="help-inline" id="">Foto que será usada como miniatura para página inicial de semi-novas. Dica: use imagens quadradas 500x500</span>';
            //alert(span);
        }  
        else
            span = '';         
        
        var input = '<input type="file" name="foto'+id+'" />'+span;
    }
       
       
    $(irmao).transition({
        opacity: 0
    }, 500);
        
    $(obj).remove();       
    
        
    setTimeout(function(){
        $(irmao).remove();
        
        if(id == 'foto_miniatura')
            $(input).appendTo('.modal-body');
        else{
            $(input).prependTo('.controls_img_produto_desc');          
        }
            
    },500);   
      
}


//deleta a imagem do BD
function deletaImagemdoBD(){
    
    $('.remove_img').click(function(){
        
        var obj= $(this);
        
        var src_imagem = $(this).prev().attr('src');
        
        var nome_imagem = src_imagem.split('/'); 
        
        var pasta = 'seminovas';       
        
        
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
                retiraImagemColocaInputImagem(obj);
        
            }
        });
        
    });
}

//faz uma pagina inteira subir
function subirPagina(){
    $('body,html').animate({
        scrollTop: 0
    }, 500);
    return false;
}

/*função que vai editar a seminova por ajax*/
function editaSeminova(){
    $('#enviar').click(function(){        
        $('#seminova_form').ajaxSubmit( {            
            data: {
            },
            
            beforeSubmit: function() {
                
            },
            success: function(data) {
                $('.erro_incluir').children().first().remove();
                subirPagina();
               
                
                if(data != 1){                   
                  
                    $('<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">×</button>'+data+'</div>').appendTo('.erro_incluir');
                }
                else{
                    
                    $('<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">×</button>Moto editada com sucesso</div>').appendTo('.erro_incluir');
                }
            }           
        }); 
    });
}

/*Função que faz a requisição AJAX para pegar as SEMI*/
function getMotosSemiNovas(){
    var url = '../operacoes/Sistema/viewSeminovaOp.php';
    
    $.post(url,{
        
        },function(data){
            
            $('.alert').remove();
            $('.coluna9').children().remove();
            $('.consulta_erro').remove();
            
            if(data ==1){                
                var consulta_erro = '<div class="consulta_erro">\n\
                                        Não há motos cadastradas\n\
                                     </div>';
                $(consulta_erro).appendTo('.coluna9');
            }
            else{
                $(data).appendTo('.coluna9');
                 getDadosdeVisualziacaoAjax();
                
            }
        
        });   
    
}

//função que contém o comportamento do menu lateral do VIEW SEMINOVAS
function getMotoseMenuSistema(){ 

    $('#motos-estoque').click(function(){
        getMotosSemiNovas();
    });

}


$(document).ready(function(){
    getMotoseMenuSistema();
    editaSeminova();
    deletaImagemdoBD();
});
