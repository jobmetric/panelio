@extends('domi::layout')

@section('head')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <link href="{{ asset('assets/vendor/panelio/css/base.css') }}" rel="stylesheet" type="text/css"/>
    @if(trans('domi::base.direction') == 'rtl')
        <link href="{{ asset('assets/vendor/panelio/fonts/iransans/fonts.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/panelio/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/vendor/panelio/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/vendor/panelio/css/style.rtl.css') }}" rel="stylesheet" type="text/css"/>
    @else
        <link href="{{ asset('assets/vendor/panelio/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/vendor/panelio/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/vendor/panelio/css/style.css') }}" rel="stylesheet" type="text/css"/>
    @endif
@endsection

@section('body-attribute')
    id="kt_body" style="background-image: url()" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled" @yield('body-attribute-variable')
@endsection

@section('content')
    <script>var defaultThemeMode = "light";
        let themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }</script>
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            @include('panelio::common.aside')
            @include('panelio::common.wrapper')
        </div>
    </div>
    @yield('modal')
@endsection

@section('script')
    <script src="{{ asset('assets/vendor/panelio/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/panelio/js/scripts.bundle.js') }}"></script>
@endsection

@section('script-bottom')
    <script src="{{ asset('assets/vendor/panelio/js/script.js') }}"></script>
@endsection
