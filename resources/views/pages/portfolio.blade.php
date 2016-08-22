@extends('layouts.app')

@section('title', 'Portfolio')
@section('meta_description', 'Agnieszka Krol portfolio photos')
@section('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
@stop

@section('content')

    <section id="portfolio">
    	<div class="container-fluid">

    		<h2>{{ trans('portfolio.header') }}</h2>

    		<div class="row intro">

	    		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
	    			<p class="lead">{{ trans('portfolio.intro') }}</p>
	    		</div>

	    	</div>

	    	<div class="row">
			
				<div class="col-xs-12" role="tabpanel" class="tabpanel">
					<ul class="nav nav-tabs" role="tablist">
						 @foreach(categories() as $key => $value)
						 	<li role="presentation">
						    	<a href="#{{ $value }}" aria-controls="{{ $value }}" role="tab" data-toggle="tab">
						    		@if(Lang::has('categories.' . $value))
										{{ trans('categories.' . $value) }}
						    		@endif
						    	</a>
						    </li>
	                    @endforeach
					</ul> {{-- Tapanel tabs --}}

					<div class="tab-content portfolio-photos">
						@foreach(categories() as $key => $value)
							<div role="tabpanel" class="tab-pane" id="{{ $value }}">
							
							    @if (count($photos->where('category', $value)) > 0)
							    	<div class="row masonry-container">
									    @foreach ($photos->where('category', $value) as $photo)
								        	<div class="col-xs-6 col-sm-4 item">
												<img class="img-responsive" src="{{ $photo->path }}" alt="Agnieszka Krol Family photo">
											</div>
									    @endforeach
								    </div> {{-- ./masonry-container --}}
							    @endif

							    @if(Auth::check() && Auth::user()->hasRole('admin'))
								    @include('admin/partials/forms/add_photos', ['category' => $value])
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/plugins/ScrollToPlugin.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.js"></script>
<script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

<script>
	$('.nav-tabs > li:first').addClass('active');
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
        maxFilesize: 3,
        acceptedFiles: '.jpg, .jpeg, .png, .bmp'
    };
</script>
@stop
