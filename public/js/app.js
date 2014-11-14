var map;
var locatization;
var marker;
var category;

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
function SendInfoSetup(){
        var category = $('.icon.active').attr('id');
        var lat_lng=locatization.lat+','+locatization.lng; 
        var data={
                category:category,
                lat:locatization.lat,
                lng:locatization.lng,
                lat_lng: lat_lng       
        }
        alert(data);
        $.ajax({
                url: 'api/BBVA/find',
                dataType:'json',
                
                type:'post',
                data:data
            });
}
function initializeButtons(){

    $(".icon").on('click',function(){
            $('.icon.active').removeClass().addClass("icon btn btn-default btn-lg");
            $(this).removeClass().addClass('icon icon btn btn-primary btn-lg active');
    });

}
function fillGridCategories(){
		datasource=
				$.ajax({
                url: 'api/BBVA/Categories',
                dataType:'json',
                type: 'get',
                success:function(dataSource){
                     $('#myRepeater').repeater({dataSource: dataSource});
                }
            });
}
function initializeFuelux(){
	   $('#myWizard').wizard();
	   console.log("initializeFuelux");
}

function initializeMapBox(){
                        L.mapbox.accessToken = 'pk.eyJ1IjoibHUxenp6IiwiYSI6Imp0RnFuRm8ifQ.7oDrxlos9T1R3_RqKHyshQ';
                        map = L.mapbox.map('map','lu1zzz.k799bh4g').setView([19.41, -99.14], 9);
                        map.zoom=12;
                       
                        marker = L.marker([19.41, -99.14], {
                                            icon: L.mapbox.marker.icon({'marker-color': 'ff8888'}),
                                            draggable: true
                        });
                        marker.on('dragend', ondragend);
                        marker.addTo(map);
                        // Set the initial marker coordinate on load.
                        ondragend();
                        setTimeout(function(){ map.invalidateSize()}, 400);

                        console.log("Map");
}

function ondragend() {
   locatization = marker.getLatLng();
}
