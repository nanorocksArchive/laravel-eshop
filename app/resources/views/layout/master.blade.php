<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | Shopper</title>
    @include('includes.head')
</head><!--/head-->
<body>
@include('includes.top-bar')
<div id="wrapper" class="container" style="padding-top: 20px !important;">
    @section('header')
        @include('includes.header')
    @show
    @section('sidebar')
        @include('includes.slider')
    @show
    @section('text')
        @include('includes.header-text')
    @show
    @yield('content')
    @section('footer')
        @include('includes.footer')
    @show
</div>
@section('js')
    <script src="{{ assert( 'themes/js/common.js') }}"></script>
    <script src="{{ asset('themes/js/jquery.flexslider-min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $(document).ready(function () {
                $('.flexslider').flexslider({
                    animation: "fade",
                    slideshowSpeed: 4000,
                    animationSpeed: 600,
                    controlNav: false,
                    directionNav: true,
                    controlsContainer: ".flex-container" // the container that holds the flexslider
                });
            });
        });
    </script>
@show
</body>
</html>
