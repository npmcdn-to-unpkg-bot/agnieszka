@extends('layouts.app')

@section('title', 'Edit Client gallery')
@section('meta_description', 'Edit Client gallery')
@section('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
@stop

@section('content')

<section class="client-gallery">
	<h1>Show Client gallery</h1>

		<div class="col-md-6 col-md-offset-2 add-photosession">
		{{ $photosession->user->first_name }}
		<img src="{{ asset($photosession->background_image_path) }}" alt="">
		<br>
		<a href="/admin/photosessions/{{ $photosession->id }}/edit">Edit photosession</a>
        </div>

		{{-- <div class="col-xs-12 bg-img">
			@if( $photosession->background_image == null)
				@if(\Auth::user()->hasRole('admin'))
					<div class="row">
						<div class="col-xs-12 admin-add-background-image">
					    	@include('admin/partials/forms/add_background_image')
					    </div>
					</div>
				@endif
				@if(\Auth::user()->hasRole('admin'))
					<button id="background-image-upload" class="btn btn-img">
						<i class="fa fa-plus-circle"> Change Image</i>
					</button>
				@endif
				<div id="background-image" style="background-image: url('{{ asset('/images/photosession-bg-placeholder.jpg') }}');"></div>
			@else
			<div id="background-image" style="background-image: url('{{ $photosession->background_image }}');"></div>
		</div> --}} {{-- ./bg-img --}}

		{{-- <div class="col-md-12 photosession-photos"> --}}
			{{-- @if (count($photosession->photos() > 0)) --}}
				{{-- <div class="row masonry-container">
					@foreach ($photosession->photos()->all() as $photo)
					  	<div class="col-md-4 col-sm-6 item">
							<img class="img-responsive" src="{{ $photosession->path }}" alt="">
						</div>
					@endforeach
				</div> --}} {{-- ./masonry-container --}}
		    {{-- @endif --}}
		{{-- </div> --}}

</section>

@endsection

@section('customJS')
    <script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
	<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
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