<?php

    session_start();
    
    require_once '../../classes/CUsuario.php';
    
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    
    $user = new CUsuario;
    
    $consulta = $user->login($login, $senha);
    
    $num_rows = pg_num_rows($consulta);
    
    
    if($num_rows>0){
        
        $fetch = pg_fetch_object($consulta);
        
        $_SESSION['usuario'] = $fetch->login;
        
        echo 1;
    }
    else{
        unset($_SESSION['usuario']);
        
        echo 0;
    }
?>
