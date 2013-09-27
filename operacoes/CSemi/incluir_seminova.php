<?php

require_once '../../classes/CSemi.php';

require_once '../../classes/CImagem.php';



$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$preco = $_POST['preco'];
$observacao = $_POST['observacoes'];
$cilindradas = $_POST['cilindrada'];
$refrigeracao = $_POST['refrigeracao'];
$motor = $_POST['motor'];
$potencia = $_POST['potencia'];
$cor = $_POST['cor'];
$km = $_POST['km'];
$estilo = $_POST['estilo'];
$transmissao = $_POST['transmissao'];
$partida = $_POST['partida'];
$esa = $_POST['esa'];
$ascs = $_POST['ascs'];
$rdc = $_POST['rdc'];
$bc = $_POST['bc'];
$bolsas = $_POST['bolsas'];
$foto_m = $_FILES['foto_miniatura'];


for ($i = 0; $i < 8; $i++) {
    if ($_FILES['foto' . $i]["name"] != null)
        $foto[] = $_FILES['foto' . $i];
    else {
        $foto[] = null;
    }
}

$erro = null;


if ($_FILES['foto_miniatura']["name"] == null){
     $erro[20] = "A foto de miniatura é obrigatória. <br />";
}



/* Garante que o valor BOOL vai funcionar */




$esa = "'" . $esa . "'";

$ascs = "'" . $ascs . "'";

$rdc = "'" . $rdc . "'";

$bc = "'" . $bc . "'";



if ($partida == "null") {
    $partida = "";
}

if ($transmissao == "null") {
    $transmissao = '';
}

if ($estilo == "null") {
    $estilo = '';
}


if (strlen($modelo) < 1) {
    $erro[0] = "O modelo da moto é obrigatório. <br />";
}

if (strlen($marca) < 1) {
    $erro[1] = "A marca da moto é obrigatória. <br />";
}

if (strlen($ano) != 4) {
    $erro[2] = "O ano da moto deve ter 4 dígitos. <br />";
}

if (!is_numeric($ano)) {
    $erro[6] = "O ano da moto deve ser numérico. <br />";
}

if (strlen($preco) < 1) {
    $erro[3] = "O preço deve ser informado. <br />";
}


$float = "^([0-9]*\,[0-9]*)$^";
if (!preg_match($float, $preco)) {
    $erro[4] = "O preço deve ter a parte dos centavos <br />";
} else {

    $str = $preco;
    //Tranforma um ponto flutuante com , em .
    if (strpos($str, '.') < strpos($str, ',')) {
        $str = str_replace('.', '', $str);
        $str = strtr($str, ',', '.');
    } else {
        $str = str_replace(',', '', $str);
    }

    //Faz com que apenas duas casas decimais sejam consideradas
    $preco = number_format($str, 2, '.', '');
}

if (strlen($observacao) > 0) {

    if (strlen($observacao) < 2)
        $erro[5] = "OBSERVAÇÃO não é obrigatória, mas se escrever, digite um texto com mínimo de 2 caracteres. <br />";
}

if (strlen($cilindradas) < 1) {
    $erro[15] = "A cilindrada é obrigatória. <br />";
}

if (!is_numeric($cilindradas)) {
    $erro[7] = "A cilindrada da moto deve ser numérica. <br />";
}

if (strlen($refrigeracao) > 0) {

    if (strlen($refrigeracao) < 2)
        $erro[8] = "REFRIGERAÇÃO não é obrigatória, mas se escrever, digite um texto com mínimo de 2 caracteres. <br />";
}

if (strlen($motor) > 0) {

    if (strlen($motor) < 2)
        $erro[9] = "MOTOR não é obrigatório, mas se escrever, digite um texto com mínimo de 2 caracteres. <br />";
}

if (strlen($potencia) < 1) {
    $erro[10] = "A potência da moto é obrigatório. <br />";
}


if (!is_numeric($potencia)) {
    $erro[11] = "A potência da moto deve ser numérica. <br />";
}

if (strlen($cor) > 0) {

    if (strlen($cor) < 2)
        $erro[12] = "MOTOR não é obrigatório, mas se escrever, digite um texto com mínimo de 2 caracteres. <br />";
}

if (strlen($km) < 1) {
    $erro[13] = "A KM é obrigatória. <br />";
}


if (!is_numeric($km)) {
    $erro[14] = "A KM da moto deve ser numérica. <br />";
}


if (count($erro) != 0) {
    foreach ($erro as $error) {
        echo $error;
    }
} else {

    $moto = new CSemi;

    $conexao1 = new CConexao();

    $conexao = $conexao1->novaConexao();

    //variável que vai nos dizer se foi incluído ou não
    $incluir = null;

    $db_error = null;

    //procedimento para ROLLBACK
    pg_query($conexao, "begin");


    //produto vai retornar a id do produto recem inserido no BD
    $incluir = $moto->incluirSemi($conexao, $marca, $modelo, $ano, $cilindradas, $transmissao, $partida, $refrigeracao, $esa, $ascs, $rdc, $bc, $observacao, $bolsas, $motor, $potencia, $cor, $km, $estilo, $preco);

    if (!$incluir) {
        $db_error[0] = pg_last_error($conexao);
    } else {
        $id_produto = $incluir;

        $imagem = new CImagem;

        //inclui a miniatura
        $incluir = $imagem->incluirImgSemiNovas($conexao, $foto_m, $id_produto, 3, 1);
        if (!$incluir) {
            $db_error[1] = pg_last_error($conexao);
        } else {

            $i = 0;
            //inclui as fotos de descrição
            while ($i < 8) {
                if ($foto[$i]["name"] != null) {
                    $incluir = $imagem->incluirImgSemiNovas($conexao, $foto[$i], $id_produto, 3, 2);
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
