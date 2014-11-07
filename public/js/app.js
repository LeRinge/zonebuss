 $(document).ready(function(){
             initializeFuelux();
             //fillGridCategories();

             $('#myWizard').on('actionclicked.fu.wizard', function (evt, data) {
  					if(data.step===1 && data.direction==='next') {
         				
					}           
    		});
         })

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

function moveStepMap(){
		$('#myWizard').wizard('next');
}
window.onload=function() {

	var map = L.map('map').setView([19.419444, -99.145556], 13);
						// add an OpenStreetMap tile layer
						L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
				    				attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
						}).addTo(map);
}
