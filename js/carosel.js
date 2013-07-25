/*--------------------------------------------------------------------
 * JAVASCRIPT usado para controle de carosel * 
 * 
 -------------------------------------------------------------------*/



//Diz qual é o item atual do carosel
$index =1;
//Diz quantos itens esse carosel tem
$maxIndex =4;
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
    
    $('#control_carosel-4').click(function(){
        rodar=0;
        $obj='.slide'+$index;
        
        if($index != 4){
            $($obj).transition({                            
                opacity : 0,
                zIndex : 1
            },'500'); 
         
            $('.slide4').transition({                            
                opacity : 1,
                zIndex : 4
            }); 
            
            $('.control-active').removeClass('control-active');
            $(this).addClass('control-active');
        
            $index =4
        }
    });
    
}

//função que faz o carosel girar sozinho.
function motorCaroselAuto(){
    
    
    setInterval(function() {
        if(rodar==1){
            $index++;
            if($index > $maxIndex)
                $index = 1;
                    
            if($index==2){
                $('.slide1').transition({                            
                    opacity : 0,
                    zIndex : 1
                },'500'); 
                        
                $('.slide2').transition({                            
                    opacity : 1,
                    zIndex : 4
                }); 
                $('.control-active').removeClass('control-active');
                $('#control_carosel-2').addClass('control-active');
            }  
                    
            if($index==3){
                $('.slide2').transition({                            
                    opacity : 0,
                    zIndex : 2
                },'500'); 
                        
                $('.slide3').transition({                            
                    opacity : 1 ,
                    zIndex : 4
                }); 
                $('.control-active').removeClass('control-active');
                $('#control_carosel-3').addClass('control-active');
            }  
                    
            if($index==4){
                $('.slide3').transition({                            
                    opacity : 0,
                    zIndex : 3
                },'500'); 
                        
                $('.slide4').transition({                            
                    opacity : 1,
                    zIndex : 4
                }); 
                $('.control-active').removeClass('control-active');
                $('#control_carosel-4').addClass('control-active');
            }  
                    
            if($index==1){
                $('.slide4').transition({                            
                    opacity : 0,
                    zIndex : 1
                },'500'); 
                        
                $('.slide1').transition({                            
                    opacity : 1,
                    zIndex : 4
                }); 
                $('.control-active').removeClass('control-active');
                $('#control_carosel-1').addClass('control-active');
            } 
        }
        
    }, 5000);
    
            
}

//faz o carosel girar a partir de click nos botões de PRÓXIMOS ou ANTERIOR
function motorCarosel(){    
                
    $('#backBtnCarosel').click(function(){ 
        rodar = 0;
        $index--;        
        if($index == 0)
            $index = $maxIndex;                    
                    
                    
        if($index==4){
            $('.slide1').transition({                            
                opacity : 0,
                zIndex : 1
            },'500'); 
                        
            $('.slide4').transition({                            
                opacity : 1,
                zIndex : 4
            }); 
            $('.control-active').removeClass('control-active');
            $('#control_carosel-4').addClass('control-active');
        }
                    
        if($index==3){
            $('.slide4').transition({                            
                opacity : 0,
                zIndex : 3
            },'500'); 
                        
            $('.slide3').transition({                            
                opacity : 1,
                zIndex : 4
            }); 
            $('.control-active').removeClass('control-active');
            $('#control_carosel-3').addClass('control-active');
        }
                    
        if($index==2){
            $('.slide3').transition({                            
                opacity : 0,
                zIndex : 2
            },'500'); 
                        
            $('.slide2').transition({                            
                opacity : 1,
                zIndex : 4
            }); 
            $('.control-active').removeClass('control-active');
            $('#control_carosel-2').addClass('control-active');
        }
                    
        if($index==1){
            $('.slide2').transition({                            
                opacity : 0,
                zIndex : 1
            },'500'); 
                        
            $('.slide1').transition({                            
                opacity : 1,
                zIndex : 4
            }); 
            $('.control-active').removeClass('control-active');
            $('#control_carosel-1').addClass('control-active');
        }   
    });
                
    $("#nextBtnCarosel").click(function(){
        rodar = 0;
        $index++;
        if($index > $maxIndex)
            $index = 1;
                    
        if($index==2){
            $('.slide1').transition({                            
                opacity : 0,
                zIndex : 1
            },'500'); 
                        
            $('.slide2').transition({                            
                opacity : 1,
                zIndex : 4
            }); 
            $('.control-active').removeClass('control-active');
            $('#control_carosel-2').addClass('control-active');
        }  
                    
        if($index==3){
            $('.slide2').transition({                            
                opacity : 0,
                zIndex : 2
            },'500'); 
                        
            $('.slide3').transition({                            
                opacity : 1 ,
                zIndex : 4
            }); 
            $('.control-active').removeClass('control-active');
            $('#control_carosel-3').addClass('control-active');
        }  
                    
        if($index==4){
            $('.slide3').transition({                            
                opacity : 0,
                zIndex : 3
            },'500'); 
                        
            $('.slide4').transition({                            
                opacity : 1,
                zIndex : 4
            }); 
            $('.control-active').removeClass('control-active');
            $('#control_carosel-4').addClass('control-active');
        }  
                    
        if($index==1){
            $('.slide4').transition({                            
                opacity : 0,
                zIndex : 1
            },'500'); 
                        
            $('.slide1').transition({                            
                opacity : 1,
                zIndex : 4
            }); 
            $('.control-active').removeClass('control-active');
            $('#control_carosel-1').addClass('control-active');
        } 
    });
}




$('document').ready(function(){
    motorCarosel();    
    controleNavCarosel();
    motorCaroselAuto();
});