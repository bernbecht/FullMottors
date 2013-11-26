<?php

require_once 'classes/CConexao.php';

$conexao1= new CConexao;

$conexao = $conexao1->novaConexao();

$conexao1->verificaConexao();
?>
