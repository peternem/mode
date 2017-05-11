//console.log( "ready!" );
/**************************************************************
 * Removes inline html height and width attributes and values.  
 * Hack to make images responsive compatible. 
 *******************************************/
jQuery('img').each(function(){
   jQuery(this).removeAttr('width');
   jQuery(this).removeAttr('height');
});

/**************************************************************************************/		   
/**** BEGIN _ goToDivScroll animation - jQuery UI tabs use this function***********/
/**************************************************************************************/
$(function() {
	
	function goToDivScroll(id){
		// Scroll
		$('html,body').animate({scrollTop: $("#mrktg-content").offset().top -110}, 'slow');
	}
	
	$(".carousel-caption > p > a.btn").click(function(e) { 
	  	// Prevent a page reload when a link is pressed
		e.preventDefault(); 
	  	// Call the scroll function
		goToDivScroll();           
	});

});

/**************************************************************************************/		   
/**** BEGIN _ Tab Function Dealer Tools Page - jQuery Bootstrap tabs use this function ***********/
/**************************************************************************************/
$('#dealerToolsTab a:first').tab('show'); // Select first tab