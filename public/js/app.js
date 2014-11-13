
 $(document).ready(function(){
             initializeFuelux();
             //fillGridCategories();
                
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
        $.ajax({
                url: 'api/BBVA/Categories',
                dataType:'json',
                type: 'get',
                success:function(dataSource){
                     $('#myRepeater').repeater({dataSource: dataSource});
                }
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
                        var map = L.mapbox.map('map','lu1zzz.k799bh4g').setView([19.41, -99.14], 9);
                        map.zoom=12;
                        setTimeout(function(){ map.invalidateSize()}, 400);
                        console.log("Map");
}
