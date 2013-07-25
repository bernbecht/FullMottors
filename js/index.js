
/*--------------------------------------------------------------------
 * JAVASCRIPT usado para as funções da página do FULL MOTTORS* 
 * 
 -------------------------------------------------------------------*/

path = location.protocol + "//" + location.host + "/new/";
path_img = path+"img/";


motos_novas = '<div id="motos_novas">\n\
       <div class="wrapper"> \n\
           <div class="titulo_pagina"> \n\
               <h1> MOTOS 0 KM</h1>\n\
            <div id="btn_troca_para_semi" class="cantoneira">\n\
                    <a href="javascript:;">\n\
                        <div class="cantoneira_texto">\n\
                            CONHEÇA AS<br /> SEMI-NOVAS\n\
                        </div>\n\
                    </a>\n\
                </div></div>           \n\
 <div class="motos_categorias">   \n\
             <ul>      \n\
              <li><a href="javascript:;"><div class="enduro motos_categorias_ativa"></div></a></li>  \n\
                  <li><a href="javascript:;"><div class="sport"></div></a></li>  \n\
                  <li><a href="javascript:;"><div class="roadster"></div></a></li>  \n\
                  <li><a href="javascript:;"><div class="tour"></div></a></li>  \n\
              </ul>    \n\
        </div>   \n\
         <div class="motos_painel">    \n\
            <div class="motos_titulo">  \n\
                  <h2>ENDURO</h2>  \n\
              </div>     \n\
           <div class="motos_lista"> \n\
                   <ul>          \n\
                       <li><a href="'+path+'paginas/motos/r1200gsa.php"><img src="'+path_img+'enduro/r1200gsa.jpg" /><div class="motos_nome">BMW R 1200 GS Adventure</div></a></li>\n\
                        <li><a href="'+path+'paginas/motos/r1200gs.php"><img src="'+path_img+'enduro/200gs.jpg" /><div class="motos_nome">BMW R 1200 GS</div></a></li>  \n\
                      <li><a href="'+path+'paginas/motos/f800gs.php"><img src="'+path_img+'enduro/f800gs.jpg" /><div class="motos_nome">BMW F 800 GS</div></a></li>   \n\
                     <li><a href="'+path+'paginas/motos/g650gs.php"><img src="'+path_img+'enduro/g650.jpg" /><div class="motos_nome">BMW G 650 GS</div></a></li>   \n\
                     <li><a href="'+path+'paginas/motos/g650gs_sertao.php"><img src="'+path_img+'enduro/GS_sertao.jpg" /><div class="motos_nome">BMW G 650 GS SERTÃO</div></a></li> \n\
                   </ul> \n\
               </div>  \n\
          </div>     \n\
   </div>  \n\
  </div>'; 


//seta a classe que indica na subnav qual é a página atual
function trocarAbaSubnav(){
    
    //pega o endereço da pagina
    var href = location.href;
      
    //separa num array os valores divididos por um '/'
    var href_split = href.split('/');
    
    var split = href_split[5].split('.');
      
    //pega a PASTA da página  
    var pagina = split[0];
    
    $('.nav_ativada').removeClass('active');
    
    if(pagina == 'motos')
        $('#motos-nav').addClass('nav_ativada');
    
    else if(pagina == 'motos_semi_desc')
        $('#motos-nav').addClass('nav_ativada');  
    
    else if(pagina == 'boutique')
        $('#boutique-nav').addClass('nav_ativada');
    
    else if(pagina == 'descricao_produto')
        $('#boutique-nav').addClass('nav_ativada');
    
    else if(pagina == 'noticia_teaser')
        $('#noticia-nav').addClass('nav_ativada');
    
    else if(pagina == 'noticia')
        $('#noticia-nav').addClass('nav_ativada');
    
    else if(pagina == 'servicos')
        $('#servicos-nav').addClass('nav_ativada');
    
    else if(pagina == 'empresa')
        $('#empresa-nav').addClass('nav_ativada');
    
    else if(pagina == 'contato')
        $('#contato-nav').addClass('nav_ativada');   
}


//faz uma pagina inteira subir
function subirPagina(){
    $('body,html').animate({
        scrollTop: 0
    }, 500);
    return false;
}

/*Corta o texto da noticia principal no TEASER*/
function ajustaNoticiaTeaserMainText(){
    var txt =$('.noticia_teaser_main-post').text(); 
    
    txt = txt.substring(0,200)+'...';
    
    $('.noticia_teaser_main-post').text(txt);
}


