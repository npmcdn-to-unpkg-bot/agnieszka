<header id="header">

    <div class="overlay"></div>
    
    <div class="toggle" id="navToggle">
        <div>
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
        </div>
    </div>

    <div id="sidebar">
        <div id="logo-icon"></div>

        <nav id="navigation" role="navigation">
            <ul id="main-navigation">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('services') }}">Prices</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>

            {{-- <footer>
                <div class="social-icons">
                    <li>{!! file_get_contents("images/social-icons/facebook.svg") !!}</li>
                    <li>{!! file_get_contents("images/social-icons/twitter.svg") !!}</li>
                    <li>{!! file_get_contents("images/social-icons/instagramm.svg") !!}</li>
                </div>

                <form action="" method="selectost" accept-charset="utf-8">
                        <select name="language">
                            <option value="en">English</option>
                            <option value="de">Deutsch</option>
                        </select>
                        <input type="submit" name="choose" value="Choose">
                </form>
            </footer> --}}
            <div id="label">
                <p>Agnieszka Krol</p>
            </div>
    </div>

</header>

{{-- 
<div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}">Agnieszka Krol</a>
                         <a class="navbar-brand" href="http://agnieszkakrol.com/">
                            <img class="logo desktop" src="" alt="Agnieszka Krol Photographer">
                            <img class="logo mobile" src="" alt="Agnieszka Krol Photographer">
                        </a>
                    </div>
 --}}