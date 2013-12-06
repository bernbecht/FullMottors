<?php
session_start();
if (!isset($_SESSION['usuario']))
    header("location:../logout.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="../css/bootstrap-responsive.css" />   
        <link rel="stylesheet" href="../css/index_1.css" />
        <link rel="stylesheet" href="../css/sistema.css" />
        <link rel="stylesheet" href="../css/scaffolding.css" />

        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/bootstrap.js"></script>        
        <script type="text/javascript" src="../js/transitions.js"></script>
        <script type="text/javascript" src="../js/jquery_form.js"></script>
        <script type="text/javascript" src="../js/nicEdit.js"></script>
        
        
        <link rel="stylesheet" type="text/css" href="../css/jquery.jqplot.min.css" />
    </head>
    <body>
        <div class="navbar ">
            <div class="navbar-inner">
                <div class="container">                    
                    <a  class="brand" href="#">Full Mottors</a>  
                    <ul class="nav  pull-right">
                        <li><a id="ajudaLink" data-toggle="modal" href="#helpModal">Ajuda</a></li>
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a href="#"  class="dropdown-toggle" data-toggle="dropdown">
                                <?php print 'Olá, ' . $_SESSION['usuario'] ?><b class="caret"></b></a>
                            <ul id="menu2" class=" nav-list dropdown-menu">
                                <li>
                                    <a href="../pessoa/view_conta.php">
                                        <i class="icon-user"></i>
                                        Conta
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="../logout.php">
                                        <i class="icon-off"> </i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="subnav">            
            <ul class="nav nav-pills">


<!--                <li class="dropdown" id="boutique">-->
<!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Boutique-->
<!--                        <b class="caret"></b></a>-->
<!--                    <ul id="pessoas_menu_dropdown" class="dropdown-menu">-->
<!--                        <li><a  href="cadastro_produtos.php">Incluir Produto</a></li>-->
<!--                        <li><a  href="view_produtos.php">Listar Produtos</a></li>-->
<!--                    </ul>-->
<!--                </li>-->



                <li class="dropdown" id="seminovas">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Semi-Novas
                        <b class="caret"></b></a>
                    <ul id="pessoas_menu_dropdown" class="dropdown-menu">
                        <li id="processo"><a href="cadastro_seminova.php">Incluir Semi-Nova</a></li>
                        <li><a  href="view_seminova.php">Listar Semi-Nova</a></li>
                    </ul>
                </li>



                <li id="dados" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notícias
                        <b class="caret"></b></a>
                    <ul id="dados_menu_dropdown" class="dropdown-menu">
                        <li><a  href="cadastro_noticia.php">Incluir Notícia</a></li>     
                        <li><a  href="view_noticias.php">Listar Notícias</a></li> 
                    </ul>
                </li>                          
            </ul>           
        </div>