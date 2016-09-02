<div class="top-navbar">
    <a href="{{ route('home') }}" class="logo">AGNIESZKA KROL<br><span>Photography</span></a>
    @if (! Request::is('login'))
        <div class="toggle" id="navToggle">
            <div>
                <div class="icon-bar"></div>
                <div class="icon-bar"></div>
                <div class="icon-bar"></div>
            </div>
        </div> {{-- ./toggle --}}
    @endif

    @if (! Request::is('login'))
        <div class="user-link">
            @if(Auth::check())
                @if (Auth::user()->hasRole('admin'))
                    <a href="{{ route('dashboard') }}" class="icon-profile"><span>Hi, {{ Auth::user()->getFullName() }}</span> {!! file_get_contents("images/social-icons/profile.svg") !!}</a>
                @else
                    <a href="{{ route('client-dashboard', Auth::user()->id) }}" class="icon-profile"><span>Hi, {{ Auth::user()->getFullName() }}</span> {!! file_get_contents("images/social-icons/profile.svg") !!}</a>
                @endif
            @else
                <a href="{{ url('login') }}" class="btn-client-login">{{ trans('navigation.login') }}</a>
            @endif
        </div> {{-- ./user-link --}}
    @endif
</div>

<header id="header">
    @if (! Request::is('login'))
        <div class="overlay"></div>
        @include('pages.partial.sidebar')
    @endif
    @if (! Request::is('contact'))
        {{-- @include('pages.partial.social-icons') --}}
    @endif
</header>