/*Função que faz a requisição AJAX para pegar as SEMI*/
function getMotosSemiNovas(){
    var url = path+"operacoes/SemiNovas/getSemiNovasAjax.php";
     
    alert(url); 
    
    $.post(url,{
        
        },function(data){
            
            alert(data);
            
            if(data ==1){
                $('.motos_content').children().first().remove(); 
                $('.consulta_erro').remove();
                
                var consulta_erro = '<div class="consulta_erro">\n\
                                        <div class="wrapper">\n\
                                                <div class="titulo_pagina">\n\
                                                    <h1> MOTOS SEMI-NOVAS</h1>\n\
                                                    <div id="btn_troca_para_0km" class="cantoneira">\n\
                                                        <a href="javascript:;">\n\
                                                            <div class="cantoneira_texto">\n\
                                                                CONHEÇA AS<br /> MOTOS 0 Km\n\
                                                            </div>\n\
                                                        </a>\n\
                                                    </div>\n\
                                                    <br />Não há motos cadastradas no momento. \n\
                                                <div><br /><a class="btn" href="motos.php">Voltar</a></div>\n\
                                            </div> \n\
                                          </div>';
                $(consulta_erro).appendTo('.motos_content');
            }
            else{
            
                $('.motos_content').children().first().remove(); 
                $('.consulta_erro').remove();
                $(data).appendTo('.motos_content');
            }
        });   
    
}


/*Faz voltar para a página de 0 km quando clicado no breadcumbs da MOTO DESC*/
function controleUrlMotoDesc(){
    $('.retorna_0km').click(function(){  
        
        $('#moto_desc').transition({                            
            opacity : 0                
        },'500'); 
            
        setTimeout(function(){
            $('#moto_desc').remove();
        },500);
            
                  
        $(motos_novas).appendTo('.motos_content');
        
        
        setTimeout(function(){
            $('#motos_novas').transition({                            
                opacity : 1               
            },'500'); 
            //liga botão de trocar categoria das motos 0 km
            trocaCategoriaMotoNova();
            //liga botão que troca de 0 km para SEMI e vice-versa
            trocaModalidadeMoto();
            subirPagina();
        },500);  
    });
    
    
    $('.retorna_semi').click(function(){
        
        $('.motos_content').children().first().transition({                            
            opacity : 0                
        },'500');  
        
        //chama a função AJAX
        getMotosSemiNovas(); 
        
        setTimeout(function(){
            $('#motos_semi').transition({                            
                opacity : 1               
            },'500'); 
            trocaModalidadeMoto();
            subirPagina();
        },500); 
        
    });  
}

/*Controla a troca de fotos do MOTO DESC*/
function thumbnailsMotoDesc(){
        
    $('.moto_desc-thumb img').click(function(){
        var src_thumb = $(this).attr('src');
        var src_thumb_split = src_thumb.split("_");
        var nova_src = src_thumb_split[0] + '.jpg';
        
        
        $('.moto_desc-thumbMain img').attr('src',nova_src);
        
        
    });
    
    $('.moto_desc-thumb_semi img').click(function(){
        var src_thumb = $(this).attr('src');       
        $('.moto_desc-thumbMain img').attr('src', src_thumb);
    });
    
    
}

/*Faz com que a pagina de DESC de MOTOS apareça em tempos diferentes*/
function trocaTelaMotoDescricao(){
    setTimeout(function(){
        $('.titulo_pagina').transition({                            
            opacity : 1               
        },'500'); 
    },400); 
    setTimeout(function(){
        $('.moto_desc-galeria').transition({                            
            opacity : 1               
        },'500'); 
    },600); 
}

//troca a tela inicial de MOTOS para MODALIDADE 0km ou SEMI
function trocaTelaMotoInicial(){
    $('.moto_novas_btn').click(function(){
        
                 
        $('#moto_modalidade_control').transition({                            
            opacity : 0                
        },'500'); 
            
        setTimeout(function(){
            $('#moto_modalidade_control').remove();
        },500);            
         
          
        $(motos_novas).appendTo('.motos_content');
        
        
        setTimeout(function(){
            $('#motos_novas').transition({                            
                opacity : 1               
            },'500'); 
        },500); 
        
        trocaCategoriaMotoNova();
        trocaModalidadeMoto();
        subirPagina();
          
    });
    
    
    //botão SEMI da tela INICIAL MOTOS
    $('.moto_semi_btn').click(function(){ 
        
        $('#moto_modalidade_control').transition({                            
            opacity : 0                
        },'500'); 
            
        setTimeout(function(){
            $('#moto_modalidade_control').remove();
        },500);
        
        //chama a função AJAX
        getMotosSemiNovas(); 
        
        setTimeout(function(){
            $('#motos_semi').transition({                            
                opacity : 1               
            },'500'); 
            trocaModalidadeMoto();
            subirPagina();
        
        },500); 
    });
}

