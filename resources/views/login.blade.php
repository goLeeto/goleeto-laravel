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
  
        <p class="forgot"><a href="#">Forgot Password?</a></p>
    </form>
    <button  id="loginButton" form="sub" class="button button-block"/>Log In</button>
</div> <!--login-->