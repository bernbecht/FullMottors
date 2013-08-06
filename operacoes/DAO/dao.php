<?php

require_once APP_DAO."CategoriaDao.php";

define("CCategoria","CCategoria.class");


class dao {    
    
    
    public static function getAll($class){
        switch ($class) {
            case CCategoria:
                return CategoriaDao::getAll();

                break;

            default:
                break;
        }
    }
    
    
    
}

?>
