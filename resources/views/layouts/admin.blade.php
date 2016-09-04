<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Admin | Agnieszka Krol Photography</title>
    <meta name="description" content="Admin Area of Agnieszka Krol">
    <meta name="author" content="Istvan Lovas">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    {{-- Custom Fonts --}}
    <link type="text/css" rel="stylesheet" href="//fast.fonts.net/cssapi/10d958fe-f060-4fab-88dc-7df956e8546c.css"/>

    <!-- Styles -->

    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/admin-style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/libs.css') }}" rel="stylesheet">

    @yield('customCSS')

</head>
<body id="app-layout">

    @include('admin.layout.header')

    <div class="content" role="document">
        @yield('content')
    </div>

    @include('admin.layout.footer')
    
</body>
</html>