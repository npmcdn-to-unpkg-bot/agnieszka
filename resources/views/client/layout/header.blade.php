<header id="gallery-header">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#gallery-icons" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">AGNIESZKAKROL</a>
            </div> {{-- ./navbar-header --}}

            <div class="collapse navbar-collapse" id="gallery-icons">
                <ul class="nav navbar-nav navbar-right">
                    <li title="Total number of photos">
                        <svg class="glyph stroked camera "><use xlink:href="#stroked-camera"/></svg>
                        <span>{{ count($photosession->photos) }}</span>
                    </li>
                    <li title="Remaining days to access to online gallery">
                        <svg class="glyph stroked hourglass"><use xlink:href="#stroked-hourglass"/></svg>
                        <span>{{ $photosession->expires_in() }}</span>
                    </li>
                    <li title="Number of selectable photos">
                        <svg class="glyph stroked flag"><use xlink:href="#stroked-flag"/></svg>
                        <span id="selectable_photos">{{ $photosession->photo_download_limit() }}</span>
                    </li>
                    <li title="Selected photos">
                        <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                        <span id="selected_photos">0</span>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <span class="hidden-xs" title="Hi, {{ Auth::user()->getFullName() }}">Hi, {{ Auth::user()->first_name }}</span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Homepage</a></li>
                            <li><a href="#">Logout</a></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div> {{-- ./gallery-icons --}}  
        
        </div> {{-- ./container-fluid --}}
    </nav> {{-- ./navbar-fixed-top --}}
</header>