@extends('layouts.homelayout')

@section('container')
	<link rel="stylesheet" type="text/css" href="css/contactForm.css">
	<header class="contactForm">LEARN MORE</header>
	<form id="form" class="topBefore contactForm" method="POST" action="/contact">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input class="contact" id="name" type="text" placeholder="NAME" name="name" required>
		<input class="contact" id="email" type="email" placeholder="E-MAIL" name="email" required>
		<textarea class="contact" id="message" type="text" placeholder="MESSAGE" name="message" required></textarea>
		<input class="contact" id="submit" type="submit" value="GO!">
	</form>
@endsection