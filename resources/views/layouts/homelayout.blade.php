<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Templates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('/')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/css/font-awesome.min.css">
    <script src="{{url('/')}}/js/jquery-2.2.0.min.js"></script>
  	<script src="{{url('/')}}/js/bootstrap.min.js"></script>
  	<script src="{{url('/')}}/js/modernizr.js"></script>
	
</head>
<body>
<div class="row" id="menu-div">
    <div id="templateMenu" class="navbar navbar-default " role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
              <button  type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuItems" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" href="#"> <img src="{{url('/')}}/css/images/leeto.png" height="70px"></a>
            </div>
            <div id="menuItems" class="collapse navbar-collapse navbar-menubuilder">
                <ul class="nav navbar-nav navbar-right">
                    <li @if ($className == 'home') class='active' @endif>
                      <a href="/">Home</a>
                    </li>
                    <li @if ($className == 'products') class='active' @endif>
                      <a href="/products">Products</a>
                    </li>
                    <li @if ($className == 'about') class='active' @endif>
                      <a href="/about">About Us</a>
                    </li>
                    @if(!Auth::check())
                    <li >
                      <a href="#" id="login1" class="menu-red md-trigger" data-modal="modal-9">Sign In</a>
                    </li>
                    @else
                      @if(Auth::user()->UserType==1)
                      <li>
                        <a href="/admin/dashboard">Dashboard</a>
                      </li>
                      @elseif(Auth::user()->UserType==2)
                      <li>
                        <a href="/seller/dashboard">Dashboard</a>
                      </li>
                      @elseif(Auth::user()->UserType==3)
                      <li>
                        <a href="/buyer/dashboard">Dashboard</a>
                      </li>
                      @endif
                    <li >
                      <a href="/logout">Log Out</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="md-modal md-effect-9 form " id="modal-9">
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
                
                <div id="login"> 
  				        <h1 id="logInLabel">Welcome Back!</h1> 
      				    <form id="sub" method="POST" action="/login"> 
      				        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      				        <div class="field-wrap">
      				            <label>
      				              UserName<span class="req">*</span>
      				            </label>
      				            <input name="username" id="usernameInput" type="text" required autocomplete="off"/>
      				         </div>
      				  
      				        <div class="field-wrap">
      				            <label>
      				              Password<span class="req">*</span>
      				            </label>
      				            <input name="password" id="passwordInput" type="password" required autocomplete="off"/>
      				        </div>
      				  
      				        <p class="forgot"><a href="/password/reset">Forgot Password?</a></p>
      				    </form>
      				    <button  id="loginButton" form="sub" class="button button-block"/>Log In</button>
    				    </div> <!--login-->
                
                <div id="signup">   
      				    <h1>Sign Up for Free</h1>
      				    <label id="signUpLabel"></label>
      				      <form id="reg" method="POST" action="/register">
      				        {{ csrf_field() }}

      				          <div class="top-row">
      				            <div class="field-wrap">
      				              <label>
      				                First Name<span class="req">*</span>
      				              </label>
      				              <input name="firstname" id="firstnameS" type="text" required autocomplete="off" />
      				            </div>
      				        
      				            <div class="field-wrap">
      				              <label>
      				                Last Name<span class="req">*</span>
      				              </label>
      				              <input name="lastname" id="lastnameS" type="text"required autocomplete="off"/>
      				            </div>
      				          </div>
      				          <div class="top-row">
      				            <div class="field-wrap">
      				            <label  id="passlbl">
      				                UserName<span class="req">*</span>
      				            </label>
      				            <input name="username" id="usernameS" type="text"required autocomplete="off" />
      				            </div>
      				            <div class="field-wrap">
      				            <label>
      				                Password<span class="req">*</span>
      				            </label>
      				            <input name="password" id="passwordS" type="password"required autocomplete="off"/>
      				            </div>
      				          </div>
      				          <div class="top-row">
      				                <div class="field-wrap">
      				                <label>
      				                    E-Mail<span class="req">*</span>
      				                </label>
      				                <input name="email" id="emailS" type="email"required autocomplete="off"/>
      				            </div>
      				            <div class="field-wrap">
      				                <label>
      				                    Birth Date<span class="req">*</span>
      				                </label>
      				                <input name="birthdate" id="birthdateS" type="text"required autocomplete="off" onfocus="(this.type='date')" onfocusout="(this.type='text')" />
      				            </div>
      				          </div>
      				          <div class="col-md-12 radioSignUp">
      				                <p>Account Type</p>
      				                <span class="radio-inline">
      				                  <input type="radio" name="accType" value="2">Seller
      				                </span>
      				                <span class="radio-inline">
      				                  <input type="radio" name="accType" value="3">Buyer
      				                </span>
      				          </div>
      				      </form>
      				      <button id="signUpButton" form="reg" class="button button-block">Get Started</button>
      				</div> <!--sign up-->
            </div>
        </div>
    </div>
</div>
<div class="md-overlay"></div>

@yield('container')


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
    <a href="/about">About Us</a>
    <span>|</span>
    <a href="/cookies">Cookie Policie</a>
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
      <a href="{{url('/')}}/">goLeeto</a>
    </div>
  </div>
</footer>


	<script src="{{url('/')}}/js/loginform.js"></script>
	<script src="{{url('/')}}/js/socialanimation.js"></script>








</body>
</html>