
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



function enviaEmail(){
    $('#enviar_email_btn').click(function(){
        var email = $('#email-input').val(),
        nome = $('#nome-input').val(),
        msg = $('#mensagem-input').val(),
        assunto = $('#assunto-input').val();
            
        var mandar = 0,
        erro= '',
        url = '../operacoes/Contato/enviarEmail.php';
        
        $('.erro_form').children().first().remove();
        
        $('.resultado_contato').children().first().remove();
        
        if(nome.length <=1){
            mandar =1;
            erro= "Escreva o seu nome <br />";
        } 
        
        if(email.length <=5){
            mandar =1;
            erro+= "E-mail inválido <br />";
        }
        
        if(assunto.length <=1){
            mandar =1;
            erro+= "Escreva um assunto<br />";
        }
            
        
        if(msg.length <=1){
            mandar =1;
            erro+= "Escreva uma mensagem<br />";
        }
        
        if(mandar==1){
            var erro_alert = '<div class="alert alert-danger">'+erro+'<div/>';
            $(erro_alert).appendTo('.erro_form');
        }
            
        else{
            $.post(url,
            {
                email:email,
                nome:nome,
                msg:msg,
                assunto:assunto
            },
            function(data){     
                
                if(data==1){
                    $('<div>Obrigado, sua mensagem foi mandada com sucesso.</div>')
                    .appendTo('.resultado_contato');
                    limparForm('#contato_form');
                }
                
                else
                    alert(data);
            });
        }
            
            
    });
}

$(document).ready(function(){    
    enviaEmail();
});
