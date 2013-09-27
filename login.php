<?php
require_once 'config.php';
session_start();
 if (isset($_SESSION['usuario']))
    header("location:".$path_sistema."/main_sistema.php");?>

<!DOCTYPE html>
<html>
    <head>
        <title>Full Mottors - CMS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/bootstrap-responsive.css"/>
        <link rel="stylesheet" href="css/scaffolding.css"/>
        <link rel="stylesheet" href="css/index_1.css"/>
        <link rel="stylesheet" href="css/carosel_1.css"/>
        <link rel="stylesheet" href="css/login.css"/>



        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/transitions.js"></script>
        <script type="text/javascript" src="js/jquery_form.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
        <script type="text/javascript" src="js/common_var.js"></script>

    </head>
    <body>        
        <div class="login_container">
            <h1>Full Mottors - Login</h1>

            <div class="erro_login"></div>

            <form id="login_form" class="form-horizontal" action="operacoes/Sistema/login_op.php" method="post">
                <div class="control-group">
                    <label class="control-label" for="inputLogin">Login</label>
                    <div class="controls">
                        <input name="login" type="text" id="inputLogin" placeholder="Login">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputSenha">Senha</label>
                    <div class="controls">
                        <input name="senha" type="password" id="inputSenha" placeholder="Senha">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">                        
                        <button id="login_btn" type="button" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>

        </div>      
    </body>
</html>