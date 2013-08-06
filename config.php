<?php

//$path = "http://" . $_SERVER['SERVER_NAME'] . '/new/';

/*
 * PATHs PHP
 */

define( "APP_ROOT", realpath( dirname( __FILE__ ) ).'/' );
define("APP_OPERACOES",realpath( dirname( __FILE__ ) ).'/operacoes/');
define("APP_DAO",realpath( dirname( __FILE__ ) ).'/operacoes/DAO/');
define("APP_CLASSES",realpath( dirname( __FILE__ ) ).'/classes/');


/*
 * PATHs JS
 */
$path = "http://" . $_SERVER['SERVER_NAME'] . ':8012/FullMottors/';
$path_css = $path . "css/";
$path_js = $path . "js/";
?>
 