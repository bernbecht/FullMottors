<?php

//Arquivo usado na função JS 'getProdutosBoutiqueMenuAjax()'

require_once '../../classes/CProduto.php';

$produto = new CProduto;

$categoria = $_POST['categoria'];
$marca = $_POST['marca'];
$offset = $_POST['offset'];
$limite = 8;

if ($marca == 'Todos' || $marca == 'Todas') {
    $resultado_total = $produto->consultaProdutoMarcaCategoria('', $categoria, 10000000000, 0);
    $resultado = $produto->consultaProdutoMarcaCategoria('', $categoria, $limite, $offset);
    $marca = '';
} else {
    $resultado = $produto->consultaProdutoMarcaCategoria($marca, $categoria, $limite, $offset);
    $resultado_total = $produto->consultaProdutoMarcaCategoria($marca, $categoria, 10000000000, 0);
}

$fetch = pg_fetch_object($resultado);

$num_rows = pg_num_rows($resultado_total);

if ($num_rows > 0) {
    echo '<div class="titulo_categoria_boutique">
            <h1>' . ucfirst($categoria) . 's ' . ucfirst($marca) . '</h1>
          </div>';
    echo '<div class="janela_produtos">';
    do {
        $preco = number_format($fetch->preco, 2, ',', '');
        $par = number_format($fetch->parcelas, 2, '.', '');
        $prazo = $fetch->prazo / $par;
        $prazo = number_format($prazo, 2, ',', '');

        echo '<a href="descricao_produto.php?produto=' . $fetch->id_produto . '">
                                            <div class="produto">
                                                <div class="produto_img">
                                                    <img src="../img/boutique/' . $fetch->nome_img . '" />
                                                </div>
                                                <div class="produto_nome">
                                                ' . $fetch->nome . '
                                                </div>
                                                <div class="produto_preco">
                                                R$ ' . $preco . '
                                                </div>
                                                <div class="produto_preco">
                                                ou ' . $fetch->parcelas . "x R$ " . $prazo . '
                                                </div>

                                            </div>  
                                        </a>';
        ;
    } while ($fetch = pg_fetch_object($resultado));

    echo '<div class="clear"></div>';

    echo '</div>';


//calcula quantas pagina irá dar esse resultado e cria a paginação.
    // o controle é da paginação é feita por JS
    $j = 1;
    $i = $num_rows / 8;
    echo'<div class="pagination">
                <ul>
                    <li ><a href="javascript:;" class="anterior_btn">Anterior</a></li>';
    while ($j <= $i + 1) {
        if ($j == 1)
            echo ' <li><a class="btn_paginacao" id="' . $j . '" href="javascript:;" >' . $j . '</a></li>';
        else
            echo ' <li><a class="btn_paginacao" id="' . $j . '" href="javascript:;" >' . $j . '</a></li>';
        $j++;
    }
    echo' <li><a class="proximo_btn" href="javascript:;">Proximo</a></li>
                </ul>
            </div>';
} else {
    echo 2;
}
?>
