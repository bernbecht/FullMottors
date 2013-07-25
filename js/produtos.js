/*--------------------------------------------------------------------
 * JAVASCRIPT para a página de visualização de produtos cadastrados
 * no sistema e para EDIÇÃO DE PRODUTOS * 
 * 
 -------------------------------------------------------------------*/


//faz uma pagina inteira subir
function subirPagina(){
    $('body,html').animate({
        scrollTop: 0
    }, 500);
    return false;
}

function editaProduto(){
    $('#enviar').click(function(){        
        $('#produto-form').ajaxSubmit( {            
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
                    
                    $('<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">×</button>Produto editado com sucesso</div>').appendTo('.erro_incluir');
                }
            }           
        }); 
    });
}

function retiraImagemColocaInputImagem(obj){
   
    var id = $(obj).attr('id');
    var pai = $(obj).parent();
    var irmao= $(obj).prev();
    
    alert(id);
    
    if(id == 'miniatura'){ 
    
        var input = '<div class="control-group">\n\
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
            alert(span);
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
        
        if(id == 'miniatura')
            $(input).appendTo('#miniatura_container');
        else{
            $(input).prependTo('.controls_img_produto_desc');          
        }
            
    },500);   
      
}

//deleta a imagem do BD
function deletaImagemdoBD(){
    
    $('.popover_remove_img_btn').click(function(){
        
        var obj= $(this);
        
        var obj_deletavel = $(this).parent().parent().parent().parent().parent().parent();
        
        var src_imagem = $(this).parent().parent().parent().parent().parent().parent().children().first().attr('src');
        
        var nome_imagem = src_imagem.split('/');  
        
        var pasta = 'boutique';
        
        
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
                retiraImagemColocaInputImagem(obj_deletavel);
        
            }
        });
        
    });
}



function getProdutosBoutiqueMenuSistemaAjax(marca, categoria, offset){ 
    
    var url = '../operacoes/Sistema/viewProdutoOp.php';  
    
    $.post(url,{
        categoria:categoria,
        marca:marca,
        offset:offset
    },function(data){
        
        $('.alert').remove();        
        //erro
        if(data==2){
            $('.titulo_categoria_boutique h1').text(categoria+'s');
            $('.table').remove();
            $('.consulta_erro').remove();
            $('<div class="consulta_erro">Não há itens no momento.</div>').appendTo('.coluna9');
        
        }
        else{
            $('.consulta_erro').remove();
            $('.titulo_categoria_boutique').remove();
            $('.table').remove();
            $(data).appendTo('.coluna9');
            
            //ativa o botão de VISUALIZAÇÃO
            getDadosdeVisualziacaoAjax();
        
        }
    });
}

//função que contém o comportamento do menu lateral do VIEW PRODUTOS
function getProdutosBoutiqueMenuSistema(){ 
    
    $('.capacete').click(function(){
        
        pagina_atual = 1;
        marca = $(this).text();
        categoria = 'capacete';
        offset = 0;
        
        getProdutosBoutiqueMenuSistemaAjax(marca,categoria,offset);
        
        //setaPaginaAtual();  
    });
    
    
    $('.luva').click(function(){
        
        pagina_atual = 1;
        marca = $(this).text();
        categoria = 'luva';
        offset = 0;     
        
        getProdutosBoutiqueMenuSistemaAjax(marca,categoria,offset); 
        
        //setaPaginaAtual(); 
    
    });    

}

function deletaImgPopover(){
    $('.remove_img').popover('hide');   
    
     o = 0;
  
    $('.remove_img').click(function(){   
        if(o==0){
            $(this).popover('show'); 
            o=1;
        }
        else{
           $('this').popover('hide');
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
    getProdutosBoutiqueMenuSistema();  
    deletaImagemdoBD();
    editaProduto();
    deletaImgPopover();
    alert('oi');
    
     
});