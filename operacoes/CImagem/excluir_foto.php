<?php
    require_once '../../classes/CImagem.php';
    
    $nome = $_POST['nome'];
    $pasta = $_POST['pasta'];
    
    $imagem = new CImagem;
    
    $resultado = $imagem->excluirFotoNome($nome);
    
    
    if($resultado!= ''){
        unlink('../../img/'.$pasta.'/'.$nome);
        echo  1;
    }
    else{
        echo  0;
    }
    
    
?>
