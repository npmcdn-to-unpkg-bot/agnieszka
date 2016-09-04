<header id="admin-header">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
		    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		    	</button>
		    	<a href="{{ route('home') }}" class="navbar-brand">
		      		{{-- <img alt="Agnieszka Krol Logo" src=""> --}}
		      		<span>Agnieszka</span>Krol
		    	</a>
		    	<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="{{ route('dashboard') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <span class="hidden-xs" title="Hi, {{ Auth::user()->getFullName() }}">Hi, {{ Auth::user()->getFullName() }}</span> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
				            <li><a href="{{ route('home') }}">Homepage</a></li>
				            <li role="separator" class="divider"></li>
				            <li><a href="/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
			        	</ul>
					</li>
				</ul>
		    </div>
							
		</div> {{-- ./container-fluid --}}
	</nav> {{-- ./navbar-fixed-top --}}
    
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    	<ul class="nav menu">
    		<li class="{{ setActiveForAdminNavigation('admin') }}">
    			<a href="{{ route('dashboard') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a>
    		</li>
    		<li class="{{ setActiveForAdminNavigation('admin/photosessions') }}">
    			<a href="/admin/photosessions"><svg class="glyph stroked camera "><use xlink:href="#stroked-camera"/></svg> Photosessions</a>
    		</li>
    		@if(Request::is('admin/photosessions/*/edit'))
    		<li role="presentation" class="divider"></li>
    		<li class="parent">
				<a href="#" class="active">
					<span data-toggle="collapse" href="#gallery-sub-menu"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Gallery 
				</a>
				<ul class="children collapse" id="gallery-sub-menu">
					@if(count($photosession->photos) > 0)
						<li><a href="#add-photos-form" class="btn-primary add-more-photos" title="Add more photos to photosession"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Add photos</a></li>
					@endif
					@if($photosession->background_image_path !== null)
               			<li><a href="#" class="change-bg" title="Change background of photosession"><svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg> Change Background</a></li>
               		@endif
               		@if (! $photosession->published())
               			<li><a href="{{ route('publish-gallery', $photosession->id) }}"><svg class="glyph stroked email" title="Make photosession available to view"><use xlink:href="#stroked-email"/></svg> Publish</a></li>
               		@endif
           			<li><form method="POST" class="form" action="{{ route('enableAndDisableToDownloadPhotos', $photosession->id) }}">
					   		{{ csrf_field() }}
		    				<input type="hidden" name="_method" value="PATCH">
		    				<input type="hidden" name="has_permission_to_download" value="{{ $photosession->has_permission_to_download() ? false : true }}">
	    					<button type="submit" class="btn {{ $photosession->has_permission_to_download() ? 'btn-danger' : 'btn-primary' }}">
								<svg class="glyph stroked download" title="Enable client to download selected photos"><use xlink:href="#stroked-download"/></svg> {{ $photosession->has_permission_to_download() ? 'Disable' : 'Enable' }} download
							</button>
		    			</form>
		    		</li>
		    		@if (! $photosession->purchased())
           			<li><a href="{{ route('mark-as-purchased', $photosession->id) }}"><svg class="glyph stroked checkmark" title="Mark as purchased"><use xlink:href="#stroked-checkmark"/></svg> Mark as Purchased</a></li>
           			@endif
           			<li><a href="{{ route('client-gallery', [$photosession->user_id, $photosession->id]) }}" title="view photosession"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></svg> View Gallery</a></li>
           			<li role="presentation" class="divider"></li>
           			<li><a href="{{ route('refresh-page') }}" role="button" class="btn btn-success refresh-page" title="refresh page"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh page</a></li>
				</ul>
			</li>
			@endif
    	</ul>
	</div> {{-- ./sidebar --}}
</header>