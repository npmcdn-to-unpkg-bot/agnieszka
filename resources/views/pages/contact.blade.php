@extends('layouts.app')

@section('title', 'Contact')
@section('meta_description', 'Get in touch with Agnieszka Krol.')

@section('content')

    <section id="contact">
		<div class="container-fluid">

			<h2>{{ trans('contact.header') }}</h2>

			<div class="row contact-details">

				<div class="col-xs-12 col-lg-5 address">
					<h3>Agnieszka Krol <br>Photography</h3>

					<div class="clearfix">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
						<p>Gislifluestrasse 50, 5033 Buchs Switzerland</p>
					</div>
				</div>

				<div class="col-xs-12 col-lg-5 contact-links">
					<h3>Say hi!</h3>
					<a href="mailto:agnieszkakrolphotography@gmail.com">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						agnieszkakrolphotography@gmail.com
					</a><br>
					<a href="tel:0041786032798">
						<i class="fa fa-phone" aria-hidden="true"></i>
						+41 78 603 2798
					</a>
				</div>

				<div class="col-xs-12 col-lg-2 get-social">
					<h3>Get social!</h3>
		    	    <ul>
		    	    	<li>{!! file_get_contents("images/social-icons/facebook.svg") !!}</li>
		    	    	<li>{!! file_get_contents("images/social-icons/twitter.svg") !!}</li>
		    	    	<li>{!! file_get_contents("images/social-icons/instagramm.svg") !!}</li>
		    	    </ul>
		    	</div>

	    	</div> {{-- ./row --}}

	    	<div class="row footer">
    			<p>&copy; {{ \Carbon\Carbon::now()->year }} Agnieszka Krol</p>
    			<p>Crafted with love by Istvan Lovas</p>
	    	</div>
	    </div> {{-- ./container-fluid --}}

</section>

@endsection

