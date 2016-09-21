    <div class="searchTab">
      <div id="wrap">
          <input class="search" id="searchId" name="search" type="text" placeholder="What're we looking for ?">
          <input id="search_submit" value="Rechercher" type="submit" >
      </div>
    </div>
    <!-- Modal -->
  <div class="modal fullscreen-modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="modalClose close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">Search Results</h4>
        </div>
        <div class="modal-body">
          <div class="loader"></div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  	
  (function(){
  $('.search').click(function() {
    $(this).addClass('searchFocus');
  });
  $('#search_submit').click(function() {
    var search = document.getElementById('searchId');
    var searchValue = search.value;
    var searchEl = $('.search');
    if (searchValue!=='') {
      search.value='';
      //// Open a dialog with loading
      //// Body overflow hidden
      $('#searchModal').addClass('in');
      $('#searchModal').css('display', 'block');
      $('body').css('overflow', 'hidden');
      $.post('functions.php', {type: 'search',key:searchValue}, function(e) {
          
          console.log(e);

      });









      
      searchEl.removeClass('searchFocus');
    }
    else{
      searchEl.removeClass('searchFocus');
    }
    
  });
})();

  </script>