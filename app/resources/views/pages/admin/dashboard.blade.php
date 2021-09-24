@extends('layout.admin')
@section('title')
    Admin page
@stop
@section('content')
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
@stop
@section('js')
    @parent
@stop
