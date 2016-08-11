@extends('layouts.app')

@section('title', 'Contact')
@section('meta_description', '')

@section('content')

    <section id="contact">
		<h2>I want you to be a part of my story<br>and i also want to be a part of yours</h2>
			
			<div class="col-md-6">
				<img src="/images/agnieszka-contact.jpg" alt="Photo of Agnieszka">
			</div>

			<div class="col-md-6">
				<h3>Agnieszka Krol Photography</h3>
				<a href="mailto:agnieszkakrolphotography@gmail.com">agnieszkakrolphotography@gmail.com</a>
				<a href="tel:0041786032798">+41 78 603 2798</a>
				<p>Gislifluestrasse 50, 5033 Buchs<br>Switzerland</p>
				<div class="social-icons">
					<span>Facebook</span>
					<span>Instagramm</span>
					<span>Twitter?</span>
					<span>Google?</span>
				</div>
			</div>

			<div class="col-xs-12 text-cetner">Thank You for passing by!<br>Your sincerely, <a href="{{ url('/') }}"> Agnieszka Krol</a>
			</div>

</section>

@endsection