/*ALterna entre tela de 0km e semi-novas*/
function trocaModalidadeMoto(){
    
    $('#btn_troca_para_semi').click(function (){ 
        
        $('.motos_content').children().first().transition({                            
            opacity : 0                
        },'500');      
        
        //chama a função AJAX
        getMotosSemiNovas(); 
        
        setTimeout(function(){
            $('.motos_content').children().first().transition({                            
                opacity : 1               
            },'500'); 
            trocaModalidadeMoto();
            subirPagina();
        },500); 
        
    });
    
    $('#btn_troca_para_0km').click(function(){
       
        $('.motos_content').children().first().transition({                            
            opacity : 0                
        },'500'); 
            
        setTimeout(function(){
            $('.motos_content').children().first().remove();
        },500);
         
          
        $(motos_novas).appendTo('.motos_content');
        
        
        setTimeout(function(){
            $('#motos_novas').transition({                            
                opacity : 1               
            },'500'); 
            trocaCategoriaMotoNova();
            trocaModalidadeMoto();
            subirPagina();
        },500); 
    });
}

/*Comportamento quando clica no botão de categoria de MOTOS NOVAS*/
function trocaCategoriaMotoNova(){
    $('.enduro').click(function(){
        var lista_motos = '<ul>          \n\
                       <li><a href="'+path+'paginas/motos/r1200gsa.php"><img src="'+path_img+'enduro/r1200gsa.jpg" /><div class="motos_nome">BMW R 1200 GS Adventure</div></a></li>\n\
                        <li><a href="'+path+'paginas/motos/r1200gs.php"><img src="'+path_img+'enduro/200gs.jpg" /><div class="motos_nome">BMW R 1200 GS</div></a></li>  \n\
                      <li><a href="'+path+'paginas/motos/f800gs.php"><img src="'+path_img+'enduro/f800gs.jpg" /><div class="motos_nome">BMW F 800 GS</div></a></li>   \n\
                     <li><a href="'+path+'paginas/motos/g650gs.php"><img src="'+path_img+'enduro/g650.jpg" /><div class="motos_nome">BMW G 650 GS</div></a></li>   \n\
                     <li><a href="'+path+'paginas/motos/g650gs_sertao.php"><img src="'+path_img+'enduro/GS_sertao.jpg" /><div class="motos_nome">BMW G 650 GS SERTÃO</div></a></li> \n\
                   </ul>';
        
        $('.motos_lista ul').remove();
        $(lista_motos).appendTo('.motos_lista');
        
        $('.motos_titulo h2').text('ENDURO');        
        $('.motos_categorias_ativa').removeClass('motos_categorias_ativa');        
        $(this).addClass('motos_categorias_ativa');
    });
    
    
    $('.sport').click(function(){
        var lista_motos = '<ul>          \n\
              <li><a href="'+path+'paginas/motos/s1000rr.php"><img src="'+path_img+'sport/S1000RR.jpg" /><div class="motos_nome">BMW S 1000 RR</div></a></li> \n\
                       <li><a href="'+path+'paginas/motos/k1300s.php"><img src="'+path_img+'sport/K1300S.jpg" /><div class="motos_nome">BMW K 1300 S</div></a></li>\n\
                   </ul>';
        
        $('.motos_lista ul').remove();
        $(lista_motos).appendTo('.motos_lista');
        
        $('.motos_titulo h2').text('SPORT');        
        $('.motos_categorias_ativa').removeClass('motos_categorias_ativa');        
        $(this).addClass('motos_categorias_ativa');        
        
    });
    
    $('.roadster').click(function(){
        var lista_motos = '<ul>          \n\
                        <li><a href="'+path+'paginas/motos/k1300r.php"><img src="'+path_img+'roadster/k1300.jpg" /><div class="motos_nome">BMW K 1300 R</div></a></li> \n\
                        <li><a href="#"><img src="'+path_img+'roadster/r1200r.jpg" /><div class="motos_nome">BMW R 1200 R</div></a></li> \n\
                       <li><a href="'+path+'paginas/motos/f800r.php"><img src="'+path_img+'roadster/f800r.jpg" /><div class="motos_nome">BMW F 800 R</div></a></li>\n\
                   </ul>';
        
        $('.motos_lista ul').remove();
        $(lista_motos).appendTo('.motos_lista');
        
        $('.motos_titulo h2').text('ROADSTER');        
        $('.motos_categorias_ativa').removeClass('motos_categorias_ativa');        
        $(this).addClass('motos_categorias_ativa');        
        
    });
    
    $('.tour').click(function(){
        var lista_motos = '<ul>          \n\
              <li><a href="'+path+'paginas/motos/k1600gtl.php"><img src="'+path_img+'tour/k1600gtl.jpg" /><div class="motos_nome">BMW K 1600 GTL</div></a></li> \n\
                       <li><a href="'+path+'paginas/motos/k1600gt.php"><img src="'+path_img+'tour/K1600GT.jpg" /><div class="motos_nome">BMW K 1600 GT</div></a></li>\n\
                   </ul>';
        
        $('.motos_lista ul').remove();
        $(lista_motos).appendTo('.motos_lista');
        
        $('.motos_titulo h2').text('TOUR');        
        $('.motos_categorias_ativa').removeClass('motos_categorias_ativa');        
        $(this).addClass('motos_categorias_ativa');        
        
    });
}


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
            $('<div class="consulta_erro">Não há itens no momento.</div>').appendTo('.coluna9');
                
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

