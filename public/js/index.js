

(function(){
  $('.modalClose').click(function() {
    $('#searchModal').removeClass('in');
    $('#searchModal').css('display', 'none');
    $('body').css('overflow-y', 'scroll');

  });
})();

