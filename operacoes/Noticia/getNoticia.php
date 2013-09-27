<?php

$noticia = new CNoticia;

$consulta = $noticia->getNoticiasRecentes();

$num_rows = pg_num_rows($consulta);

if($num_rows>0){
    
    print '<div>';
    
    while($fetch = pg_fetch_object($consulta)){
        print $fetch->manchete;
        print $fetch->data;
        print $fetch->post;
    }
    
     print '</div>';
}


?>
