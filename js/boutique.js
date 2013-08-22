/*
 *  FILE'S DESCRIPTION
 *  ------------------
 *  Scripts para a página /paginas/boutique.php 
 *  
 */


function getProdutosBoutiqueMenuAjax(marca, categoria, offset){
    
    var url = '../operacoes/Boutique/getProdutoAjax.php';
    
    $.post(url,{
        categoria:categoria,
        marca:marca,
        offset:offset
    },function(data){
        if(data==2){
            $('.titulo_categoria_boutique h1').text(categoria+'s');
            $('.janela_produtos').remove();
            $('.consulta_erro').remove();
            $('.pagination').remove();
            $('<div class="consulta_erro">Não há itens no momento.</div>')
            .appendTo('.coluna9');
                
        }
        else{
            $('.consulta_erro').remove();
            $('.titulo_categoria_boutique').remove();
            $('.janela_produtos').remove();
            $('.pagination').remove();
            $(data).appendTo('.coluna9');
            
            //ativa os botões de PAGINAÇÃO
            btnProximaPagina();
            btnAnteriorPagina();
            btnPaginacao();
            
            //variavel que vai me dizer quantas páginas esperar numa requisição
            qtd_paginacao = $('.pagination ul').children().length;
            
            var w_paginacao = $('.pagination ul').width();
            var w_janelaProdutos =  $('.janela_produtos').width();
           
            $('.pagination ul').css({
                'marginLeft': (w_janelaProdutos-w_paginacao)/2,
                'marginRight': (w_janelaProdutos-w_paginacao)/2
            });
             
           
        }
    });
}


//função que contém o comportamento do menu lateral da BOUTIQUE
function getProdutosBoutiqueMenu(){ 
    
    $('.capacete').click(function(){
        
        pagina_atual = 1;
        marca = $(this).text();
        categoria = 'capacete';
        offset = 0;
        
        getProdutosBoutiqueMenuAjax(marca,categoria,offset);
        
        setaPaginaAtual();  
    });
    
    
    $('.luva').click(function(){
        
        pagina_atual = 1;
        marca = $(this).text();
        categoria = 'luva';
        offset = 0;     
        
        getProdutosBoutiqueMenuAjax(marca,categoria,offset); 
        
        setaPaginaAtual(); 
        
    });  
}

function btnProximaPagina(){
    $('.proximo_btn').click(function(){
          
        if(qtd_paginacao-2>1){
            offset = offset + 8;
            if(offset<=(qtd_paginacao-3)*8){               
                getProdutosBoutiqueMenuAjax(marca, categoria, offset); 
                pagina_atual++;                
                
                setaPaginaAtual();
                
            }
            else{
                offset = offset - 8; 
            }
        }
                
    });
}

function btnAnteriorPagina(){
    $('.anterior_btn').click(function(){
        offset = offset - 8;
        if(offset >= 0){              
            getProdutosBoutiqueMenuAjax(marca, categoria, offset); 
                        
            pagina_atual--;
            
            setaPaginaAtual()
            
        } 
        else{
            offset= 0;
        }
            
    });
}

function btnPaginacao(){
    $('.btn_paginacao').click(function(){
        
        offset = $(this).attr('id') * 8 -8;
        getProdutosBoutiqueMenuAjax(marca, categoria, offset); 
        
        pagina_atual = $(this).attr('id');
        
        setaPaginaAtual(); 
    });
}
    
$(document).ready(function(){        
    getProdutosBoutiqueMenu();
});