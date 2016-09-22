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
                <input name="email" id="emailS" type="text"required autocomplete="off"/>
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