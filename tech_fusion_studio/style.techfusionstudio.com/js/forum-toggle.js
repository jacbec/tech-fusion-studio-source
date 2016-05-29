jQuery(function( $ ) {
  $('.forum-toggle').on('click', function() {
    $('.forums-addon').toggle();
    $(this).toggleClass('fa-angle-right fa-angle-left');
    $('table').parent('div').toggleClass('col-lg-10 col-lg-12');
  });
});

/*
$('.forums-addon').toggleClass('open', 600).delay(800).promise().done( function(){
  $('.forums-addon').toggle();
});
$(this).toggleClass('fa-angle-right fa-angle-left');
$('table').parent('div').delay(800).toggleClass('col-lg-10 col-lg-12', 600);



$('.forums-addon').toggle(600);
$(this).toggleClass('fa-angle-right fa-angle-left');
$('table').parent('div').toggleClass('col-lg-10 col-lg-12', 600);




$('table').parent('col-lg-10').delay(800).toggleClass('open');

if($('.forums-addon').is(':visible') == true) {
  $('.forums-addon').toggleClass('open').delay(600).promise().done( function() { $('.forums-addon').toggle(); });
  $(this).toggleClass('fa-angle-right fa-angle-left');
  $('table').parent('div').delay(600).toggleClass('col-lg-10 col-lg-12', 600);
} else {
  $('.forums-addon').toggle().promise().done( function() {  $('.forums-addon').toggleClass('open'); });
  $(this).toggleClass('fa-angle-right fa-angle-left');
  $('table').parent('div').toggleClass('col-lg-10 col-lg-12');
}
*/
