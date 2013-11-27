<?php

/* Código que faz a interface do AJAX com os métodos para busca no BD.
  Retorna o fragmento da página com a lista de motos semi-novas que está no BD */

require_once APP_CLASSES . 'CSemi.php';

$semi = new CSemi;

$consulta = $semi->getSemiNovas();

$num_rows = pg_num_rows($consulta);

if ($num_rows > 0) {



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
                    </td>
                </tr>';
    }
    echo '</tbody>
        </table>';
} else {
    print '<h4>Não há motos cadastradas :/<//h4>';
}
?>
