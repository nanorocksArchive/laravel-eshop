<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title') | Shopper</title>
    @include('includes.head')
</head><!--/head-->
<body>
@include('includes.admin.top-bar')
<div id="wrapper" class="container" style="padding-top: 20px !important;">
    @yield('content')
</div>
@section('js')
@show
</body>
</html>
