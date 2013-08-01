
/*
 *  FILE'S DESCRIPTION
 *  ------------------
 *  Scripts para a página /paginas/motos.php 
 *  
 */


path = location.protocol + "//" + location.host + "/FullMottors/";
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

$(document).ready(function(){
    alert("Motos.js");
    
    trocaTelaMotoInicial();
    trocaTelaMotoDescricao();
    thumbnailsMotoDesc();
    controleUrlMotoDesc();
    trocaModalidadeMoto();
});