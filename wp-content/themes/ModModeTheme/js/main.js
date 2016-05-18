//console.log( "ready!" );
jQuery(document).ready(function() {

	jQuery('.row.featurette:empty').remove();
	
	jQuery(window).bind("resize",function(){
	    console.log(jQuery(this).width());
	    if(jQuery(this).width() >992){
	    	jQuery('.navbar-collapse.collapse.in').removeClass('in');
	    	jQuery('.dropdown.open').removeClass('open');

	    }
	    else{
	    	//jQuery('div').removeClass('red').addClass('yellow');
	    }
	});


	var carouselContainer = jQuery('.carousel');
	var slideInterval = 4500; //8000

	function toggleCaption() {
	    jQuery('.carousel-caption').hide();
	    var caption = carouselContainer.find('.active').find('.carousel-caption');
	    caption.delay(500).slideDown();
	}

	carouselContainer.carousel({
	    interval: slideInterval,
	    cycle: true,
	    pause: "hover"
	}).on('slid.bs.carousel', function() {
	    toggleCaption();
	});
	
	carouselContainer.carousel({
	    interval: slideInterval,
	    cycle: true,
	    pause: "hover"
	}).on('slid slide', toggleCaption).trigger('slid');
	
	/* ==============================================
	 Modernizer Older browser support - SVG to PNG image swap
	 =============================================== */
	
	if (!Modernizr.svg) {
		jQuery('img[src*="svg"]').attr('src', function() {
			return jQuery(this).attr('src').replace('.svg', '.png');
		});
	}

});
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
jQuery(function() {
	
	function goToDivScroll(id){
		// Scroll
		jQuery('html,body').animate({scrollTop: $("#mrktg-content, #blog").offset().top-175}, 'slow');
	}
	
	jQuery(".carousel-caption a[href=\"#mrktg-content\"]", ".carousel-caption a[href=\"#blog\"]").click(function(e) { 
	  	// Prevent a page reload when a link is pressed
		e.preventDefault(); 
	  	// Call the scroll function
		goToDivScroll();           
	});

});

/**************************************************************************************/		   
/**** BEGIN _ Tab Function Dealer Tools Page - jQuery Bootstrap tabs use this function ***********/
/**************************************************************************************/
jQuery('#dealerToolsTab a:first').tab('show'); // Select first tab