<!DOCTYPE html>
<html>
	@include('head')
	<link rel="stylesheet" type="text/css" href="css/contactForm.css">
<body>
	@include('header')
	@include('loginForm')






	<header class="contactForm">LEARN MORE</header>
	<form id="form" class="topBefore contactForm">
		<input class="contact" id="name" type="text" placeholder="NAME">
		<input class="contact" id="email" type="text" placeholder="E-MAIL">
		<textarea class="contact" id="message" type="text" placeholder="MESSAGE"></textarea>
		<input class="contact" id="submit" type="submit" value="GO!">
	</form>












	@include('footer')
    @include('scripts')
	
</body>
</html>