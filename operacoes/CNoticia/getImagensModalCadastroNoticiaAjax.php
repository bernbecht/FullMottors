<?php
    
require_once '../../classes/CImagem.php';

$img = new CImagem;

$consulta = $img->consultaImgGenerico('', 1, 2);

$num_rows = pg_num_rows($consulta);

if($num_rows>0)
    echo 1;
else
    echo 0;

?>
