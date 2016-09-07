@extends('layouts.admin')

@section('title', 'Edit Client gallery')
@section('meta_description', 'Edit Client gallery')
@section('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
@stop

@section('content')

<section class="client-gallery">
	
	@if ($photosession != null)
		<h1>Show Client gallery</h1>
		<div class="col-md-6 col-md-offset-2 add-photosession">
		{{ $photosession->user->first_name }}
		<div class="bg-img">
			<img src="{{ asset($photosession->background_image_path) }}" alt="Photosession background image">
		</div>
		<a href="/admin/photosessions/{{ $photosession->id }}/edit">Edit photosession</a>
        </div>

        <div class="row">

        	<div class="col-md-12 gallery">
        		@foreach ($photosession->photos->chunk(4) as $set)
	        		<div class="row">
	        			@foreach ($set as $photo)
	        				<div class="col-md-3 gallery__image">
		        				<form method="POST" action="/photos/{{ $photo->id }}">
		        					{!! csrf_field() !!}
		        					<input type="hidden" name="_method" value="DELETE">

		        					<button type="submit">Delete Photo</button>
		        				</form>
	        					<a href="/{{ $photo->path }}">
	        						<img src="{{ asset($photo->thumbnail_path) }}" alt="Thumbnail photo">
	        					</a>
	        				</div>
	        			@endforeach
	        		</div>
	        	@endforeach
        	</div>

        </div>
	@endif

</section>

@endsection

@section('customJS')
    <script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
	<script src="https://unpkg.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
	<script src="{{ asset('js/libs.js') }}"></script>
    <script>
    	$(function(){
			var $container = $('.masonry-container');
				$container.imagesLoaded(
					{background: true},
				 	function () {
						$container.masonry({
							columnWidth: '.item',
				    		itemSelector: '.item'
					});   
			});
		});
    </script>
@stop