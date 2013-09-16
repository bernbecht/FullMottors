<?php


require_once '../classes/CCategoria.php';
require_once '../classes/CMarca.php';


$categoria = new CCategoria;

print $categoria->getAllCategories();

$marca = new CMarca;

print $marca->getAllMarcas();

?>
