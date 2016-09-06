@extends('layouts.app')

@section('title', 'Services')
@section('meta_description', 'Find the services what Agnieszka Krol Photography has to offer. Choose from the categories Family, Newborn, Maternity and Artistic Photosessions indoor or outdoor up to 60 km from Aarau.')

@section('content')

    <section id="services" class="page">
    	<div class="container-fluid">

			<h2>{{ trans('services.header') }}</h2>
	    	
	    	<div class="row intro">
	    		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
	    			<p class="lead">{{ trans('services.intro') }}</p>
	    		</div>
	    	</div>

	    	<div class="row services-by-catgory">
	    		<div class="col-xs-12">
	    			<div class="row">
	    				@include('pages.partial.services-by-category')
	    			</div>
	    		</div>
	    	</div>

	    	<div class="row outro">
	    		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
	    			<p>I am open to individual requests like professional profile photos, weddings, engagements etc.<br>
	    			Please contact me to discuss your needs.</p>
	    		</div>
	    	</div>

    	</div> {{-- /.container-fluid --}}
	</section>

@endsection