<?php

require_once '../../classes/CEmail.php';

$email = new CEmail;

$remetente = $_POST['email'];
$remetente_nome = $_POST['nome'];
$msg = $_POST['msg'];
$assunto = $_POST['assunto'];




$resultado = $email->enviarEmail($remetente, $remetente_nome, $assunto, $msg);
//$email->emailTeste();



echo $resultado;
?>
