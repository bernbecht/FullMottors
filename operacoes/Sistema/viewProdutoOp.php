<?php

//Arquivo usado para mostrar os produtos no sistema

require_once '../../classes/CProduto.php';
require_once '../../classes/CImagem.php';

$produto = new CProduto;
$img = new CImagem;

$categoria = $_POST['categoria'];
$marca = $_POST['marca'];
$offset = $_POST['offset'];
$limite = 8;

if ($marca == 'Todos' || $marca == 'Todas') {
    $resultado_total = $produto->consultaProdutoMarcaCategoriaSemFoto('', $categoria, 10000000000, 0);
    $resultado = $produto->consultaProdutoMarcaCategoriaSemFoto('', $categoria, $limite, $offset);
    $resultado_img = $img->getImgProdutoMarcaCategoria('', $categoria, $limite, $offset);
    $marca = '';
} else {
    $resultado = $produto->consultaProdutoMarcaCategoriaSemFoto($marca, $categoria, $limite, $offset);
    $resultado_img = $img->getImgProdutoMarcaCategoria($marca, $categoria, $limite, $offset);
    $resultado_total = $produto->consultaProdutoMarcaCategoriaSemFoto($marca, $categoria, 10000000000, 0);
}

$fetch = pg_fetch_object($resultado);
$fetch_img = pg_fetch_object($resultado_img);

$num_rows = pg_num_rows($resultado_total);

if ($num_rows > 0) {

    echo '<div class="titulo_categoria_boutique">
            <h1>' . ucfirst($categoria) . 's ' . ucfirst($marca) . '</h1>
          </div>';


    echo'<table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Foto Miniatura</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';
    
    

    do {       
        
        $nome_img='';
        
        //confere que a img pertence a esse produto
        if($fetch_img->id_produto==$fetch->id_produto){
            $nome_img= $fetch_img->nome_img;
            $fetch_img = pg_fetch_object($resultado_img);
        }
        
        echo '<tr>
                    <td><img src="../img/boutique/' . $nome_img . '" /></td>
                    <td> ' . $fetch->nome . '</td>
                    <td>' . $fetch->marca . '</td>
                    <td>' . $fetch->categoria . '</td>
                    <td>
                        <a href="editar_produto.php?id=' . $fetch->id_produto . '" class="btn btn-warning btn-small">Editar</a>
                        <button type="buttom" id="' . $fetch->id_produto . '-1" class="btn-small btn btn-info visualizacoes_btn" data-toggle="modal" href="#modal_visualizacoes">Visualizações</button>                        
                   </td>
                </tr>';
    } while ($fetch = pg_fetch_object($resultado));


    echo'</tbody>
         </table>';
} else {
    echo 2;
}
?>
