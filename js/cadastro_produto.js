

//função que limpa formulário. Deve ser mandado o form como parâmetro
function limparForm(form){
    
    $(form).find(':input').each(function(){
        switch(this.type){
            case 'password':
            case 'senha':
            case 'select-multiple':
            case 'select-one':
            case 'text':
            case 'textarea':
                $(this).val('');
                break;
            
            case 'checkbox':
            case 'radio':
                this.checked = false;
                
            case 'file':
                $(this).val(null);
                break;
                
            case 'select':
                $('select>option:eq(1)').attr('selected', true);
                break;
                           
        }
    });    
}



//faz uma pagina inteira subir
function subirPagina(){
    $('body,html').animate({
        scrollTop: 0
    }, 500);
    return false;
}

/*Inclui uma noticia por AJAX*/
function addProductAjax(){    
      
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
                    
                    $('<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">×</button>Notícia incluída com sucesso</div>').appendTo('.erro_incluir');
                }
            }           
        }); 
    });
    
    $('#enviar-new').click(function(){  
        $('#produto-form').ajaxSubmit( {            
            data: {
            },
            
            beforeSubmit: function() {
                
            },
            success: function(data) {
                $('.erro_incluir').children().first().remove();
                subirPagina()
                
                if(data != 1){                   
                  
                    $('<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">×</button>'+data+'</div>').appendTo('.erro_incluir');
                }
                else{
                    limparForm('#seminova_form');
                    $('<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">×</button>Notícia incluída com sucesso</div>').appendTo('.erro_incluir');
                }
            }           
        }); 
        
     
    });
    
    
}


function controleModalUploadFoto(){
    
   
  
}

$(document).ready(function(){ 
    controleModalUploadFoto(); 
    addProductAjax();
    
    alert("opa");
    
});