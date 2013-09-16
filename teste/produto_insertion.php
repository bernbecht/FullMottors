<?php

require_once '../config.php';
require_once APP_DAO . 'GenericDao.php';
require_once APP_CLASSES . 'CMarca.php';
require_once APP_CLASSES . 'CConexao.php';
require_once APP_TESTE . 'CImagem.php';
require_once '../teste/CProduto.php';



$marca_object = GenericDao::getByID(CLASS_CMARCA, 1);
$categoria_object = GenericDao::getByID(CLASS_CCATEGORIA, 1);
//$produto_object = GenericDao::getAll(CLASS_CPRODUTO);

/*
if ($produto_object != FALSE) {
    print "Existe componentes";

    foreach ($produto_object as $produto_object) {
        print " " . $produto_object->getNome();

        $marca_object = $produto_object->getMarca();
        print " " . $marca_object->getNome();

        $imagem_object = $produto_object->getImagens();

        if ($imagem_object != FALSE) {
            foreach ($imagem_object as $imagem_object) {
                print $imagem_object->getPathImagem() . " ";
                print $imagem_object->getID() . " ";
            }
        }
        else{
            print "Não há Imagens para o produto ".$produto_object->getNome();
        }
    }


} else {
    print "Produto não existe";
}*/

print "Teste de insercao do Produto </br>";

/*print $data = date("Y-m-d");

$product_objetct = new CProduto(null,"Produto de Teste",$data,"Descricao produto 1",TRUE,FALSE,1000.00,5,1200.00);
$product_objetct->setCategoria($categoria_object);
$product_objetct->setMarca($marca_object);


$connectionObject = new CConexao();
$connectionObject->novaConexao();

$result = GenericDao::insertObjectBD($product_objetct,$connectionObject);


if($result != FALSE){
    print "Inseriu </br>";
}
else{
    print "A opereacao nao pode ser realizada </br>";
}
$connectionObject->closeConexao();
*/


/*$product_object = GenericDao::getByID(CLASS_CPRODUTO,9);

print $product_object->getLancamento();

if($product_object->getLancamento() == FALSE){
    print "EH FALSO";
}
*/

$imagem_object = new CImagem(null, "D:/path/img.jpg");

$connectionObject = new CConexao();
$connectionObject->novaConexao();

$result = GenericDao::insertObjectBD($imagem_object,$connectionObject);

if($result != FALSE){
    print "Inseriu imagem";
}
else{
    print "Não inseriu";
}

$connectionObject->closeConexao();






