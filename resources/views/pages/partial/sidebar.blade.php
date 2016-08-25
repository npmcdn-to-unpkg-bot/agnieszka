<div id="sidebar">
    <nav id="top-navigation" role="navigation">
        <ul class="main-navigation">
            <li class="home"><a href="{{ route('home') }}" class="top-nav-link home {{ setActiveNavigation('/') }}">{{ trans('navigation.home') }}</a></li>
            <li><a href="{{ route('portfolio') }}" class="top-nav-link portfolio {{ setActiveNavigation('portfolio') }}">{{ trans('navigation.portfolio') }}</a></li>
            @if(Request::is('portfolio'))
                <ul class="portfolio-tabs" role="tablist">
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
            @endif
            <li><a href="{{ route('about') }}" class="top-nav-link about {{ setActiveNavigation('about') }}">{{ trans('navigation.about') }}</a></li>
            <li><a href="{{ route('services') }}" class="top-nav-link services {{ setActiveNavigation('services') }}">{{ trans('navigation.services') }}</a></li>
            <li><a href="{{ route('contact') }}" class="top-nav-link contact {{ setActiveNavigation('contact') }}">{{ trans('navigation.contact') }}</a></li>
            <li>
            @if(App::isLocale('en'))
                <a href="{{ route('language-chooser', 'de') }}" class="top-nav-link lang">De</a>
            @else
                <a href="{{ route('language-chooser', 'en') }}" class="top-nav-link lang">En</a>
            @endif
            </li>
        </ul>
    </nav> {{-- ./top-navigation --}}
</div> {{-- ./sidebar --}}