
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

$(document).ready(function(){
    trocarAbaSubnav();
});