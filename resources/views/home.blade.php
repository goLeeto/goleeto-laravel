
<!DOCTYPE html>
<html lang="en">
    @include('head')
<body>
    @include('header')

<div class="md-modal md-effect-9 form" id="modal-9">
    <div class="md-content">
        <div class="panel-heading">
            <div class="row closeModal"><span class="md-close"><i class="fa fa-times" aria-hidden="true"></i></span></div>
            <ul class="tab-group">
                <li class="tab active"><a href="#login">Log In</a></li>
                <li class="tab"><a href="#signup">Sign Up</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                
                @include('login')
                
                @include('signup')
            </div>
        </div>
    </div>
</div>
<div class="md-overlay"></div>

<div class="container-fluid bodyContainer">
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
      

    <div id="slideshow">
      <div class="text-center trendingDiv">
        Trending
      </div>
      <img class="slide" src="http://www.bouldercitynevadadentist.com/images/entries/700x300/southern-alps-700x300.png" />
      <img class="slide" src="http://www.mezzolabs.co.uk/wp-content/uploads/2013/10/traffic-700x300.jpg" />
      <img class="slide" src="http://www.bouldercitynevadadentist.com/images/entries/700x300/sailing-700x300.png" />
    </div>









    <div id="mi-slider-container">
      <div class="sliderText text-center trendingDiv">
        Best From Categories!
      </div> 
    <div id="mi-slider" class="mi-slider">
      <ul>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Boots</h4></a></li>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Oxfords</h4></a></li>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Loafers</h4></a></li>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Sneakers</h4></a></li>
      </ul>
      <ul>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Belts</h4></a></li>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Hats &amp; Caps</h4></a></li>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Sunglasses</h4></a></li>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Scarves</h4></a></li>
      </ul>
      <ul>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Casual</h4></a></li>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Luxury</h4></a></li>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Sport</h4></a></li>
      </ul>
      <ul>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Carry-Ons</h4></a></li>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Duffel Bags</h4></a></li>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Laptop Bags</h4></a></li>
        <li><a href="#"><img src="css/images/1.png" alt="img30"/><h4>Briefcases</h4></a></li>
      </ul>
      <nav class="sliderNav">
        <a href="#">Premium</a>
        <a href="#">Free</a>
        <a href="#">CSS3</a>
        <a href="#">HTML5</a>
      </nav>
    </div>
    </div>






</div>
<footer class="templateFooter">
  <div class="footerExpresion text-center">
    Once you go 1337 you never go back!
  </div>
  <div class="social text-center">
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-instagram"></i></a>
    <a href="#"><i class="fa fa-pinterest"></i></a>
    <a href="#"><i class="fa fa-github"></i></a>
  </div>
  <div class="footerMenu text-center">

    <a href="#">More Info</a>
    <span>|</span>
    <a href="#">About Us</a>
    <span>|</span>
    <a href="#">Cookie Policie</a>
  </div>
  <div class="footerExtra">
    <div class="copyright pull-right">
      ©
      <script type="text/javascript">
        now = new Date;
        theYear = now.getYear();
        if (theYear < 1900)
            theYear = theYear + 1900;
        document.write(theYear);
      </script>
      <a href="../">goLeeto</a>
    </div>
  </div>
</footer>






















    <script src="js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/loginform.js"></script>
    <script src="js/index.js"></script>
    <script src="js/login.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script >
      $("ul.nav.navbar-nav.navbar-right li").click(function() {
        $(".navbar-nav li").each(function() {
             this.className = "";
         });
        this.className = "active";
      });
      
      $(function() {

        $( '#mi-slider' ).catslider();

      });
    </script>


</body>
</html>
