

function mostraGraficoVisualizacoes(visitas, meses){
    
    //alert(serie[0]);
                
    $('#chart').remove();
        
    $('<div id="chart" style="width:0; height:0;"></div>')
    .appendTo('#chart_container');
        
    var s1 = visitas;
    // Can specify a custom tick Array.
    // Ticks should match up one for each y value (category) in the series.
    var ticks = meses;
     
     
    var plot1 = $.jqplot('chart', [s1], {
        // The "seriesDefaults" option is an options object that will
        // be applied to all series in the chart.
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {
                fillToZero: true
            },
            pointLabels: {
                show: true
            }
        },
        // Custom labels for the series are specified with the "label"
        // option on the series option.  Here a series option object
        // is specified for each series.
        series:[
        {
            label:'Hotel'
        },

        {
            label:'Event Regristration'
        },

        {
            label:'Airfare'
        }
        ],
        // Show the legend and put it outside the grid, but inside the
        // plot container, shrinking the grid to accomodate the legend.
        // A value of "outside" would not shrink the grid and allow
        // the legend to overflow the container.
        axesDefaults: {
            tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
            tickOptions: {
                angle: -30,
                fontSize: '10pt'
            }
        },            
        axes: {
            // Use a category axis on the x axis and use our custom ticks.
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: ticks
            },
            // Pad the y axis just a little so bars can get close to, but
            // not touch, the grid boundaries.  1.2 is the default padding.
            yaxis: {
                pad: 1.05,
                tickOptions: {
                    formatString: '%d'
                }
            }
        }
    });
        
    var conteudo= $('#chart');
        
    conteudo.css("width","500px","heigth","500px");
                    
    $(conteudo).appendTo('#grafico');
        
        
    
}

function getDadosdeVisualziacaoAjax(){
    $('.visualizacoes_btn').click(function(){
        
        
        
        var url = '../operacoes/Sistema/conta_visitas.php'; 
        var id = $(this).attr('id');
        
        var split = id.split('-');
        id= split[0];
        var tipo = split[1];
       
        //alert(id);
        
        $.post(url,{
            id:id,
            tipo:tipo
        },function(data){
            
            $('.erro').remove();
            
            //alert(data);
            
            if(data==0){
                $('<div class="erro">Não houveram visualizações desse produto</div>').
                    appendTo('#grafico');
            }
            var split = data.split('-');
            var visitas = split[0];
            var meses = split[1];
            visitas = visitas.split(' ');
            meses = meses.split(' ');
            
            var i =0;
            
            visitas.splice((visitas.length-1), 1);
          
            meses.splice((meses.length-1), 1);
            
            for(i=0; i<visitas.length;i++){
                visitas[i]= parseInt(visitas[i]);              
            }
            
            
           
            mostraGraficoVisualizacoes(visitas, meses);
        });
 
    });//click
    
}

$(document).ready(function(){
   
  
    });
