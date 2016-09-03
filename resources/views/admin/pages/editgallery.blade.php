@extends('layouts.admin')

@section('title', 'Edit Client gallery')
@section('meta_description', 'Edit Client gallery')
@section('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
@stop

@section('content')
<section class="client-gallery">

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2" id="gallery">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="/admin/photosessions" title="Go to photosessions">Photosessions</a></li>
                <li class="active">{{ $photosession->title }}</li>
            </ol>
        </div> {{-- ./row --}}

        <div class="row">
            <div class="col-xs-12 col-lg-10">
                <h1 class="page-header">{{ $photosession->title }}</h1>
            </div>
        </div> {{-- ./row --}}

        <div class="row">

            <div class="col-xs-12">
            	<div class="admin-tools clearfix">
            		<ul class="photosession-icons pull-left">
            			<li>confirmed</li>
            			<li>ordered</li>
            			<li>purchased</li>
            		</ul>
            		<ul class="pull-right">
	               		@if($photosession->background_image_path !== null)
	               			<li><button class="btn-primary change-bg">Change Background</button></li>
	               		@endif
	               			<li><a href="#add-photos-form" class="btn-primary add-more-photos">Add more photos</a></li>
	               			<li><a href="{{ route('client-gallery', [$photosession->user_id, $photosession->id]) }}" title="view photosession">View</a></li>
	               		<li>
	               			<a href="{{ route('refresh-page') }}" role="button" class="btn btn-success refresh-page">
								<i class="fa fa-refresh" aria-hidden="true"></i>
							</a>
						</li>
            		</ul>
            	</div>
            </div>

        </div> {{-- ./row --}}

		<div class="row gallery-wrapper">

            <div class="col-xs-12">
            	<div class="add-bg-form hidden">
        			@include('admin/partials/forms/add_background_image')
        		</div>
            	@if($photosession->background_image_path !== null)
	            	<div class="background-image" style="background-image: url('/{{ asset($photosession->background_image_path) }}')">
	            	</div>
				@else
	        		@include('admin/partials/forms/add_background_image')
	        	@endif
				
				<div class="row" id="add-photos-form">
		            <div class="col-xs-12">
		            	@include('admin/partials/forms/add_photos_to_gallery')
		            </div>
		        </div> {{-- ./add-photos-form --}}

				@if(count($photosession->photos) > 0)
		            <div class="row masonry-container photos">
		                @foreach($photosession->photos as $photo)
		                    <div class="col-xs-4 col-sm-3 col-lg-2 item">
		                    	<div class="delete-photo">
			        		 		<form method="POST" class="form" action="/photos/{{ $photo->id }}">
			        					{{ csrf_field() }}
			        					<input type="hidden" name="_method" value="DELETE">

			        					<button type="submit" class="btn btn-danger">
			        						<i class="fa fa-trash" aria-hidden="true"></i>
			        					</button>
			        				</form>
			        		 	</div>
		                        <img class="img-responsive" src="{{ asset($photo->thumbnail_path) }}" alt="Gallery photo">
		                    </div> {{-- ./item --}}
		                @endforeach
		            </div> {{-- ./masonry-container --}}
		        @endif
            </div>

        </div> {{-- ./row --}}

    </div> {{-- ./photosession --}}

</section>
@stop

@section('customJS')
    <script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
	<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        $(function() {
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

			// $("button[type='submit']").on('click',function() {
		 //   		$(this).prop('disabled',true);
			// });

			$('button.change-bg').click(function() {
			  $('.add-bg-form').toggleClass('hidden');
			});

            Dropzone.options.addBackgroundImageToGalleryForm = {
                paramName: 'background',
                maxFiles: 1,
                maxFilesize: 5,
                acceptedFiles: '.jpg, .jpeg, .png',
                dictDefaultMessage: 'Drop 1 image here to upload for background',
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
                acceptedFiles: '.jpg, .jpeg, .png',
                dictDefaultMessage: 'Drop any number of photos here to upload',
            };
        });
    </script>
@stop