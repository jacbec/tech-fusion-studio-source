jQuery(function( $ ) {
  $('.sidebar-toggle').on('click', function() {
    $('.sidebar').toggleClass('open');
    $('.body-slide').toggleClass('open');
  });
});
