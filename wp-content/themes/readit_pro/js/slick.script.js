jQuery( function( $ ){
	$(document).ready(function() {
		$('.hero-slider').slick({
			  dots: false,
			  infinite: true,
			  speed: 500,
			  slidesToShow: 1,
			  centerMode: true,
			  variableWidth: true
		});
	});	  
});
