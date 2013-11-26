<?php
/*
 * PATHs PHP for REQUIRE and INCLUDE
 */
define("APP_ROOT", realpath(dirname(__FILE__)));
define("APP_OPERACOES", APP_ROOT . '/operacoes/');
define("APP_DAO", APP_ROOT . '/DAO/');
define("APP_CLASSES", APP_ROOT . '/classes/');
define("APP_IMG", APP_ROOT . '/img/');
define("APP_SISTEMA", APP_ROOT . '/sistema/');
define ("APP_TEMPLATE", APP_ROOT . "/template/");
define ("APP_PAGINAS", APP_ROOT."/paginas/");
/*
 * PATHs SRC and HREF using PHP
 */
//Path Server
//$path = "http://" . $_SERVER['SERVER_NAME'] . '/new';
$path = "http://" . $_SERVER['SERVER_NAME'] . '/FullMottors';
//TODO: trocar para o padrão
$path_css = $path . "/css/";
//TODO: trocar para o padrão
$path_js = $path . "/js/";
$path_img = $path . "/img";
$path_paginas = $path . "/paginas";
$path_sistema = $path . "/sistema";?>