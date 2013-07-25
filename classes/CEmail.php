<?php

require_once 'class.phpmailer.php';

class CEmail {

    function emailTeste() {

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.fmottors.com.br';
        $mail->Port = 25;
        $mail->SMTPSecure = '';
        $mail->Username = "contato@fmottors.com.br"; // my email which I hope to receive the data inputed on the field
        $mail->Password = "full8m";

        $mail->SetFrom('contato@fmottors.com.br', 'Interessado'); // the email from the person who filled the form, that will be in the body of the message that I will receive
        $address = "berzuca@msn.com"; // my email which I hope to receive the data inputed on the field
        $mail->AddAddress($address, "Fine Design");
        $mail->Subject = "Fine Design - Avise me!";
        $mail->MsgHTML('Opa');

        if (!$mail->Send()) {

            echo "Erro de envio: " . $mail->ErrorInfo;
        } else {

            echo "Mensagem enviada com sucesso!";
        }
    }

    function enviarEmail($remetente, $remetente_nome, $assunto, $msg) {
        
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.fmottors.com.br';
        $mail->Port = 25;
        $mail->SMTPSecure = '';
        $mail->Username = "contato@fmottors.com.br"; // my email which I hope to receive the data inputed on the field
        $mail->Password = "full8m";

        $mail->SetFrom('contato@fmottors.com.br', 'Contato Full Mottors');         
        $mail->AddAddress('contato@fmottors.com.br', 'Contato Full Mottors');
        $mail->Subject = "CONTATO PELO SITE - ".$assunto;
        $msg = "Nome: ".$remetente_nome."<br />
                E-mail: ".$remetente."<br />
                Assunto: ".$assunto."<br/ >
                Mensagem :".$msg;
        
        $mail->AddReplyTo($remetente, $remetente_nome);
                
                
        $mail->MsgHTML($msg);

        if (!$mail->Send()) {

            echo "Erro de envio: " . $mail->ErrorInfo;
        } else {

            echo 1;
        }
    }

}

?>
