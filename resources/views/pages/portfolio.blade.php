@extends('layouts.app')

@section('title', 'Portfolio')
@section('meta_description', 'Agnieszka Krol portfolio photos')

@section('content')

    <section id="portfolio">
		<div class="col-md-8 col-md-offset-2" role="tabpanel">

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active">
			    	<a href="#family" aria-controls="family" role="tab" data-toggle="tab">Family</a>
			    </li>
			    <li role="presentation">
			    	<a href="#newborn" aria-controls="newborn" role="tab" data-toggle="tab">Newborn</a>
			    </li>
			    <li role="presentation">
			    	<a href="#maternity" aria-controls="maternity" role="tab" data-toggle="tab">Maternity</a>
			    </li>
			    <li role="presentation">
			    	<a href="#engagement" aria-controls="engagement" role="tab" data-toggle="tab">Engagement</a>
			    </li>
			    <li role="presentation">
			    	<a href="#artistic" aria-controls="artistic" role="tab" data-toggle="tab">Artistic</a>
			    </li>
			</ul>

			<!-- Tab panels -->
			<div class="tab-content portfolio-photos">

				<div role="tabpanel" class="tab-pane active" id="family">

					{{-- @if auth()->chech()->hasRole('admin') --}}
					<div class="row">
						<div class="col-xs-12 admin-add-photos">
					    	@include('admin/partials/forms/add_photos', ['category' => 'family'])
					    </div>
					</div>
				    {{-- @endif --}}

				    <div class="row masonry-container">
					    @foreach ($photos->where('category', 'family') as $photo)
				        	<div class="col-md-4 col-sm-6 item">
								<img class="img-responsive" src="{{ $photo->path }}" alt="">
							</div>
					    @endforeach
				    </div> {{-- ./masonry-container --}}
				</div> {{-- ./tab-content --}}

				<div role="tabpanel" class="tab-pane" id="newborn">

					{{-- @if auth()->chech()->hasRole('admin') --}}
					<div class="row">
						<div class="col-xs-12 admin-add-photos">
					    	@include('admin/partials/forms/add_photos', ['category' => 'newborn'])
					    </div>
					</div>
				    {{-- @endif --}}

				    <div class="row masonry-container">
				        @foreach ($photos->where('category', 'newborn') as $photo)
				        	<div class="col-md-4 col-sm-6 item">
								<img class="img-responsive" src="{{ $photo->path }}" alt="">
							</div>
					    @endforeach
				    </div> {{-- ./masonry-container --}}
				</div> {{-- ./tab-content --}}

				<div role="tabpanel" class="tab-pane" id="maternity">
					{{-- @if auth()->chech()->hasRole('admin') --}}
					<div class="row">
						<div class="col-xs-12 admin-add-photos">
					    	@include('admin/partials/forms/add_photos', ['category' => 'maternity'])
					    </div>
					</div>
				    {{-- @endif --}}

				    <div class="row masonry-container">
				        @foreach ($photos->where('category', 'maternity') as $photo)
				        	<div class="col-md-4 col-sm-6 item">
								<img class="img-responsive" src="{{ $photo->path }}" alt="">
							</div>
					    @endforeach
				    </div> {{-- ./masonry-container --}}
				</div> {{-- ./tab-content --}}

				<div role="tabpanel" class="tab-pane" id="engagement">

					{{-- @if auth()->chech()->hasRole('admin') --}}
					<div class="row">
						<div class="col-xs-12 admin-add-photos">
					    	@include('admin/partials/forms/add_photos', ['category' => 'engagement'])
					    </div>
					</div>
				    {{-- @endif --}}

				    <div class="row masonry-container">
				        @foreach ($photos->where('category', 'engagement') as $photo)
				        	<div class="col-md-4 col-sm-6 item">
								<img class="img-responsive" src="{{ $photo->path }}" alt="">
							</div>
					    @endforeach
				    </div> {{-- ./masonry-container --}}
				</div> {{-- ./tab-content --}}

				<div role="tabpanel" class="tab-pane" id="artistic">

					{{-- @if auth()->chech()->hasRole('admin') --}}
					<div class="row">
						<div class="col-xs-12 admin-add-photos">
					    	@include('admin/partials/forms/add_photos', ['category' => 'artistic'])
					    </div>
					</div>
				    {{-- @endif --}}

				    <div class="row masonry-container">
				        @foreach ($photos->where('category', 'artistic') as $photo)
				        	<div class="col-md-4 col-sm-6 item">
								<img class="img-responsive" src="{{ $photo->path }}" alt="">
							</div>
					    @endforeach
				    </div> {{-- ./masonry-container --}}
				</div> {{-- ./tab-content --}}

			</div> {{-- ./portfolio-photos --}}

		</div> {{-- ./tabpanel --}}
	</section>

@endsection

@section('customJS')
<script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

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

	$('a[data-toggle=tab]').each(function () {
		var $this = $(this);

			$this.on('shown.bs.tab', function () {
				$container.imagesLoaded( function () {
					$container.masonry({
						columnWidth: '.item',
						itemSelector: '.item'
					});   
				});
			});
	});
	// Dropzone
	Dropzone.options.addPortfolioPhotosForm = {
        paramName: 'photo',
        maxFilesize: 3,
        acceptedFiles: '.jpg, .jpeg, .png, .bmp'
    };
</script>
@stop
