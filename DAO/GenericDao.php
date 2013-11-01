<?php

require_once APP_DAO . "CCategoriaDao.php";
require_once APP_DAO . "CMarcaDao.php";
require_once APP_DAO . "CProdutoDao.php";
require_once APP_DAO . "CImagemDao.php";

require_once APP_CLASSES . "CConexao.php";
require_once APP_CLASSES . "CCategoria.php";
require_once APP_CLASSES . "CMarca.php";
require_once APP_CLASSES . "CProduto.php";
require_once APP_CLASSES . "CImagem.php";

define("CLASS_CCATEGORIA", "CCategoria");
define("CLASS_CMARCA", "CMarca");
define("CLASS_CPRODUTO", "CProduto");
define("CLASS_CIMAGEM", "CImagem");
define("MODALIDADE_PRODUTO", 1);


class GenericDao
{

    public static function getAll($class)
    {
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

            case CLASS_CMARCA:
                $result = CMarcaDao::getAll();
                if (pg_num_rows($result) > 0) {
                    while ($fetch = pg_fetch_object($result)) {
                        $object = new CMarca($fetch->id_marca, $fetch->nome);
                        $objectArray[] = $object;
                    }
                }
                break;

            case CLASS_CPRODUTO:
                $result = CProdutoDao::getAll();
                if (pg_num_rows($result) > 0) {
                    while ($fetch = pg_fetch_object($result)) {
                        $object = new CProduto($fetch->id_produto,
                            $fetch->nome,
                            $fetch->data,
                            $fetch->descricao,
                            $fetch->view_status,
                            $fetch->lancamento,
                            $fetch->preco,
                            $fetch->parcelas,
                            $fetch->prazo);
                        $object->setMarca(GenericDao::getByID(CLASS_CMARCA, $fetch->id_marca));
                        $object->setCategoria(GenericDao::getByID(CLASS_CCATEGORIA, $fetch->id_categoria));
                        $object->setImagens(GenericDao::getAllImagemByID($object->getID(), MODALIDADE_PRODUTO));

                        $objectArray[] = $object;
                    }
                }
                break;

            case CLASS_CIMAGEM:
                $result = CImagemDao::getAll();
                if (pg_num_rows($result) > 0) {
                    while ($fetch = pg_fetch_object($result)) {
                        $object = new CImagem($fetch->id_img, $fetch->img_path);
                        $objectArray[] = $object;
                    }
                }
                break;

            default:
                break;
        }
        return $objectArray;
    }

    public static function getByID($class, $id)
    {
        $object = FALSE;

        switch ($class) {
            case CLASS_CCATEGORIA:
                $result = CCategoriaDao::getByID($id);
                if (pg_num_rows($result) > 0) {
                    $fetch = pg_fetch_object($result);
                    $object = new CCategoria($fetch->id_categoria, $fetch->nome);
                }
                break;

            case CLASS_CMARCA:
                $result = CMarcaDao::getByID($id);
                if (pg_num_rows($result) > 0) {
                    $fetch = pg_fetch_object($result);
                    $object = new CMarca($fetch->id_marca, $fetch->nome);
                }
                break;

            case CLASS_CPRODUTO:
                $result = CProdutoDao::getByID($id);
                if (pg_num_rows($result) > 0) {
                    $fetch = pg_fetch_object($result);
                    $object = new CProduto($fetch->id_produto,
                        $fetch->nome,
                        $fetch->data,
                        $fetch->descricao,
                        $fetch->view_status,
                        $fetch->lancamento,
                        $fetch->preco,
                        $fetch->parcelas,
                        $fetch->prazo);
                }
                $object->setMarca(GenericDao::getByID(CLASS_CMARCA, $fetch->id_marca));
                $object->setCategoria(GenericDao::getByID(CLASS_CCATEGORIA, $fetch->id_categoria));
                $object->setImagens(GenericDao::getAllImagemByID($object->getID(), MODALIDADE_PRODUTO));

                break;

            case CLASS_CIMAGEM:
                $result = CImagemDao::getByID($id);
                if (pg_num_rows($result) > 0) {
                    $fetch = pg_fetch_object($result);
                    $object = new CImagem($fetch->id_img, $fetch->img_path);
                }

            break;

            default:
                break;
        }
        return $object;
    }

    public static function insertObjectBD($object, $connectionObject)
    {
        $className = get_class($object);
        $result = FALSE;
        $connection = $connectionObject->getConnection();

        //TODO: Remover esses print
        print $connectionObject->verificaConexao();
        print $connection;

        switch ($className) {
            case CLASS_CCATEGORIA:
                $result = CCategoriaDao::insertObjectBD($object, $connection);
                break;

            case CLASS_CMARCA:
                $result = CMarcaDao::insertObjectBD($object, $connection);
                break;

            case CLASS_CPRODUTO:
                $result = CProdutoDao::insertObjectBD($object,$connection);
                break;

            case CLASS_CIMAGEM:
                $result = CImagemDao::insertObjectBD($object,$connection);
                break;

            default:
                break;
        }

        return $result;
    }


    public static function getAllImagemByID($id, $modalidade)
    {
        $objectArray = FALSE;

        $result = CImagemDao::getAllByID($id, $modalidade);
        if (pg_num_rows($result) > 0) {
            while ($fetch = pg_fetch_object($result)) {
                $object = new CImagem($fetch->id_imagem, $fetch->imagem_path);
                $objectArray[] = $object;
            }
        }
        return $objectArray;
    }

}

?>
