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
var data;
var dataCompare;



 $(document).ready(function(){
             initializeFuelux();
             initializeButtons();
             
Chart.defaults.global.responsive = true;

           
             $('#myWizard').on('actionclicked.fu.wizard', function (evt, data) {
  					if(data.step===1 && data.direction==='next') {
                        initializeMapBox();
                    }
    		  });
             $('#myWizard').on('finished.fu.wizard', function (evt, data) {
                    //Send data to laravel                   
                    SendInfoSetup('place');
                    SendInfoSetup('placeCompare');
                    ShowCharts();
                    $('#myWizard').wizard("destroy");
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
        
        console.log(chart);
        
        if(chart=='salesChart'){
           dataGet=data;
        
        }
        else{
            dataGet=dataCompare;
        }
        dataGet.date=object['label'];
        var isCharSale=chart=="salesChart"?true:false;
        $.ajaxq("QueueChart",{
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
        if(chart=='salesChartweek'){
            for(i=0;i<7;i++){
             salesChartweek.datasets[0].points[i].value = json[i]['num_payments'];
       }
       
        salesChartweek.update();
    }
    else{
         for(i=0;i<7;i++){
             salesChartweekCompare.datasets[0].points[i].value = json[i]['num_payments'];
       }
       
        salesChartweekCompare.update();
    }

}
function ShowCharts(){
  Chart.defaults.global.responsive =true;

    var data = {
              labels: ["Nov", "Dic", "Ene", "Feb", "Mar", "Abr"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data:[11, 12, 01, 02, 03, 04]
                    },
                ]
            };
            var dataWeek = {
              labels: ["Nov", "Dic", "Ene", "Feb", "Mar", "Abr",'sun'],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(15,220,179,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data:[60, 70, 80, 55, 56, 89,88]
                    },
                ]
            };
              
            var dataRadar = {
    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 90, 81, 56, 55, 40]
        }
    ]
};

  
          
           
            var ctxweek = $("#weekChart").get(0).getContext("2d");
            var ctxweek2 = $("#weekChartCompare").get(0).getContext("2d");
            var ctxradar = $("#radarChart").get(0).getContext("2d");
            var ctxradar2 = $("#radarChartCompare").get(0).getContext("2d");
            
           
           
             salesChartweek = new Chart(ctxweek).Line(dataWeek, {
                bezierCurve: false,

            });
            salesChartweekCompare = new Chart(ctxweek2).Line(dataWeek, {
                bezierCurve: false,

            });
            RadarChart =new Chart(ctxradar).Radar(dataRadar,{

            });
            RadarChartCompare =new Chart(ctxradar2).Radar(dataRadar,{
                
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
    var data = {
              labels: ["Nov", "Dic", "Ene", "Feb", "Mar", "Abr"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(155,89,22,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data:num_payments
                    },
                ]
            };

            var max=Math.max(num_payments);
            var div=max>1000?1000:100;
          if(chart=='salesChart'){  
            var ctx = $("#salesChart").get(0).getContext("2d");
             chartSales = new Chart(ctx).Line(data, {
                bezierCurve: true,
                scaleGridLineWidth : 0,
                pointDotRadius : 7,
                scaleOverride : true,
                scaleSteps : (max*1.25)/div,
                scaleStepWidth : 1000,
                scaleStartValue : 0

        });
         }
        else{
             var ctx2 = $("#salesChartCompare").get(0).getContext("2d");
              chartSalesCompare = new Chart(ctx2).Line(data, {
                bezierCurve: true,
                scaleGridLineWidth : 0,
                pointDotRadius : 7,
                scaleOverride : true,
                  scaleSteps : (max*1.25)/div,
                  scaleStepWidth : 1000,
                  scaleStartValue : 0

            });
        }
         var canvas=document.getElementById('salesChart');
            canvas.onclick=function(evt){
                var activePoints = chartSales.getPointsAtEvent(evt);
                 updateSalesChart('salesChart',activePoints[0]);
                 

            };
            var canvasCompare=document.getElementById('salesChartCompare');
            canvasCompare.onclick=function(evt){
                var activePoints = chartSalesCompare.getPointsAtEvent(evt);
                 updateSalesChart('salesChartweek',activePoints[0]);
                

            };

}
function showInfoMap(json,map){
                        if(map=='mapC'){
                            initializeMapCompetencia('mapC');
                            mapC.setView(new L.LatLng(json[0].latitude,json[0].longitude), 15);
                            setTimeout(function(){ mapC.invalidateSize()}, 1500);
                            $.each(json,function(index){
                                    if(index==0){
                                        drawMarker(json[index].name,json[index].latitude,json[index].longitude,'mapC','CC22FF');
                                    }
                                    else{
                                        drawMarker(json[index].name,json[index].latitude,json[index].longitude,'mapC','ff1111');
                                    }
                            });
                        }
                        else{
                            initializeMapCompetencia('mapCompare');
                            mapCompare.setView(new L.LatLng(json[0].latitude,json[0].longitude), 15);
                            setTimeout(function(){ mapCompare.invalidateSize()}, 1500);
                            $.each(json,function(index){
                                    if(index==0){
                                        drawMarker(json[index].name,json[index].latitude,json[index].longitude,'mapCompare','CC22FF');
                                    }
                                    else{
                                        drawMarker(json[index].name,json[index].latitude,json[index].longitude,'mapCompare','ff1111');
                                    }
                            });

                        }
                        

}
function drawMarker(name,lat,ln,map,color){
                        if(map=='mapC'){
                            marker = L.marker([lat, ln], {
                                                icon: L.mapbox.marker.icon(
                                                    {'marker-color': color}

                                                    )
                            });                  
                            marker.bindPopup(name);
                            marker.addTo(mapC);
                        }
                        else{
                                marker = L.marker([lat, ln], {
                                                icon: L.mapbox.marker.icon(
                                                    {'marker-color': color}

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
        if(place=='placeCompare'){
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
        $.get( "api/BBVA/TestRedisLocal", function( data ) {});
        
      
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
                    }
                    else{
                     $('#myModal').modal('hide');
                     $('.intro').hide(); 
                     $('#charts').show();
                       showInfoBBVA(json,'salesChartCompare');
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
function fillGridCategories(){
		datasource=
				$.ajax({
                url: 'api/BBVA/Categories',
                dataType:'json',
                type: 'get',
                success:function(dataSource){
                     
                }
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
                        map = L.mapbox.map('map','examples.map-i86nkdio').setView([19.41, -99.14], 15);
                        map.zoom=15;                      
                        marker = L.marker([19.41, -99.14], {
                                            icon: L.mapbox.marker.icon({'marker-color': 'ff8888'}),
                                            draggable: true
                        });
                        markerCompare=L.marker([19.41, -99.15], {
                                            icon: L.mapbox.marker.icon({'marker-color': '8811CC','marker-symbol': 'bus',}),
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
