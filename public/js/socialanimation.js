/*  social animation  */


(function(){
  $('.social a i').mouseenter(function() {
    $(this).animate({
      'font-size': '80px'},
      500);
  });
  $('.social a i').mouseleave(function() {
    $(this).animate({
      'font-size': '50px'},
      700);
  });
})();
