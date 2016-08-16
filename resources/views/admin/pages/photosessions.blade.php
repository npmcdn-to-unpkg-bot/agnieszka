@extends('layouts.app')

@section('title', 'Index of all Photosessions')
@section('meta_description', 'Indexing all Agnieszka Krol Photosessions')

@section('content')
<h1>Indexing all Photosessions</h1>
<section id="photosessions-index">
	<div class="col-xs-12">
		@foreach ($photosessions as $photosession)
			<div class="col-md-4 photosession">

				<div class="background-img" style="background-image:url('/{{ $photosession->background_image_path_thumbnail }}');"></div>
				<a href="/admin/photosessions/{{ $photosession->id }}/edit">Edit Photosession</a>

				<div class="content">
					<h2 class="title">{{ $photosession->title }}</h2>
					<p class="client">Client:{{ $photosession->user->getFullName() }}</p>
					<div class="row footer">
						<div class="col-md-6">
							<span class="category">{{ $photosession->category }}</span>
						</div>
						<div class="col-md-6">
							<span class="date_of_photosession">{{ $photosession->date_of_photosession }}</span>
						</div>
					</div> {{-- ./footer --}}
				</div> {{-- ./content --}}

			</div> {{-- ./photosession --}}
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