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
						<a href="{{ route('admin') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hi, {{ Auth::user()->getFullName() }} <span class="caret"></span></a>
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
    		<li class="active"><a href="{{ route('dashboard') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
    		<li><a href="admin/photosessions"><svg class="glyph stroked camera "><use xlink:href="#stroked-camera"/></svg> Photosessions</a></li>
    		<li><a href="{{ route('clients') }}"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg> Clients</a></li>
    	</ul>
	</div> {{-- ./sidebar --}}
</header>