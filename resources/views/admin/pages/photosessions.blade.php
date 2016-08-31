@extends('layouts.admin')

@section('title', 'Photosessions')
@section('meta_description', 'List of all Photosessions of Agnieszka Krol')
@section('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@stop

@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2" id="index-of-photosessions">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Photosessions</li>
            </ol>
        </div> {{-- ./row --}}

        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">Photosessions</h1>
            </div>
        </div> {{-- ./row --}}

        <div class="row photosessions-overview">
            @include('admin.pages.partials.photosessions-overview')
        </div>

       {{--  <div class="row forms">
            <div class="form-error-msg">
                @include('errors/errors')
            </div>
                    
            <div class="col-md-5 col-md-offset-1 add-photosession">
                <div class="row">
                    <h1>Add new Photo Session</h1>
            
                    @include('admin.partials.forms.add_new_photosession')
            
                </div>
            </div>
        </div> --}}
    </div> {{-- ./photosessions --}}
@stop

@section('customJS')
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

<script>
$( function() {
	var $container = $('.masonry-container');
		$container.imagesLoaded(
			{background: true},
		 	function () {
				$container.masonry({
					columnWidth: '.item',
		    		itemSelector: '.item'
			});   
	});

    Dropzone.options.addPhotoSessionPhotosForm = {
        paramName: 'photo',
        maxFilesize: 3,
        acceptedFiles: '.jpg, .jpeg, .png, .bmp'
    };

    $("#datepicker").datepicker({
        dateFormat: "dd/mm/yy"
    });
});
</script>
@stop