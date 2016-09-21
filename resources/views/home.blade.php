
<!DOCTYPE html>
<html lang="en">
    @include('head')
<body>
    @include('header')

    @include('loginForm')

<div class="container-fluid bodyContainer">
@include('search')
      

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






















    
    @include('scripts')
    <script src="js/index.js"></script>
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
