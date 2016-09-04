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
            <div class="col-xs-12 col-lg-10 title">
            	<form method="POST" class="form" action=" {{ route('update-title' , $photosession->id) }}">
			    	{{ csrf_field() }}
    				<input type="hidden" name="_method" value="PATCH">
    				<input type="text" name="title" value="{{ $photosession->title }}">
    					<button type="submit" class="btn btn-primary">
							<i class="fa fa-pencil" aria-hidden="true"></i> Edit title
						</button>
    			</form>
            </div>
        </div> {{-- ./row --}}

        <div class="row">

            <div class="col-xs-12">
            	<div class="row admin-tools">
            		<ul class="notification-icons">
            			<li>
	            			@if($photosession->published())
						        <svg class="glyph stroked email color-teal" title="Published"><use xlink:href="#stroked-email"/></svg>
						    @else
						        <svg class="glyph stroked open letter color-red" title="Unpublished"><use xlink:href="#stroked-open-letter"/></svg>
						    @endif
					    </li>
					    <li>
					    	@if($photosession->ordered())
						        <svg class="glyph stroked basket color-teal" title="Ordered"><use xlink:href="#stroked-basket"/></svg>
						    @else
						        <svg class="glyph stroked hourglass color-red" title=Unordered"><use xlink:href="#stroked-hourglass"/></svg>
						    @endif
					    </li>
					    <li>
					    	@if($photosession->purchased())
						        <svg class="glyph stroked checkmark color-teal" title="Purchased"><use xlink:href="#stroked-checkmark"/></svg>
						    @else
						        <svg class="glyph stroked cancel color-red" title="Unpurchased"><use xlink:href="#stroked-cancel"/></svg>
						    @endif
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

			$('.change-bg').click(function() {
			  $('.add-bg-form').toggleClass('hidden');
			});

            Dropzone.options.addBackgroundImageToGalleryForm = {
                paramName: 'background',
                maxFiles: 1,
                maxFilesize: 5,
                acceptedFiles: '.jpg, .jpeg, .png',
                dictDefaultMessage: 'Drop 1 image here to upload for the background of this Photosession! Filesize should not exceed 5 mb!',
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
                maxFilesize: 5,
                acceptedFiles: '.jpg, .jpeg, .png',
                dictDefaultMessage: 'Drop any number of photos here to upload! Individual filesizes should not exceed 5 mb!',
            };
        });
    </script>
@stop