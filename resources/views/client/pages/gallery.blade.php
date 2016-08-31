@extends('layouts.client')

@section('title'){{ Auth::user()->getFullName() }} Profile @endsection
@section('meta_description')Find the profile of {{ Auth::user()->getFullName() }} on Agnieszka Krol Photographery client gallery.@endsection

<style>
	.background-image {
		background-repeat:no-repeat;
		background-position: center;
		background-size: cover;
		height:100%;
	}
</style>

@section('content')
	{{-- @if(Auth::user() && Auth::user()->owns($photosession)) --}}
		<section class="client-gallery">
			<div class="background-image" style="background-image: url('/{{ asset($photosession->background_image_path) }}')"></div>
			<div class="container-fluid">
				<div class="row">

					<div class="col-xs-12 photo-request-form">
						@if(count($photosession->photos) > 0)
		                    <div class="row masonry-container photos">
		                    	<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/photosessions/send_request') }}">
		                    		{{ csrf_field() }}
		                        	@foreach($photosession->photos as $photo)
						                <div class="col-xs-6 col-sm-3 col-lg-2 item">
						                	<input type="checkbox" value="{{ $photo->thumbnail_path }}" id="request_photo_{{ $photo->id }}" name="request_photo">
						                    <label for="request_photo_{{ $photo->id }}">
						                    	<img class="img-responsive" src="{{ asset($photo->thumbnail_path) }}" alt="Gallery photo">
						                    </label>
						                </div>
		                        	@endforeach
		                        	<div class="col-xs-12">
				                        <button type="submit" class="btn btn-primary">
				                            <i class="fa fa-btn fa-user"></i> Send request
				                        </button>
				                    </div>
		                    	</form>
		                    </div> {{-- ./masonry-container --}}
		                @endif
					</div>

				</div>
			</div>
		</section>
	{{-- @endif --}}
@endsection

{{-- @section('customJS')
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
@stop --}}