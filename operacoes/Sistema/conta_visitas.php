<?php

require_once '../../classes/CConexao.php';

$conexao1 = new CConexao;
$conexao = $conexao1->novaConexao();

$ano = date("Y-m-d");

$ano = mb_split('-', $ano);

$ano = $ano[0];

$tipo =$_POST['tipo'];

$id = $_POST['id'];

$sql = "SELECT  min(data), max(data) 
	from visitas
	where data like '$ano%'
        and tipo = $tipo
        and id_dono=$id";

$consulta = pg_query($conexao, $sql);

$num_rows = pg_num_rows($consulta);

$fetch = pg_fetch_object($consulta);

if ($fetch->max != '') {


    $maior = $fetch->max;
    $menor = $fetch->min;

    $split_mes = mb_split('-', $maior);
    $mes_maior = $split_mes[1];
    $split_mes = mb_split('-', $menor);
    $mes_menor = $split_mes[1];
    
    $count = null;
    $meses = null;

    while ($mes_menor <= $mes_maior) {

        $sql = "SELECT *
	from visitas
	where data like '$ano-$mes_menor%'
        and tipo = $tipo
        and id_dono=$id";

        $consulta = pg_query($conexao, $sql);


        $num_rows = pg_num_rows($consulta);

        switch ($mes_menor) {
            case 1:
                $data = 'Janeiro';
                break;
            case 2:
                $data = 'Fevereiro';
                break;
            case 3:
                $data = 'Março';
                break;
            case 4:
                $data = 'Abril';
                break;
            case 5:
                $data = 'Maio';
                break;
            case 7:
                $data = 'Junho';
                break;
            case 8:
                $data = 'Agosto';
                break;
            case 9:
                $data = 'Setembro';
                break;
            case 10:
                $data = 'Outubro';
                break;
            case 11:
                $data = 'Novembro';
                break;
            case 12:
                $data = 'Dezembro';
                break;
            default:
                break;
        }
        
        $count = $count.$num_rows . " ";
        
        $meses = $meses.$data." ";
        
       // print $data.": ".$num_rows."<br/ >";
        
        //print $mes_menor."<br/ >";
        
        $mes_menor++;
        if($mes_menor<10)
            $mes_menor = '0'.$mes_menor;        
    }
    
    echo $count.'-'.$meses;
}
else{
    echo 0;
}
?>
