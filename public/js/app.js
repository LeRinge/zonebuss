function fillGridCategories(){
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
}