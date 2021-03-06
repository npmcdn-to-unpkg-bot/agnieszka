@extends('layouts.app')

@section('title', 'Portfolio')
@section('meta_description', 'Agnieszka Krol portfolio photos')
@section('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
@stop

@section('content')

    <section id="portfolio" class="page">
    	<div class="container-fluid">

			<h2>{{ trans('portfolio.header') }}</h2>

			<div class="row intro">

	    		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
	    			<p class="lead">{{ trans('portfolio.intro') }}</p>
	    		</div>

	    	</div>

	    	<div class="row">
			
				<div class="col-xs-12" role="tabpanel" class="tabpanel">
					<div class="tab-content portfolio-photos">
						@foreach(categories() as $key => $value)
							<div role="tabpanel" class="tab-pane" id="{{ $value }}">
							
							    @if (count($photos->where('category', $value)) > 0)
							    	<div class="row masonry-container">
									    @foreach ($photos->where('category', $value) as $index => $photo)
									    	@if(($index === 1) || ($index === 6) || ($index === 13) || ($index === 18) || ($index === 25))
								        		<div class="col-xs-6 col-md-8 col-lg-6 item">
								        	@else
								        		<div class="col-xs-6 col-md-4 col-lg-3 item">
								        	@endif
								        		 @if(Auth::check() && Auth::user()->hasRole('admin'))
								        		 	<div class="delete-photo">
								        		 		<form method="POST" action="/portfoliophoto/{{ $photo->id }}">
								        					{{ csrf_field() }}
								        					<input type="hidden" name="_method" value="DELETE">

								        					<button type="submit" class="btn btn-danger">
								        						<i class="fa fa-trash" aria-hidden="true"></i>
								        					</button>
								        				</form>
								        		 	</div>
							        			@endif
												<img class="img-responsive" src="{{ $photo->path }}" alt="Agnieszka Krol Portfolio photo">
											</div>
									    @endforeach
								    </div> {{-- ./masonry-container --}}
							    @endif

							    @if(Auth::check() && Auth::user()->hasRole('admin'))
							    	<div class="row photo-upload">
							    		<div class="col-xs-12">
							    			 @include('admin/partials/forms/add_photos', ['category' => $value])
							    		</div>
							    		<div class="text-center col-xs-12">
							    		<a href="{{ route('refresh-page') }}" role="button" class="btn btn-success refresh-page">
							    			<i class="fa fa-refresh" aria-hidden="true"></i> Refresh Page
							    		</a>
							    		</div>
							    	</div>
							    @endif
							</div> {{-- ./tab-pane --}}
	                    @endforeach
					</div> {{-- ./portfolio-photos --}}
				</div> {{-- ./tabpanel --}}

			</div> {{-- ./row --}}
    	</div> {{-- /.container-fluid --}}
	</section>

@endsection

@section('customJS')
<script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
<script src="{{ asset('js/libs.js') }}"></script>

<script>
	$('.portfolio-tabs > li:first').addClass('active');
	$('.tab-content > .tab-pane:first').addClass('active fade in');

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

	$('a[data-toggle=tab]').each(function () {
		var $this = $(this);

			$this.on('shown.bs.tab', function () {
				$container.imagesLoaded( function () {
					$container.masonry({
						columnWidth: '.item',
						itemSelector: '.item',
						percentPosition: true
					});   
				});
			});
	});
	// Dropzone
	Dropzone.options.addPortfolioPhotosForm = {
        paramName: 'photo',
        maxFilesize: 5,
        acceptedFiles: '.jpg, .jpeg, .png, .bmp'
    };
</script>
@stop
