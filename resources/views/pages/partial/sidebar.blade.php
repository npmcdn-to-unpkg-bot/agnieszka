<div id="sidebar">
    <nav id="top-navigation" role="navigation">
        <ul>
            <li><a href="{{ route('portfolio') }}" class="top-nav-link">{{ trans('navigation.portfolio') }}</a></li>
            <li><a href="{{ route('about') }}" class="top-nav-link">{{ trans('navigation.about') }}</a></li>
            <li><a href="{{ route('services') }}" class="top-nav-link">{{ trans('navigation.prices') }}</a></li>
            <li><a href="{{ route('contact') }}" class="top-nav-link">{{ trans('navigation.contact') }}</a></li>
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