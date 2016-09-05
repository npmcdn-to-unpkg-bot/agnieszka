@extends('layouts.client')

@section('title'){{ Auth::user()->getFullName() }} Profile @endsection
@section('meta_description')Find the profile of {{ Auth::user()->getFullName() }} on Agnieszka Krol Photographery client gallery.@endsection

@section('content')
@if(Auth::user() && Auth::user()->owns($photosession) || Auth::user()->hasRole('admin'))
	<section id="client-gallery">
		<div class="background-image" style="background-image: url('/{{ asset($photosession->background_image_path) }}')"></div>
		<div class="container-fluid">
			<div class="row">

				@if($photosession->selectable())
				<div class="col-xs-12 photo-request-form">
					@if(count($photosession->photos) > 0)
	                    <div class="row masonry-container photos">
	                    	<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('sendPhotoRequest') }}">
	                    		{{ csrf_field() }}
	                    		<input type="hidden" name="_method" value="PATCH">
                    				@foreach($photosession->photos as $index => $photo)
                    					@if(($index === 2) || ($index === 7) || ($index === 11) || ($index === 18))
						                	<div class="col-xs-6 col-sm-6 item">
						                @else
						                	<div class="col-xs-6 col-sm-3 item">
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
				@endif

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
				$(this).toggleClass('selected');
				$(this).find('.glyph').toggleClass('selected-icon');
				$(this).find('img').toggleClass('selected-img');
			});
        });
    </script>
@stop