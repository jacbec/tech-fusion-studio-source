jQuery(function( $ ) {
	$('.second-level').hide();
	$('.third-level').hide();
	$('.second-level-button').click(function() {
		$(this).next('.second-level').slideToggle('slow');
		$(this).find('i.float-right').toggleClass('fa-angle-left fa-angle-down');
	});

	$('.third-level-button').click(function() {
		$(this).next('.third-level').slideToggle('slow');
		$(this).find('i.float-right').toggleClass('fa-angle-left fa-angle-down');
	});
});
