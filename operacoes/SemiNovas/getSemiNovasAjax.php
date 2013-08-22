<?php 

 require_once "../../config.php";

 $path= "http://www.fmottors.com.br/new/";

/*Código que faz a interface do AJAX com os métodos para busca no BD.
 Retorna o fragmento da página com a lista de motos semi-novas que está no BD*/

 require_once '../../classes/CSemi.php';
 
 $semi = new CSemi;
 
 $consulta = $semi->getSemiNovas();
 
 $num_rows = pg_num_rows($consulta);


 if($num_rows>0){
     
     echo '<div id="motos_semi">
        <div class="wrapper"> 
            <div class="titulo_pagina"> 
                <h1> MOTOS SEMI-NOVAS</h1>
                <div id="btn_troca_para_0km" class="cantoneira">
                    <a href="javascript:;">
                        <div class="cantoneira_texto">
                            CONHEÇA AS<br /> MOTOS 0 Km
                        </div>
                    </a>
                </div>
            </div>';
     
     while($fetch = pg_fetch_object($consulta)){
         
         echo '<div class="motos_semi_lista">
                <div class="motos_semi_manchete">
                    <div class="motos_semi_manchete_img">
                        <img src="'.$path.'img/seminovas/'.$fetch->nome_img.'"/>
                    </div>

                    <div class="motos_semi_manchete_dados">
                        <h3>'. mb_strtoupper($fetch->marca).' '.mb_strtoupper($fetch->modelo).'</h3>
                        <p>
                            <span>Ano: </span>'.$fetch->ano.'<br />
                            <span>Cor: </span>'.ucfirst($fetch->cor).'<br />
                            <span>KM: </span>'.$fetch->km.'<br />                           
                        </p>
                        <div class="preco_semiNova">R$ '.$fetch->preco.'</div>                        
                        <div class="detalhes_btn_semiNova"><a href="'.$path.'paginas/motos_semi_desc.php?id='.$fetch->id_seminovas.'"><br />Detalhes +</a></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>';
     }
     
 }
 else{
     //sinal de erro mandado para o JS
     echo 1;
 }
?>
