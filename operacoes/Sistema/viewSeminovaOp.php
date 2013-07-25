<?php

$path = 'http://localhost:8012/FullMottors/';

/* Código que faz a interface do AJAX com os métodos para busca no BD.
  Retorna o fragmento da página com a lista de motos semi-novas que está no BD */

require_once '../../classes/CSemi.php';

$semi = new CSemi;

$consulta = $semi->getSemiNovas();

$num_rows = pg_num_rows($consulta);

if ($num_rows > 0) {

    echo '<div class="titulo_categoria_boutique">
            <h1>Motos em Estoque</h1>
          </div>';


    echo '<table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Miniatura</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Ano</th>
                    <th>Preço</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';
    while ($fetch = pg_fetch_object($consulta)) {
        
        $preco = number_format($fetch->preco, 2, ',', '');
        
        echo '<tr>
                    <td><img src="../img/seminovas/' . $fetch->nome_img . '" /></td>
                    <td>' . mb_strtoupper($fetch->modelo) . '</td>
                    <td>' . mb_strtoupper($fetch->marca) . '</td>
                    <td>' . $fetch->ano . '</td>
                    <td>R$ ' . $preco . '</td>
                    <td>
                        <a href="editar_seminova.php?id=' . $fetch->id_seminovas . '" class="btn btn-warning">Editar</a>
                        <button id="'.$fetch->id_seminovas.'-3" class="btn btn-info visualizacoes_btn" data-toggle="modal" href="#modal_visualizacoes">Visualizações</button>
                    </td>
                </tr>';
    }
    echo '</tbody>
        </table>';
} else {
    //sinal de erro mandado para o JS
    echo 1;
}
?>
