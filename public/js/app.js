var map;
var locatization;
var marker;
var category;
var myApp;
var mapCompetencia;
var markers;

 $(document).ready(function(){
             initializeFuelux();
             initializeButtons();  
            
           
             $('#myWizard').on('actionclicked.fu.wizard', function (evt, data) {
  					if(data.step===1 && data.direction==='next') {
                        initializeMapBox();
                    }
    		  });
             $('#myWizard').on('finished.fu.wizard', function (evt, data) {
                    //Send data to laravel
                    SendInfoSetup();
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

function showInfoPlace(json){

        $('#direccion').text(json['direccion']);
                      

}

function showInfoBBVA(){


}
function showInfoMap(json){

                        initializeMapCompetencia();
                        mapC.setView(new L.LatLng(json[0].lat,json[0].ln), 15);
                        setTimeout(function(){ mapC.invalidateSize()}, 1500);
                        $.each(json,function(index){
                                if(index==0){
                                    drawMarker(json[index].name,json[index].lat,json[index].ln,'mapC','CC22FF');
                                }
                                else{
                                    drawMarker(json[index].name,json[index].lat,json[index].ln,'mapC','ff1111');
                                }
                        });
                        

}
function drawMarker(name,lat,ln,map,color){

                        marker = L.marker([lat, ln], {
                                            icon: L.mapbox.marker.icon(
                                                {'marker-color': color}

                                                )
                        });                  
                        marker.bindPopup(name);
                        marker.addTo(mapC);
}
function SendInfoSetup(){
        var category = $('.icon.active').attr('id');
        var lat_lng=locatization.lat+','+locatization.lng; 
        var data={
                category:category,
                lat:locatization.lat,
                lng:locatization.lng,
                lat_lng:  lat_lng       
        }
        $.get( "api/BBVA/TestRedisLocal", function( data ) {});

        //Trow 3 API Routes
        $.ajaxq("QueueAPIS",{
                url: 'api/Google/geocode',
                dataType:'json',
                
                type:'post',
                data:data,
                success:function(json){
                    showInfoPlace(json);
                }
            });
        $.ajaxq("QueueAPIS",{
                url: 'api/Factual/places',
                dataType:'json',
                
                type:'post',
                data:data,
                success:function(json){
                   showInfoMap(json);
                }
            });
        $.ajaxq("QueueAPIS",{
                url: 'api/BBVA/find',
                dataType:'json',               
                type:'post',
                data:data,
                success:function(json){
                   
                     $('#myModal').modal('hide');
                     $('.intro').hide(); 
                     $('#charts').show();
                     showInfoBBVA();
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
function initializeMapCompetencia(){

                        L.mapbox.accessToken = 'pk.eyJ1IjoibHUxenp6IiwiYSI6Imp0RnFuRm8ifQ.7oDrxlos9T1R3_RqKHyshQ';
                        mapC = L.mapbox.map('mapC','examples.map-i86nkdio');
                        mapC.featureLayer.on('click', function(e) {
                             mapC.panTo(e.layer.getLatLng());
                        });   
                        

}
function initializeMapBox(){
                        L.mapbox.accessToken = 'pk.eyJ1IjoibHUxenp6IiwiYSI6Imp0RnFuRm8ifQ.7oDrxlos9T1R3_RqKHyshQ';
                        map = L.mapbox.map('map','examples.map-i86nkdio').setView([19.41, -99.14], 15);
                        map.zoom=15;                      
                        marker = L.marker([19.41, -99.14], {
                                            icon: L.mapbox.marker.icon({'marker-color': 'ff8888'}),
                                            draggable: true
                        });
                        marker.on('dragend', ondragend);
                        marker.addTo(map);
                        ondragend();
                        setTimeout(function(){ map.invalidateSize()}, 400);
}
function ondragend() {
   locatization = marker.getLatLng();
}
