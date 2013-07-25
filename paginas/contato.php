<?php
require_once '../template/head.php';
?>

<div class="contato_content">
    <div class="wrapper">
        <h1>
            Entre em contato com a gente
        </h1>

        <div class="contato-conteudo">
            <div class="contato-form">
                <div class="erro_form">
                    
                </div>
                <form id="contato_form">
                    <div class="contato-form-input">
                        <legend>Seu nome</legend>
                        <input id="nome-input" class="input-xlarge" type="text" name="nome" />
                    </div>
                    <div class="contato-form-input">
                        <legend>Seu e-mail</legend>
                        <input id="email-input" class="input-xlarge" type="text" name="email" />
                    </div>
                    <div class="contato-form-input">
                        <legend>Assunto</legend>
                        <input id="assunto-input" class="input-xlarge" type="text" name="assunto" />
                    </div>
                    <div class="contato-form-input">
                        <legend>Mensagem</legend>
                        <textarea id="mensagem-input" class="input-xlarge" name="mensagem"></textarea>
                    </div>

                    <div id="enviar_email_btn" type="button" class="btn_contato">Enviar</div>
                    <div class="resultado_contato"></div>
                </form>            
            </div>

            <div class="contato-localizacao">
                <div class="contato-localizacao-dados">                    
                    <p style="text-align: center;margin-bottom: 0;"><img src="../img/logo.png" /></p>
                    <div class="box-footer-content">
                        <p>Av. Ernesto Vilela, 1902</p>
                        <p>Ponta Grossa, PR</p>
                        <p>(42) 3227-1223</p>
                         <p>contato@fmottors.com.br</p>
                    </div>


                </div>
                <div class="contato-localizacao-mapa">
                    <a href="https://maps.google.com/maps?q=ponta+grossa+av++ernesto+vilela+1902&hl=en&ie=UTF8&sll=37.0625,-95.677068&sspn=43.799322,107.138672&hnear=Av.+Ernesto+Vilela,+1902+-+Nova+R%C3%BAssia,+Ponta+Grossa+-+Paran%C3%A1,+84070-000,+Brazil&t=m&z=16" target="_blank">
                        <img src="../img/mapa.png" />
                        <div class="legenda">
                            <div class="legenda-content">
                                Veja no Google Maps
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="../js/contato.js"></script>

<?php
require_once '../template/footer.php';
?>