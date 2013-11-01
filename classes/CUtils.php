<?php
    require_once '../config.php';
    require_once APP_CLASSES . 'CConexao.php';

class CUtils
{

    public static function  booleanPostgresTranslater($bool)
    {
        if ($bool == FALSE) {
            $bool = 'f';
        } else {
            $bool = 't';
        }

        return $bool;
    }

    public static function  postgresBooleanTranslater($bool)
    {
        if ($bool == 'f') {
            $bool = FALSE;
        } else {
            $bool = TRUE;
        }

        return $bool;
    }

    public static function initializeAndPopDB(){
        $connection_object= new CConexao;
        $connection_object->novaConexao();

        $sql = 'DELETE FROM marca;
                DELETE FROM categoria;
                DELETE FROM img;
                DELETE FROM produto';

        pg_query($connection_object->getConnection(), $sql);

        $index=0;
        $sql = '';
        while($index<=4){
            $nome = 'Cat '.$index;
            $sql.= "INSERT INTO categoria (nome)
                VALUES ('$nome');";

            $nome = 'Marca '.$index;
            $sql.= "INSERT INTO marca (nome)
                VALUES ('$nome');";

            $path = 'D:/path/img'.$index.'.jpg';
            $sql.= "INSERT INTO img (img_path)
                VALUES ('$path');";

            $index++;
        }
        pg_query($connection_object->getConnection(), $sql);

        $connection_object->closeConexao();
    }


}