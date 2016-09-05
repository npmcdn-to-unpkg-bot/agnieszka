<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield('title') | Agnieszka Krol Photography</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="Istvan Lovas">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">

    {{-- Custom Fonts --}}
    <link type="text/css" rel="stylesheet" href="//fast.fonts.net/cssapi/10d958fe-f060-4fab-88dc-7df956e8546c.css"/>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gallery/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/libs.css') }}" rel="stylesheet">

    @yield('customCSS')

</head>
<body id="app-layout">
    @include('pages.partial.header')
    <div class="content" role="document">
        @yield('content')
    </div>
    @include('client.layout.footer')
</body>
</html>