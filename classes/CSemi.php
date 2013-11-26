<?php

require_once 'CConexao.php';

class CSemi { 

    protected $marca,
            $modelo,
            $ano,
            $cilindradas,
            $transmissao,
            $partida,
            $refrigeracao,
            $freio,
            $esa,
            $ascs,
            $rdc,
            $bc,
            $observacao,
            $bolsas,
            $motor,
            $potencia,
            $cor,
            $km,
            $estilo,
            $preco;

    public function incluirSemi($conexao, $marca, $modelo, $ano, $cilindradas, $transmissao, $partida, $refrigeracao, $esa, $ascs, $rdc, $bc, $observacao, $bolsas, $motor, $potencia, $cor, $km, $estilo, $preco) {

        //$conexao1 = new CConexao();
        //$conexao = $conexao1->novaConexao();

        $incluir = pg_query($conexao, "INSERT INTO SEMINOVAS(marca,modelo,ano,cilindradas,transmissao,partida,refrigeracao,esa,
            ascs,rdc,bc,observacao,bolsas,motor,potencia,cor,km,estilo,preco) 
             VALUES('$marca',
                '$modelo',
                $ano,
                $cilindradas,
                '$transmissao',
                '$partida',
                '$refrigeracao',
                $esa,
                $ascs,
                $rdc,
                $bc,
                '$observacao',
                $bolsas,
                '$motor',
                $potencia,
                '$cor',
                $km,
                '$estilo',
                $preco) RETURNING id_seminovas");


        //$conexao1->closeConexao();

        $resultado = pg_fetch_object($incluir);

        return $resultado->id_seminovas;
    }
    
    public function editarSemi($id, $marca, $modelo, $ano, $cilindradas, 
            $transmissao, $partida, $refrigeracao, $esa, 
            $ascs, $rdc, $bc, $observacao, $bolsas, $motor, $potencia, $cor, 
            $km, $estilo, $preco) {

        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $incluir = pg_query($conexao, "UPDATE seminovas
            SET marca ='$marca',
                modelo='$modelo',
                ano = '$ano',
                cilindradas = $cilindradas,
                transmissao = '$transmissao',
                partida = '$partida',
                refrigeracao = '$refrigeracao',
                esa = $esa,
                ascs = $ascs,
                rdc = $rdc,
                bc = $bc,
                observacao = '$observacao',
                bolsas = $bolsas,
                motor = '$motor',
                potencia = $potencia,
                cor = '$cor',
                km = $km,
                estilo = '$estilo',
                preco = $preco
             WHERE id_seminovas = $id");
                
            $conexao1->closeConexao();
            
            return $incluir;
    }
    
    
    

    public function getSemiNovas() {

        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $consulta = pg_query($conexao, "select * from seminovas inner join img on id_seminovas = img.id_produto and img.funcao_img = 1 ");

        $conexao1->closeConexao();
        
        return $consulta;
    }
    
    public function getSemiNovasById($id) {

        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $consulta = pg_query($conexao, "select * 
                from seminovas 
                inner join img 
                on id_seminovas = img.id_produto 
                and img.funcao_img = 1 and
                id_seminovas = $id");

        $conexao1->closeConexao();
        
        return $consulta;
    }

    public function excluirSeminovaByID($id){
        $conexao1 = new CConexao();
        $conexao = $conexao1->novaConexao();

        $consulta = pg_query($conexao, "DELETE FROM seminovas
        WHERE id_seminovas = {$id}");

        $conexao1->closeConexao();

        return $consulta;
    }
}

?>
