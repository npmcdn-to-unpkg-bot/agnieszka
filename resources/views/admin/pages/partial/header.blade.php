<div class="top-navbar">
    <a href="{{ route('home') }}" class="logo">AGNIESZKA KROL<br><span>Photography</span></a>
        <div class="user-link">
            <a href="{{ route('admin') }}" class="icon-profile"><span>Hi, {{ Auth::user()->getFullName() }}</span> {!! file_get_contents("images/social-icons/profile.svg") !!}</a>
        </div> {{-- ./user-link --}}
</div>

<header id="header">
    @include('admin.pages.partial.sidebar')
</header>