

function loginAjax(){
    $('#login_btn').click(function(){
        $('#login_form').ajaxSubmit( {            
            data: {
            },
            
            beforeSubmit: function() {
                
            },
            success: function(data) {
                $('.erro_login').children().first().remove();                
                //alert(data);
                if(data != 1){                   
                  
                    $('<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">×</button>Login e/ou Senha inválido.</div>')
                    .appendTo('.erro_login');
                }
                else{                   
                    window.location = path_sistema+"/main_sistema.php";


                }
            }           
        }); 
    });
}


$(document).ready(function(){
    loginAjax();
});