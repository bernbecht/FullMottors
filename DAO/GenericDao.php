<?php

require_once APP_DAO . "CCategoriaDao.php";
require_once APP_CLASSES . "CCategoria.php";

define("CLASS_CCATEGORIA", "CCategoria");

class GenericDao {

    public static function getAll($class) {

        $objectArray = FALSE;

        switch ($class) {
            case CLASS_CCATEGORIA:
                $result = CCategoriaDao::getAll();
                if (pg_num_rows($result) > 0) {
                    while ($fetch = pg_fetch_object($result)) {
                        $object = new CCategoria($fetch->id_categoria, $fetch->nome);
                        $objectArray[] = $object;
                    }
                }

                break;

            default:
                break;
        }
        return $objectArray;
    }

    public static function getByID($class, $id) {

        $object = FALSE;

        switch ($class) {
            case CLASS_CCATEGORIA:
                $result = CCategoriaDao::getByID($id);
                if (pg_num_rows($result) > 0) {
                    $fetch = pg_fetch_object($result);
                    $object = new CCategoria($fetch->id_categoria, $fetch->nome);
                }
                break;

            default:
                break;
        }
        return $object;
    }

    public static function insertObjectBD($object, $connectionObject) {
        $className = get_class($object);
        $result = FALSE;
        $connection = $connectionObject->getConnection();

        switch ($className) {
            case CLASS_CCATEGORIA:
                $result = CCategoriaDao::insertObjectBD($object, $connection);

                break;

            default:
                break;
        }

        return $result;
    }

}

?>
