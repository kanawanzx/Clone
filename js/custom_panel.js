var j$ = jQuery;

j$.noConflict();

j$(document).ready(function(){

	j$('#as-toggle-section').on('click',function(){
		if(j$('#as-style-selection').hasClass('as-open')){
			j$('#as-style-selection').removeClass('as-open');
			j$('#as-style-selection').addClass('as-closed');
			
		}else{
			j$('#as-style-selection').removeClass('as-closed');
			j$('#as-style-selection').addClass('as-open');
			
		}	
	})

});
