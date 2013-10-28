
/*--------------------------------------------------------------------
 * JAVASCRIPT usado para as funções da página do FULL MOTTORS* 
 * 
 -------------------------------------------------------------------*/

path = location.protocol + "//" + location.host + "/FullMottors/";
path_img = path+"img/";


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



//coloca a css que diz qual página (1,2,...) você está visualizando
function setaPaginaAtual(){
    setTimeout(function() {                    
        $('#'+pagina_atual+'').addClass('pagina_atual');                    
                
    }, 300); 
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
    ajustaNoticiaTeaserMainText();
    trocarAbaSubnav();
    //trocaTitle();
    
});

