/*
    FILE'S DESCRIPTION
    ------------------

    Funções JS para motos_seminovas.php

 */


/*Função que faz a requisição AJAX para pegar as SEMI*/
function getMotosSemiNovas(){
    var url = path+"/operacoes/SemiNovas/getSemiNovasAjax.php";
    //alert(url);

    $.post(url,{

    },function(data){

        //alert(data);

        if(data ==1){
            //remove load_img.gif
            $('.motos_content').children().first().remove();
            $('.consulta_erro').remove();

            var consulta_erro = '<div class="consulta_erro">\n\
                                        <div class="wrapper">\n\
                                                <div class="titulo_pagina">\n\
                                                    <h1> MOTOS SEMI-NOVAS</h1>\n\
                                                    <br />Não há motos cadastradas no momento. \n\
                                                    <br /> \n\
                                                    <br />Aproveite e conheça a linha de <span class="text_color_red"><b>motos 0 KM</b></span>. \n\
                                                     <div class="link_carosel_container">\n\
                                                            <a href="motos_novas.php" class=""><div class="link_carosel_texto">Motos 0 KM</div></a>\n\
                                                    </div>\n\
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


$(document).ready(function(){

    getMotosSemiNovas();

    setTimeout(function(){
        $('#motos_semi').transition({
            opacity : 1
        },'500');
    },500);

});
