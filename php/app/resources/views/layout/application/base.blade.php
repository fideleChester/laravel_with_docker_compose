@extends('layout.app')
@section('application')
    @include('layout.navbar.header')
    @include('layout.navbar.sidebar')
    <div class="content-body">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
@endsection
