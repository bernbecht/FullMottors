/*--------------------------------------------------------------------
 * JAVASCRIPT usado para controle de carosel * 
 * 
 -------------------------------------------------------------------*/


//Diz qual é o item atual do carosel
$index =1;
//Diz quantos itens esse carosel tem
$maxIndex =3;
//diz se o carosel tem rodar sozinho ou não
rodar =1;



//controla os botões que vão para um item específico no carosel
function controleNavCarosel(){
    $('#control_carosel-1').click(function(){
        rodar=0;
        $obj='.slide'+$index;
        
        if($index != 1){
            $($obj).transition({                            
                opacity : 0,
                zIndex : 1
            },'500'); 
         
            $('.slide1').transition({                            
                opacity : 1,
                zIndex : 4
            }); 
        
            $index =1
            
            $('.control-active').removeClass('control-active');
            $(this).addClass('control-active');
        }
    });
    
    $('#control_carosel-2').click(function(){
        rodar=0;
        $obj='.slide'+$index;
        
        if($index != 2){
            $($obj).transition({                            
                opacity : 0,
                zIndex : 2
            },'500'); 
         
            $('.slide2').transition({                            
                opacity : 1,
                zIndex : 4
            }); 
            
            $('.control-active').removeClass('control-active');
            $(this).addClass('control-active');
        
            $index =2
        }
    });
    
    
    $('#control_carosel-3').click(function(){
        rodar=0;
        $obj='.slide'+$index;
        
        if($index != 3){
            $($obj).transition({                            
                opacity : 0,
                zIndex : 3
            },'500'); 
         
            $('.slide3').transition({                            
                opacity : 1,
                zIndex : 4
            }); 
            
            $('.control-active').removeClass('control-active');
            $(this).addClass('control-active');
        
            $index =3
        }
    });
}

//função que faz o carosel girar sozinho.
function motorCaroselAuto(){
    
    
    setInterval(function() {
        if(rodar==1){
            $index++;
            if($index > $maxIndex){
                $('.slide'+($index-1)).transition({
                    opacity : 0,
                    zIndex : 1
                },'500');

                $index = 1;
            }

                $('.slide'+($index-1)).transition({
                    opacity : 0,
                    zIndex : 1
                },'500'); 
                        
                $('.slide'+$index).transition({
                    opacity : 1,
                    zIndex : 4
                }); 
                $('.control-active').removeClass('control-active');
                $('#control_carosel-'+$index).addClass('control-active');
        }
        
    }, 4500);

            
}

//faz o carosel girar a partir de click nos botões de PRÓXIMOS ou ANTERIOR
function motorCarosel(){    
                
    $('#backBtnCarosel').click(function(){
        rodar = 0;
        $index--;

            if($index == 0){
                $('.slide1').transition({
                    opacity : 0,
                    zIndex : 1
                },'500');

                $index = $maxIndex;
            }

            $('.slide'+($index+1)).transition({
                opacity : 0,
                zIndex : 1
            },'500');

            $('.slide'+$index).transition({
                opacity : 1,
                zIndex : 4
            });
            $('.control-active').removeClass('control-active');
            $('#control_carosel-'+$index).addClass('control-active');

    });
                
    $("#nextBtnCarosel").click(function(){
        rodar = 0;
        $index++;
        if($index > $maxIndex){

            $('.slide'+($index-1)).transition({
                opacity : 0,
                zIndex : 1
            },'500');

            $index = 1;
        }

        $('.slide'+($index-1)).transition({
            opacity : 0,
            zIndex : 1
        },'500');

        $('.slide'+$index).transition({
            opacity : 1,
            zIndex : 4
        });
        $('.control-active').removeClass('control-active');
        $('#control_carosel-'+$index).addClass('control-active');
    });
}




$('document').ready(function(){
    motorCarosel();    
    controleNavCarosel();
    motorCaroselAuto();
});