    <div class="searchTab">
      <div id="wrap">
        <form action="/search">
          <input class="search" id="searchId" name="search" type="text" placeholder="What're we looking for ?" required>
          <input id="search_submit" value="Rechercher" type="submit" >
        </form>
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
    if (searchValue=='') {
      searchEl.removeClass('searchFocus');
    }
  });
})();

  </script>