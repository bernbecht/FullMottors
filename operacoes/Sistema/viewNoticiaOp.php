<?php

require_once '../../classes/CNoticia.php';

require_once '../../classes/CImagem.php';


$data = $_POST['data'];

$noticia = new CNoticia;

$img = new CImagem;

$consulta = $noticia->getNoticiaPorMesAno($data);

$consultaImg = $img->getImgNoticiaMesAno($data);

$num_rows = pg_num_rows($consulta);

$num_rows_img = pg_num_rows($consultaImg);

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

if ($num_rows > 0) {

    $split = mb_split('-', $data);
    switch ($split[1]) {
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



    echo '<div class="titulo_categoria_boutique">
            <h1>Notícias de ' . $data . ' ' . $split[0] . '</h1>
          </div>';


    echo '<table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Miniatura</th>
                    <th>Manchete</th>
                    <th>Data</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';
    while ($fetch = pg_fetch_object($consulta)) {
        
        $fetchImg = pg_fetch_object($consultaImg);

        $date = $fetch->data;
        $date = utf8_encode(strftime("%A, %d de %B de %Y", strtotime($date)));

        echo '<tr>
                    <td><img src="../img/noticias/' . $fetchImg->nome_img . '" /></td>
                    <td>' . $fetch->manchete . '</td>
                    <td>' . $date . '</td>
                    <td>
                        <a href="editar_noticia.php?id=' . $fetch->id_noticia . '" class="btn btn-warning btn-small">Editar</a>
                         <button id="'.$fetch->id_noticia.'-2" class="btn btn-info visualizacoes_btn" data-toggle="modal" href="#modal_visualizacoes">Visualizações</button>
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