//coloca a css que diz qual página (1,2,...) você está visualizando
function setaPaginaAtual(){
    setTimeout(function() {                    
        $('#'+pagina_atual+'').addClass('pagina_atual');                    
                
    }, 300); 
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

//faz com que possa mudar a imagem de um produto aumentada numa MODAL
function mudaImgCaroselModal(){
    $('#nextBtnCaroselModal').click(function(){
        //next() pega o próximo irmão
        thumbs = thumbs.next();
        var src = thumbs.find('img').attr('src');
        if(typeof src === "undefined"){
            src = $(".ul_thumbnail").children("li").first().find('img').attr('src');
            thumbs = $(".ul_thumbnail").children("li").first();
        }
        $('.img_modal').remove();
        $('<div class="img_modal"><img src="'+src+'" /></div>').appendTo('.modal-body');
        
    });
    
    $('#backBtnCaroselModal').click(function(){
        //next() pega o próximo irmão
        thumbs = thumbs.prev();
        var src = thumbs.find('img').attr('src');
        if(typeof src === "undefined"){
            src = $(".ul_thumbnail").children("li").last().find('img').attr('src');
            thumbs = $(".ul_thumbnail").children("li").last();
        }
        $('.img_modal').remove();
        $('<div class="img_modal"><img src="'+src+'" /></div>').appendTo('.modal-body');
        
    });
    
    
}

//aumenta a imagem de um produto numa MODAL
function aumentarImg(){
    $('.thumbs').click(function (){
      
        thumbs = $(this);
        var src = $(this).find('img').attr('src');
        $('.img_modal').remove();
        $('<div class="img_modal"><img src="'+src+'" /></div>').appendTo('.modal-body');
        $('#myModal').modal('show');
    
    });
}


function trocaTitle(){
    //pega o endereço da pagina
    var href = location.href;
      
    //separa num array os valores divididos por um '/'
    var href_split = href.split('/');
    
    var href_split = href_split[5].split('.');
      
    //pega a PASTA da página  
    var pagina = href_split[0];
    
    if(pagina == 'motos')
        document.title='Full Mottors - Motos Novas e Semi-Novas';
    
    else if(pagina == 'boutique')
        document.title='Full Mottors - Boutique';
    
    else if(pagina == 'noticia_teaser')
        document.title='Full Mottors - Notícias';  
 
    
    else if(pagina == 'servicos')
        document.title='Full Mottors - Serviços';
    
    else if(pagina == 'empresa')
        document.title='Full Mottors - Empresa';
    
    else if(pagina == 'contato')
        document.title='Full Mottors - Contato';
    
}

$(document).ready(function(){
    aumentarImg();
    mudaImgCaroselModal();
    getProdutosBoutiqueMenu();
    trocaTelaMotoInicial();
    trocaTelaMotoDescricao();
    thumbnailsMotoDesc();
    controleUrlMotoDesc();
    trocaModalidadeMoto();
    ajustaNoticiaTeaserMainText();
    trocarAbaSubnav();
    trocaTitle();
    
});

