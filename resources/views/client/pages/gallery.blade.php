@extends('layouts.client')

@section('title'){{ Auth::user()->getFullName() }} Profile @endsection
@section('meta_description')Find the profile of {{ Auth::user()->getFullName() }} on Agnieszka Krol Photographery client gallery. @endsection

@section('content')
	@if (Auth::user() && Auth::user()->owns($photosession))
		<section class="row client-gallery">
			<h1>Client gallery</h1>
				<div class="col-md-12">
					
				</div>
		</section>
	@endif

@endsection

@section('customJS')
    <script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
	<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
	<script src="{{ asset('js/libs.js') }}"></script>
    <script>
    	var $container = $('.masonry-container');
			$container.imagesLoaded(
				{background: true},
			 	function () {
					$container.masonry({
						columnWidth: '.item',
			    		itemSelector: '.item'
				});   
		});
    </script>
@stop