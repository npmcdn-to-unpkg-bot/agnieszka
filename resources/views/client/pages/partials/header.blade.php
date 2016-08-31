<header id="header">
    <nav id="navigation" class="clearfix" role="navigation">
        <div class="logo"><a href="{{ route('home') }}">agnieszka krol</a></div>
        <ul id="main-navigation">
            <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('services') }}">Prices</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </nav>

    <div class="language-chooser">
        <form action="" method="selectost" accept-charset="utf-8">
            <select name="language">
                <option value="en">English</option>
                <option value="de">Deutsch</option>
            </select>
            <input type="submit" name="choose" value="Choose">
        </form>
    </div>
</header>