var map;
var locatization;
var locatizationCompare;
var marker;
var markerCompare;
var category;
var myApp;
var mapCompetencia;
var markers;
var chartSales;
var chartSalesCompare;
var salesChartweek;
var salesChartweekCompare;
var RadarChart;
var RadarChartCompare;
var doughnutgenderChart;
var doughnutgenderChartCompare;
var data;
var dataCompare;
var dataGet;

$(document).ready(function(){
             initializeFuelux();
             initializeButtons();
             Chart.defaults.global.responsive = true;
              Chart.defaults.global.scaleFontColor="#fff";




           
             $('#myWizard').on('actionclicked.fu.wizard', function (evt, data) {
  					if(data.step===1 && data.direction==='next') {
                        initializeMapBox();
                    }
    		  });
             $('#myWizard').on('finished.fu.wizard', function (evt, data) {
                    //Send data to laravel                   
                    SendInfoSetup('place');
                    SendInfoSetup('placeCompare');
                    
                    $('#myWizard').wizard("destroy");
                     
                     $('.intro').hide(); 
                     $('#charts').show();
                     $('#myModal').modal('hide');
                  
              });

         })

myApp = myApp || (function () {
    var pleaseWaitDiv = $('#pleaseWaitDialog');
    return {
        showPleaseWait: function() {
            pleaseWaitDiv.modal();
        },
        hidePleaseWait: function () {
            pleaseWaitDiv.modal('hide');
        },

    };
})();
function updateSalesChart(chart,object){
        
     
        
        if(chart=='salesChart'){
           dataGet=data;
        
        }
        else{
            dataGet=dataCompare;
        }
        dataGet.date=object['label'];
        var isCharSale=chart=="salesChart"?true:false;
        $.ajaxq('QueueCharts',{
                url: 'api/BBVA/consumptionPattern',
                dataType:'json',
                
                type:'post',
                data:dataGet,
                success:function(json){
                    if(isCharSale){
                       updateChartWeek(json,'salesChartweek');
                    }
                    else{
                        updateChartWeek(json,'salesChartweekCompare');
                   }
                }
            });
}
function updateChartWeek(json,chart){
    var i;
        
    var num_payments=[];
    json.forEach(function(entry){
                    
                    if(entry['num_payments']===undefined){
                        num_payments.push(0);
                       
                    }
                    else{
                         num_payments.push(entry['num_payments']);
                    }
            });


        if(chart=='salesChartweek'){
            for(i=0;i<7;i++){
             salesChartweek.datasets[0].points[i].value = num_payments[i];
       }
         num_payments.forEach(function(entry){
                    
                  
            });
        salesChartweek.update();
        $('#diaWeek').text(json[0]['month']);
        $('#diaWeek').css("color", "red");
       
    }
    else{
         for(i=0;i<7;i++){
             salesChartweekCompare.datasets[0].points[i].value = num_payments[i];
       }
        salesChartweekCompare.update();
        $('#diaWeekCompare').text(json[0]['month']);
        $('#diaWeekCompare').css("color", "red");
         
    }

}
function updateInfoGender(json,chart){
    if(chart=='genderChart'){
        $('#RangoH').text(json['M']['Range']);
        $('#AvgH').text(json['M']['Avg']);
        $('#RangoF').text(json['F']['Range']);
        $('#AvgF').text(json['F']['Avg']);
        $('#mesGender').text(json['M']['month']);
        $('#mesGender').css("color", "red");
    }
    else{
        $('#RangoHCompare').text(json['M']['Range']);
        $('#AvgHCompare').text(json['M']['Avg']);
        $('#RangoFCompare').text(json['F']['Range']);
        $('#AvgFCompare').text(json['F']['Avg']);
        $('#mesGenderCompare').text(json['M']['month']);
        $('#mesGenderCompare').css("color", "red");
    }


}
function updateChartGender(json,chart){

     
         if(chart=='genderChart'){
              
                    
                    doughnutgenderChart.segments[0].value = json['M']['percentage'];
                    doughnutgenderChart.segments[1].value = json['F']['percentage'];
                    doughnutgenderChart.update();
                    var html=doughnutgenderChart.generateLegend();
                    $('#doughnutgenderChart_legend').innerHTML =  html;
                }
        else{
            
                    doughnutgenderChartCompare.segments[0].value = json['M']['percentage'];
                    doughnutgenderChartCompare.segments[1].value = json['F']['percentage'];
                    doughnutgenderChartCompare.update();
                    var html=doughnutgenderChartCompare.generateLegend();
                    $('#doughnutgenderChartCompare_legend').innerHTML = html;  
                   
        }
}
function updateSalesChartGender(chart,object){

  
        if(chart=='genderChart'){
           dataGet=data;
        
        }
        else{
            dataGet=dataCompare;
        }
        dataGet.date=object['label'];
        $.ajaxq('QueueCharts',{
                url: 'api/BBVA/cardCube',
                dataType:'json',
                
                type:'post',
                data:dataGet,
                success:function(json){
                    if(chart=='genderChart'){
                       updateInfoGender(json,'genderChart');
                       updateChartGender(json,'genderChart');
                    }
                    else{
                        updateInfoGender(json,'genderChartCompare');
                        updateChartGender(json,'genderChartCompare');
                   }
                }
            });


}
function ShowChartsGender(chart){
    
        var isWeekChart=chart=='weekChart'?true:false;
        
        var dataGender=[
                    {
                    value:5,
                    color:"#16A6ED",
                    label: "Hombres"
                },
                {
                    value:5,
                    color: "#E80085",
                    label: "Mujeres"
                }
            ]
                   
        
       
        if(chart=='genderChart'){
            
            dataGet=data;
             var ctxGender = $("#genderChart").get(0).getContext("2d");
              doughnutgenderChart = new Chart(ctxGender).Doughnut(dataGender,{
                    animationEasing : "easeOutBounce",
                    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
              });
        
        }
        else{
          
            dataGet=dataCompare;
            var ctxGenderCompare = $("#genderChartCompare").get(0).getContext("2d");
            doughnutgenderChartCompare = new Chart(ctxGenderCompare).Doughnut(dataGender, {
               //String - Animation easing effect
                    animationEasing : "easeOutBounce",
                    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
            });
        }
        dataGet.date='Nov';
        $.ajaxq("QueueCharts",{
                url: 'api/BBVA/cardCube',
                dataType:'json',
                
                type:'post',
                data:dataGet,
                success:function(json){
                    
                    if(chart=='genderChart'){
                         updateInfoGender(json,'genderChart');
                       updateChartGender(json,'genderChart');
                    }
                    else{
                         updateInfoGender(json,'genderChartCompare');
                        updateChartGender(json,'genderChartCompare');
                   }
                }
            });
}

