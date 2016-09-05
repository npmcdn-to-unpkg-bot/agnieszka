<div class="top-navbar">

    <a href="{{ route('home') }}" class="logo">AGNIESZKA KROL<br><span>Photography</span></a>

    @if(! Request::is('login') && ! Auth::check())
        <a href="{{ url('login') }}" class="btn client-login-button">{{ trans('navigation.login') }}</a>
    @endif

    @if (! Request::is('login'))
        <div class="toggle" id="navToggle">
            <div>
                <div class="icon-bar"></div>
                <div class="icon-bar"></div>
                <div class="icon-bar"></div>
            </div>
        </div> {{-- ./toggle --}}
    @endif


    {{-- @if(Auth::check())
        @if (Auth::user()->hasRole('admin'))
            <a href="{{ route('dashboard') }}" class="icon-profile"><span>Hi, {{ Auth::user()->getFullName() }}</span> {!! file_get_contents("images/social-icons/profile.svg") !!}</a>
        @else
            <a href="{{ route('client-dashboard', Auth::user()->id) }}" class="icon-profile"><span>Hi, {{ Auth::user()->getFullName() }}</span> {!! file_get_contents("images/social-icons/profile.svg") !!}</a>
        @endif
    @endif --}}
</div>

<header id="header">
    @if (! Request::is('login'))
        <div class="overlay"></div>
        @include('pages.partial.sidebar')
    @endif
</header>