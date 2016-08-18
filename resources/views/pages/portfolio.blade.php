@extends('layouts.app')

@section('title', 'Portfolio')
@section('meta_description', 'Agnieszka Krol portfolio photos')
@section('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
@stop

@section('content')

    <section id="portfolio">
		<div class="row">
			
			<div class="col-xs-12" role="tabpanel">
				<!-- Tapanel tabs -->
				<ul class="nav nav-tabs" role="tablist">
					 @foreach(categories() as $key => $value)
					 	<li role="presentation">
					    	<a href="#{{ $value }}" aria-controls="{{ $value }}" role="tab" data-toggle="tab">{{ ucfirst($value) }}</a>
					    </li>
                    @endforeach
				</ul>

				<!-- Tab panels -->
				<div class="tab-content portfolio-photos">

					@foreach(categories() as $key => $value)
						<div role="tabpanel" class="tab-pane" id="{{ $value }}">
							@if(Auth::check() && Auth::user()->hasRole('admin'))
							    @include('admin/partials/forms/add_photos', ['category' => $value])
						    @endif

						    @if (count($photos->where('category', $value)) > 0)
						    	<div class="row masonry-container">
								    @foreach ($photos->where('category', $value) as $photo)
							        	<div class="col-xs-6 col-sm-4 item">
											<img class="img-responsive" src="{{ $photo->path }}" alt="Agnieszka Krol Family photo">
										</div>
								    @endforeach
							    </div> {{-- ./masonry-container --}}
						    @endif
						</div> {{-- ./tab-pane --}}
                    @endforeach

				</div> {{-- ./portfolio-photos --}}
			</div> {{-- ./tabpanel --}}

		</div> {{-- ./row --}}
	</section>

@endsection

@section('customJS')
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