//First load to weekCharts, after will update dinamically
function ShowChartsWeek(chart){
    
        var isWeekChart=chart=='weekChart'?true:false;
         var dataWeek={
              labels: ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab","Dom"],
                datasets: [
                    {
                       label: "weekChart",
                        fillColor :"rgba(132,222,197,0.5)",
                        strokeColor: "#84DEC5",
                        pointColor: "#84DEC5",
                        pointStrokeColor: "#84DEC5",
                    
                        pointHighlightFill: "#000",
                        pointHighlightStroke: "#000",
                        data:[0,0,0,0,0,0,0]
                    },
                ]
            };
       
        
       
        if(chart=='weekChart'){
            
            dataGet=data;
            dataGet.weekChart=true;
             var ctxweek = $("#weekChart").get(0).getContext("2d");
              salesChartweek = new Chart(ctxweek).Line(dataWeek, {
                 bezierCurve: true,
                        scaleGridLineWidth : 5,
                        pointDotRadius : 7,
                        datasetFill : false

            });
        
        }
        else{
          
            dataGet=dataCompare;
            dataGet.weekChart=false;
               var ctxweek2 = $("#weekChartCompare").get(0).getContext("2d");
            
           
            salesChartweekCompare = new Chart(ctxweek2).Line(dataWeek, {
                bezierCurve: true,
                        scaleGridLineWidth : 5,
                        pointDotRadius : 7,
                        datasetFill : false

            });
        }
        dataGet.date='Nov';
        
        $.ajaxq("QueueCharts",{
                url: 'api/BBVA/consumptionPattern',
                dataType:'json',
                
                type:'post',
                data:dataGet,
                success:function(json){
                    
                    if(dataGet.weekChart){

                       updateChartWeek(json,'salesChartweek');
                    }
                    else{
                        updateChartWeek(json,'salesChartweekCompare');
                   }
                }
            });
}

function showChartWeek(){
}
function showInfoPlace(json,map){
    if(map=='mapC'){
        $('#direccion').text(json['direccion']);
    }
    else{
        $('#direccionCompare').text(json['direccion']);
    }  
}

