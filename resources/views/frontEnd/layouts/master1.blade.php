<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="magnatic cards, tagnames, smartcards, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Master Page')</title>
    <link href="{{asset('frontEnd/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->

    <link rel="stylesheet" href="{{asset('frontEnd/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontEnd/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontEnd/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontEnd/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontEnd/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontEnd/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontEnd/css/style.css')}}" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
@include('frontEnd.layouts.hamburger')
@include('frontEnd.layouts.header1')
@include('frontEnd.layouts.hero')

@yield('content')
@include('frontEnd.layouts.footer1')


<!-- Js Plugins -->
<script src="{{asset('frontEnd/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('frontEnd/js/mixitup.min.js')}}"></script>
<script src="{{asset('frontEnd/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontEnd/js/main.js')}}"></script>



</body>

</html>
