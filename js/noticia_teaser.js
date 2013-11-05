/*Corta o texto da noticia principal no TEASER*/
function ajustaNoticiaTeaserMainText(){
    var txt =$('.noticia_teaser_main-post').text();

    txt = txt.substring(0,200)+'...';

    $('.noticia_teaser_main-post').text(txt);
}




$(document).ready(function(){
    ajustaNoticiaTeaserMainText();
});
