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



<div class="md-modal md-effect-9 form md-show" id="modal-9">
		<div class="md-content">
				<div class="panel-heading">
						<div class="row closeModal"></div>
						<ul class="tab-group">
								<li class="tab active"><a href="#login">Log In</a></li>
								<li class="tab"><a href="#signup">Sign Up</a></li>
						</ul>
				</div>
				<div class="panel-body">
						<div class="tab-content">
								
								<div id="login"> 
												<h1 id="logInLabel">Welcome Back!</h1> 
												<form id="sub" method="POST" action="/login" > 
														@if(isset($id)) 
														<input type="hidden" name="id" value="{{$id}}">
														<input type="hidden" name="id2" value="{{$id2}}">

														@endif
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


		<script src="{{url('/')}}/js/loginform.js"></script>





</body>
</html>