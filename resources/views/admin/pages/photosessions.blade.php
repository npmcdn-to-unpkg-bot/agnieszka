@extends('layouts.app')

@section('title', 'List of all Photosessions')
@section('meta_description', 'Agnieszka Krol Photosessions')

@section('content')
<h1>List of all Photosessions</h1>
<section id="photosessions">
	<div class="col-xs-12">
		@foreach ($photosessions as $photosession)
			{{-- expr --}}
		@endforeach
	</div>
</section>
@stop

@section('customJS')
<script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>

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