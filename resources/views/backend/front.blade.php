<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    @if(isset($title))
        <title>{{$title}}</title>
        <meta property="og:title" content="{{$title}}">
    @else
        <title>Hotel Shankharapur | Best Memories start here</title>
        <meta property="og:title" content="Hotel Shankharapur | Best Memories start here">
    @endif
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property='og:url' content='{{url()->current()}}'>
    <meta property="og:type" content="website"/>
    <link rel="shortcut icon" href="{{asset('property/favicon.png')}}">

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="{{asset('css/scroll.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('css/customFonts.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('css/style.css')}}">
    @yield('style')
    <link rel="stylesheet" href="{{asset('')}}assets/js/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" id="css-main" href="{{asset('')}}assets/css/dashmix.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/themes/xsmooth.min.css">

    <script src="https://kit.fontawesome.com/f9dfcdd6a8.js" crossorigin="anonymous"></script>
</head>
<body>


@yield('body')


<script src="{{asset('')}}assets/js/dashmix.core.min.js"></script>

<!--
    Dashmix JS

    Custom functionality including Blocks/Layout API as well as other vital and optional helpers
    webpack is putting everything together at {{asset('')}}assets/_es6/main/app.js
-->
<script src="{{asset('')}}assets/js/dashmix.app.min.js"></script>
<script src="{{asset('')}}assets/js/plugins/select2/js/select2.full.min.js"></script>
<script>jQuery(function(){ Dashmix.helpers(['select2']); });</script>

@yield('script')
<script>
    Laravel = {
        'url': '{{url("")}}'
    };
    var token = '{{ \Illuminate\Support\Facades\Session::token() }}';
</script>


</body>
</html>
