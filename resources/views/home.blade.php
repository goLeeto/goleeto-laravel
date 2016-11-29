@extends('layouts.homelayout')


@section('container')

<div class="container-fluid bodyContainer">
@include('search')
      

    <div id="slideshow">
      <div class="text-center trendingDiv">
        Trending
      </div>
      @foreach($slider1 as $img)
        <img src="{{$img->path}}" class="slide" height="380px" style="width: auto; margin-left: auto; margin-right: auto;">
      @endforeach
    </div>





    <div id="mi-slider-container">
      <div class="sliderText text-center trendingDiv">
        Best From Categories!
      </div> 
    <div id="mi-slider" class="mi-slider">
      @foreach($photos as $photo)
        <ul>
            @foreach($photo as $p)
            <li>
              @foreach($p as $a)
                <a href="/products/{{$a->productId}}"><img src="{{$a->path}}" height="250px"></a>
              @endforeach
            </li>
            @endforeach
        </ul>
      @endforeach
      <nav class="sliderNav">
        @foreach($categories as $category)
        <a href="#"> {{$category->name}}</a>
        @endforeach
      </nav>
    </div>
    </div>






</div>

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
@endsection
