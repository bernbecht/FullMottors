<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Berzuca
 * Date: 10/09/13
 * Time: 17:13
 * To change this template use File | Settings | File Templates.
 */

class Utils
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


}