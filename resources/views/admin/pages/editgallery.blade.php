@extends('layouts.admin')

@section('title', 'Edit Client gallery')
@section('meta_description', 'Edit Client gallery')
@section('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
@stop

@section('content')
<section class="client-gallery">

@if( $photosession->background_image === null)
	<div class="row">
		<h2>Add Background Image</h2>
		<div class="col-xs-12 admin-add-background-image">
	    	@include('admin/partials/forms/addbackgroundimage')
	    </div>
	</div>
@else
<div class="background-image" style="background-image: url('/{{ asset($photosession->background_image_path) }}')">
	<button>Change background image</button>
</div>
@endif

	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12">
				@if(count($photosession->photos) > 0)
                    <div class="row masonry-container photos">
                        @foreach($photosession->photos as $photo)
                            <div class="col-xs-6 col-sm-3 col-lg-2 item">
                            	<div class="delete-photo">
			        		 		<form method="POST" action="/photos/{{ $photo->id }}">
			        					{{ csrf_field() }}
			        					<input type="hidden" name="_method" value="DELETE">

			        					<button type="submit" class="btn btn-danger">
			        						<i class="fa fa-trash" aria-hidden="true"></i>
			        					</button>
			        				</form>
			        		 	</div>
                                <img class="img-responsive" src="{{ asset($photo->thumbnail_pat) }}" alt="Gallery photo">
                            </div>
                        @endforeach
                    </div>
                @endif
			</div>

		</div> {{-- ./row --}}

		<div class="row photo-upload">
			<div class="col-xs-12">
				 @include('admin/partials/forms/addphotostogallery')
			</div>
			<div class="text-center col-xs-4 col-xs-offset-4">
				<a href="{{ route('refresh-page') }}" role="button" class="btn btn-success refresh-page">
					<i class="fa fa-refresh" aria-hidden="true"></i>
				</a>
			</div>
		</div> {{-- ./photo-upload --}}

	</div> {{-- ./container-fluid --}}
</section>
@endsection

@section('customJS')
    <script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
	<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
	<script src="{{ asset('js/libs.js') }}"></script>
    <script>
    	var $container = $('.masonry-container');
			$container.imagesLoaded(
				{background: true},
			 	function () {
					$container.masonry({
						columnWidth: '.item',
			    		itemSelector: '.item',
			    		percentPosition: true
				});   
		});

        $( function() {
            Dropzone.options.addBackgroundImageToGalleryForm = {
                paramName: 'background',
                maxFiles: 1,
                maxFilesize: 5,
                acceptedFiles: '.jpg, .jpeg, .png',
                accept: function(file, done) {
				    done();
				},
                init: function() {
				    this.on("addedfile", function() {
				    	if (this.files[1]!=null){
				    		this.removeFile(this.files[0]);
				    	}
				    });
				}
            };

            Dropzone.options.addPhotosToGallery = {
                paramName: 'photo',
                maxFilesize: 3,
                acceptedFiles: '.jpg, .jpeg, .png'
            };
        });
    </script>
@stop