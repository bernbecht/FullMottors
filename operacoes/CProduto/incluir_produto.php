<?php

require_once '../../config.php';

ini_set('display_errors', 0);

require_once '../../classes/CProduto.php';
require_once  '../../classes/CImagem.php';
require_once  '../../classes/CConexao.php';

$n = $_POST['nome'];
$m = $_POST['marca'];
$desc = $_POST['descricao'];
$p = $_POST['preco'];
$prazo = $_POST['prazo'];
$parcelas = $_POST['parcelas'];
$c = $_POST['categoria'];
$caract = $_POST['caracteristica'];
$foto_m = $_FILES['foto_miniatura'];


for ($i = 0; $i < 8; $i++) {
    if ($_FILES['foto' . $i]["name"] != null)
        $foto[] = $_FILES['foto' . $i];
    else {
        $foto[] = null;
    }
}


$d = date("Y-m-d");


$erro = null;

if($_FILES['foto_miniatura']["name"] == null){
    $erro[6] = "Uma figura de miniatura deve ser inserida. <br />";
}

if (strlen($n) < 1) {
    $erro[0] = "O modelo do produto deve ser especificado. <br />";
}

if (strlen($m) < 1) {
   echo $erro[1] = "A marca do produto deve ser especificada. <br />";
   
}

if (strlen($desc) > 1) {
    if (strlen($desc) < 2)
    $erro[2] = "A descrição do produto deve ser especificada. <br />";
}

if (strlen($p) > 0) {
    if (strlen($p) < 3)
    $erro[3] = "O preço deve ser especificado <br />";
}

if (strlen($caract) > 0) {
    if (strlen($caract) < 3)
    $erro[4] = "As características devem ser especificadas <br />";
}


$float = "^([0-9]*\,[0-9]*)$^";
if (!preg_match($float, $p)) {
    $erro[5] = "O preço deve ser informado ter a parte dos centavos <br />";
} else {

    $str = $p;
    //Tranforma um ponto flutuante com , em .
    if (strpos($str, '.') < strpos($str, ',')) {
        $str = str_replace('.', '', $str);
        $str = strtr($str, ',', '.');
    } else {
        $str = str_replace(',', '', $str);
    }

    //Faz com que apenas duas casas decimais sejam consideradas
    $p = number_format($str, 2, '.', '');
}


if (!preg_match($float, $prazo)) {
    $erro[7] = "O preço prazo deve ser informado e ter a parte dos centavos <br />";
} else {

    $str = $prazo;
    //Tranforma um ponto flutuante com , em .
    if (strpos($str, '.') < strpos($str, ',')) {
        $str = str_replace('.', '', $str);
        $str = strtr($str, ',', '.');
    } else {
        $str = str_replace(',', '', $str);
    }

    //Faz com que apenas duas casas decimais sejam consideradas
    $prazo = number_format($str, 2, '.', '');
}

if (count($erro) != 0) {
    foreach ($erro as $error) {
        echo $error;
    }
} else {

    $conexao1 = new CConexao();

    $conexao = $conexao1->novaConexao();

    //variável que vai nos dizer se foi incluído ou não
    $incluir = null;

    $db_error = null;

    //procedimento para ROLLBACK
    pg_query($conexao, "begin");

    $produto = new CProduto;

    //produto vai retornar a id do produto recem inserido no BD
    $incluir = $produto->incluirProduto($conexao, $n, $m, $desc, $d, $p, $c, $caract,$prazo, $parcelas);

    if (!$incluir) {
        $db_error[0] = pg_last_error($conexao);
    } else {
        $id_produto = $incluir;

        $imagem = new CImagem;

        //inclui a miniatura
        $incluir = $imagem->incluirImg($conexao, $foto_m, $id_produto, 1, 1);
        if (!$incluir) {
            $db_error[1] = pg_last_error($conexao);
        } else {
            
            $i = 0;
            //inclui as fotos de descrição
            while ($i < 8) {
                if ($foto[$i]["name"] != null) {
                    $incluir = $imagem->incluirImg($conexao, $foto[$i], $id_produto, 1, 2);
                    if (!$incluir) {
                        $db_error[2] = pg_last_error($conexao);
                    }
                }
                $i++;
            }
        }
    }

    if ($incluir) {
        pg_query($conexao, "commit");
        echo "1";
    } else {
        pg_query($conexao, "rollback");
        pg_close($conexao);

        if (count($db_error) != 0) {
            foreach ($db_error as $db_erro) {
                echo $db_erro . "<br />";
            }
        }
    }
}
?>
