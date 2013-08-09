<?php

//$path = "http://" . $_SERVER['SERVER_NAME'] . '/new/';

/*
 * PATHs PHP
 */

define("APP_ROOT", realpath(dirname(__FILE__)));
define("APP_OPERACOES", APP_ROOT . '/operacoes/');
define("APP_DAO", APP_ROOT . '/DAO/');
define("APP_CLASSES", APP_ROOT . '/classes/');
define("APP_IMG", APP_ROOT . '/img/');
define("APP_SITEMA", APP_ROOT . '/sistema/');
define ("APP_TEMPLATE",APP_ROOT."/template/");




/*
 * PATHs JS
 */
$path = "http://" . $_SERVER['SERVER_NAME'] . ':8012/FullMottors';
$path_css = $path . "/css/";
$path_js = $path . "/js/";
$path_img = $path."/img/";
?>
 