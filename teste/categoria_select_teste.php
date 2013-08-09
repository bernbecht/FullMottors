<?php

require_once '../config.php';
require_once APP_DAO . "GenericDao.php";
require_once APP_CLASSES . "CConexao.php";


$id = 1;

$objectArray = GenericDao::getByID(CLASS_CCATEGORIA, $id);



if ($objectArray == FALSE)
    print "Nao ha o objeto";
else {
    print $objectArray->getNome();
    
    $connectionObject = new CConexao;
    $connectionObject->novaConexao();

    $result = GenericDao::insertObjectBD($objectArray, $connectionObject);

    if ($result == FALSE)
        print "Não foi";
    else
        print "Foi";
}
?>
