@extends('layouts.client')

@section('title'){{ Auth::user()->getFullName() }} Profile @endsection
@section('meta_description')Find the profile of {{ Auth::user()->getFullName() }} on Agnieszka Krol Photographery client gallery.@endsection

@section('content')
@if(Auth::user() && Auth::user()->owns($photosession) || Auth::user()->hasRole('admin'))
	<section id="client-gallery">
		<div class="banner" style="background-image: url('/{{ asset($photosession->background_image_path) }}')">
			<div class="title">
				<h1>{{ $photosession->title }}</h1>
				<h6>{{ $photosession->getDate() }}</h6>
				<a href="#instructions" role="button">Get Started</a>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">

				<div class="col-xs-12 instructions text-center">
					<h2>This is where the instructions come to tell the client how to download the photos,etc.</h2>
				</div>

				<div class="col-xs-12 photo-request-form">
					@if(count($photosession->photos) > 0)
	                    <div class="row masonry-container photos">
	                    	<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('sendPhotoRequest') }}">
	                    		{{ csrf_field() }}
	                    		<input type="hidden" name="_method" value="PATCH">
                    				@foreach($photosession->photos as $index => $photo)
                    					@if(($index === 1) || ($index === 6) || ($index === 13) || ($index === 18) || ($index === 25))
						                	<div class="col-xs-6 col-md-8 col-lg-8 item">
						                @else
						                	<div class="col-xs-6 col-md-4 col-lg-4 item">
						                @endif
						                	<input type="checkbox" value="{{ $photo->id }}" id="request_photo_{{ $photo->id }}" name="request_photo[]">
						                    <label for="request_photo_{{ $photo->id }}">
						                    	<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg>
						                    	<img class="img-responsive" src="{{ asset($photo->thumbnail_path) }}" alt="Gallery photo">
						                    </label>
						                </div> {{-- ./item --}}
		                        	@endforeach
					            <input type="submit" class="btn btn-primary" value="Send Request" data-after-submit-value="Sending Request&hellip;">
	                    	</form>
	                    </div> {{-- ./masonry-container --}}
	                @endif
				</div>
			

			</div>
		</div>
	</section>
@endif
@endsection

@section('customJS')
    <script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
	<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
	<script src="{{ asset('js/libs.js') }}"></script>
    <script>
    	$(function() {

    		var maxNumberPhotos = parseInt($('#selectable_photos').text());

    		var $container = $('.masonry-container');
				$container.imagesLoaded(
					{background: true},
				 	function() {
						$container.masonry({
							columnWidth: '.item',
				    		itemSelector: '.item'
					});   
			});

			$('.item label').hover(
				function() {
					if(! $(this).hasClass('selected')) {
						$(this).css('transform', 'translateY(-1px)');
						$(this).find('.glyph').css({
							'opacity': '1'
						});
					}
				}, function() {
					if(! $(this).hasClass('selected')) {
						$(this).css('transform', 'translateY(0)');
						$(this).find('.glyph').css({
							'opacity': '0'
						});
					}
				}
			);

			$('.item label').click(function() {
				if(! $(this).hasClass('selected')) {
					$('#selected_photos').html(function(i, val) { return val*1+1 });

					var selectedPhotos = parseInt($('#selected_photos').text());

					if(selectedPhotos > maxNumberPhotos) {
						$('#selected_photos').addClass('color-red');
					}

				} else {
					$('#selected_photos').html(function(i, val) { return val*1-1 });
					
					var selectedPhotos = parseInt($('#selected_photos').text());
					
					if(selectedPhotos <= maxNumberPhotos) {
						$('#selected_photos').removeClass('color-red');
					}

				}

				$(this).toggleClass('selected');
				$(this).find('.glyph').toggleClass('selected-icon');
				$(this).find('img').toggleClass('selected-img');
			});
        });
    </script>
@stop