function showInfoBBVA(json,chart){
   
    var num_payments=[];
     
    json.forEach(function(entry){
                    
                    if(entry['num_payments']===undefined){
                        num_payments.push(0);
                       
                    }
                    else{
                         num_payments.push(entry['num_payments']);
                    }
            });
            var dataSales = {
              labels: ["Nov", "Dic", "Ene", "Feb", "Mar", "Abr"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor :"rgba(132,222,197,0.5)",
                        strokeColor: "#84DEC5",
                        pointColor: "#84DEC5",
                        pointStrokeColor: "#84DEC5",
                    
                        pointHighlightFill: "#000",
                        pointHighlightStroke: "#000",
                        data:num_payments
                    },
                ]
            };

            var max=Math.max.apply(Math, num_payments);
            var div=max>1000?1000:100;
            var scaleSteps=(max*1.25)/div;
          if(chart=='salesChart'){  
                    var ctx = $("#salesChart").get(0).getContext("2d");
                     chartSales = new Chart(ctx).Line(dataSales, {
                        bezierCurve: true,
                        scaleGridLineWidth : 5,
                        pointDotRadius : 7,
                        scaleOverride : true,
                        scaleSteps :scaleSteps,
                        scaleStepWidth : div,
                        scaleStartValue : 0,
                        datasetFill : false

                });
                    var canvas=document.getElementById('salesChart');
            canvas.onclick=function(evt){
                var activePoints = chartSales.getPointsAtEvent(evt);
                 updateSalesChartGender('genderChart',activePoints[0]);
                 updateSalesChart('salesChart',activePoints[0]);
                 

            };

         }
        else{
                 var ctx2 = $("#salesChartCompare").get(0).getContext("2d");
                  chartSalesCompare = new Chart(ctx2).Line(dataSales, {
                        bezierCurve: true,
                        scaleGridLineWidth : 5,
                        pointDotRadius : 7,
                        scaleOverride : true,
                        scaleSteps :scaleSteps,
                        scaleStepWidth : div,
                        scaleStartValue : 0,
                        datasetFill : false

                });
                 var canvasCompare=document.getElementById('salesChartCompare');
            canvasCompare.onclick=function(evt){
                var activePoints = chartSalesCompare.getPointsAtEvent(evt);
                 updateSalesChartGender('genderChartCompare',activePoints[0]);
                 updateSalesChart('salesChartweek',activePoints[0]);
                

            };
                  
        }
}
function showInfoMap(json,map){
                        if(map=='mapC'){
                            initializeMapCompetencia('mapC');
                            mapC.setView(new L.LatLng(json[0].latitude,json[0].longitude), 15);
                            setTimeout(function(){ mapC.invalidateSize()}, 1500);
                            $.each(json,function(index){
                                    if(index==0){
                                        drawMarker(json[index].name,json[index].latitude,json[index].longitude,'mapC','84DEC5');
                                        $('#competidores').text(json[index]['competitors']+' competidores' );
                                          $('#competidores').css("color", "red");

                                    }
                                    else{
                                        drawMarker(json[index].name,json[index].latitude,json[index].longitude,'mapC','FF0000');
                                       
                                    }
                            });
                        }
                        else{
                            initializeMapCompetencia('mapCompare');
                            mapCompare.setView(new L.LatLng(json[0].latitude,json[0].longitude), 15);
                            setTimeout(function(){ mapCompare.invalidateSize()}, 1500);
                            $.each(json,function(index){
                                    if(index==0){
                                        drawMarker(json[index].name,json[index].latitude,json[index].longitude,'mapCompare','84DEC5');
                                         $('#competidoresCompare').text(json[index]['competitors']+' competidores' );
                                          $('#competidoresCompare').css("color", "red");

                                    }
                                    else{
                                        drawMarker(json[index].name,json[index].latitude,json[index].longitude,'mapCompare','FF0000');
                                    }
                            });

                        }
}
function drawMarker(name,lat,ln,map,color,size){
                        if(map=='mapC'){
                            marker = L.marker([lat, ln], {
                                                icon: L.mapbox.marker.icon(
                                                    {'marker-color': color
                                                     
                                                    }

                                                    )
                            });                  
                            marker.bindPopup(name);
                            marker.addTo(mapC);
                        }
                        else{
                                marker = L.marker([lat, ln], {
                                                icon: L.mapbox.marker.icon(
                                                    {'marker-color': color  
                                                    }

                                                    )
                            });                  
                            marker.bindPopup(name);
                            marker.addTo(mapCompare);
                        }
}
function SendInfoSetup(place){
        var category = $('.icon.active').attr('id');
        var lat_lng;
        var dataFinal;
        var isMapC=place=='place'?true:false;
        if(place=='place'){
            lat_lng=locatization.lat+','+locatization.lng; 
             data={
                    category:category,
                    lat:locatization.lat,
                    lng:locatization.lng,
                    lat_lng:  lat_lng       
            }
            dataFinal=data;
        }
        else{
            lat_lng=locatizationCompare.lat+','+locatizationCompare.lng; 
             dataCompare={
                    category:category,
                    lat:locatizationCompare.lat,
                    lng:locatizationCompare.lng,
                    lat_lng:  lat_lng       
            }
            dataFinal=dataCompare;
        }
      
        //Trow 3 API Routes
        $.ajaxq("QueueAPIS",{
                url: 'api/Google/geocode',
                dataType:'json',
                
                type:'post',
                data:dataFinal,
                success:function(json){
                    if(isMapC){
                       showInfoPlace(json,'mapC');
                    }
                    else{
                        showInfoPlace(json,'mapCompare');
                   }
                }
            });
        $.ajaxq("QueueAPIS",{
                url: 'api/Factual/places',
                dataType:'json',
                
                type:'post',
                data:dataFinal,
                success:function(json){
                    if(isMapC){
                        showInfoMap(json,'mapC');
                    }
                    else{
                        showInfoMap(json,'mapCompare');
                    }
                }
            });
        $.ajaxq("QueueAPIS",{
                url: 'api/BBVA/paymentDistribution',
                dataType:'json',               
                type:'post',
                data:dataFinal,
                success:function(json){
                    if(isMapC){
                            showInfoBBVA(json,'salesChart');
                            ShowChartsWeek('weekChart');
                            ShowChartsGender('genderChart');
                        }
                  
                    else{
                      showInfoBBVA(json,'salesChartCompare');
                      ShowChartsWeek('weekChartCompare');
                       ShowChartsGender('genderChartCompare');
                    

                       
                    }
                   
                    
             }   
            });
     $('#myModal').modal('show');     
}
function initializeButtons(){

    $(".icon.btn").on('click',function(){
            $('.icon.active').removeClass().addClass('icon btn btn-default btn-lg');
            $(this).removeClass();
            $(this).addClass('icon btn btn-primary btn-lg');
    });
}
function initializeFuelux(){
	   $('#myWizard').wizard();
}
function initializeMapCompetencia(map){
                    if(map=='mapC'){
                        L.mapbox.accessToken = 'pk.eyJ1IjoibHUxenp6IiwiYSI6Imp0RnFuRm8ifQ.7oDrxlos9T1R3_RqKHyshQ';
                        mapC = L.mapbox.map('mapC','examples.map-i86nkdio');  
                    }
                    else{
                         L.mapbox.accessToken = 'pk.eyJ1IjoibHUxenp6IiwiYSI6Imp0RnFuRm8ifQ.7oDrxlos9T1R3_RqKHyshQ';
                        mapCompare = L.mapbox.map('mapCompare','examples.map-i86nkdio');
                    }
}
function initializeMapBox(){
                        L.mapbox.accessToken = 'pk.eyJ1IjoibHUxenp6IiwiYSI6Imp0RnFuRm8ifQ.7oDrxlos9T1R3_RqKHyshQ';
                        map = L.mapbox.map('map','examples.map-i86nkdio').setView([19.412367888315664, -99.16139602661131], 14);
                        map.zoom=15;                      
                        marker = L.marker([19.426367888315664, -99.16139602661131], {
                                            icon: L.mapbox.marker.icon({'marker-color': '84DEC5'}),
                                            draggable: true
                        });
                        markerCompare=L.marker([19.408882974361152, -99.17139602661131], {
                                            icon: L.mapbox.marker.icon({'marker-color': '84DEC5'}),
                                            draggable: true
                        });

                        marker.on('dragend', ondragend);
                        marker.addTo(map);
                        markerCompare.on('dragend', ondragend);
                        markerCompare.addTo(map);
                        ondragend();
                        setTimeout(function(){ map.invalidateSize()}, 400);
}
function ondragend() {
   locatization = marker.getLatLng();
   locatizationCompare=markerCompare.getLatLng();
}
